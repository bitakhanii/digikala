<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Meilisearch\Exceptions\CommunicationException;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:show-products')->only('index');
        $this->middleware('can:create-product')->only(['create', 'store']);
        //$this->middleware('can:details-product')->only('edit');
        //$this->middleware('can:edit-product')->only(['update']);
        $this->middleware('can:delete-product')->only('destroy');
        //$this->middleware('can:gallery-product')->only(['gallery', 'storeGallery', 'deleteImage']);
        //$this->middleware('can:review-product')->only(['review', 'storeReview', 'deleteReview', 'editReview']);
        $this->middleware('can:special-product')->only(['makeSpecial', 'removeSpecial']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Product::query();

        $keyword = \request('product_search');
        if ($keyword) {
            $query = $query->where('title', 'LIKE', "%{$keyword}%")->orWhere('en_title', 'LIKE', "%{$keyword}%")->orWhereHas('category', function ($query) use ($keyword) {
                return $query->where('title', 'LIKE', "%{$keyword}%");
            })->orWhereHas('brand', function ($query) use ($keyword) {
                return $query->where('name', 'LIKE', "%{$keyword}%");
            });
        }

        $products = $query->latest()->paginate(10, ['id', 'title', 'price', 'discount', 'category_id', 'brand_id', 'inventory', 'views', 'special_time', 'user_id', 'created_at']);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->where('parent', 0)->get();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $this->productValidation($request, null);
            auth()->user()->products()->create($data);

        } catch (CommunicationException $e) {
        }

        $product = Product::query()->firstWhere('title', $request->title);

        File::makeDirectory(public_path('images/products/' . $product->id));
        File::makeDirectory(public_path('images/products/' . $product->id . '/gallery'));

        $this->imageSave($product, $request->file('image'));

        $this->insertAttributes($request, $product->id);

        if ($request->colors != null) {
            $product->colors()->attach($request->colors);
        }

        alert()->success('حله!', 'محصول با موفقیت اضافه شد.');
        return redirect(route('admin.product.index'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $this->authorize('details-product', $product->user);
        $oldCategories = $product->category->allParents();
        $categories = Category::query()->where('parent', 0)->get();
        return view('admin.product.edit', compact(['product', 'oldCategories', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->authorize('edit-product', $product->user);
        try {
            $data = $this->productValidation($request, $product->id);
            $product->update($data);
        } catch (CommunicationException $e) {
        }

        if ($request->file('image')) {
            $this->imageSave($product, $request->file('image'));
        }

        DB::table('attribute_product')->where('product_id', $product->id)->delete();
        $this->insertAttributes($request, $product->id);

        if ($request->colors != null) {
            $product->colors()->sync($request->colors);
        }

        alert()->success('حله!', 'محصول با موفقیت ویرایش شد.');
        return redirect(route('admin.product.edit', $product->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            Storage::deleteDirectory(public_path('images/products/' . $product->id));
            File::deleteDirectory(public_path('images/products/' . $product->id));
            $product->delete();
        } catch (CommunicationException $e) {
        }

        alert()->success('حله!', 'محصول با موفقیت حذف شد.');
        return redirect(route('admin.product.index'));
    }

    protected function productValidation(Request $request, $id = null)
    {
        $price = str_replace(',', '', $request['price']);
        $inventory = str_replace(',', '', $request['inventory']);
        $weight = str_replace(',', '', $request['weight']);


        $data = $request->validate([
            'title' => ['required', 'min:10', 'max:500', Rule::unique('products')->ignore($id)],
            'en_title' => ['nullable', 'min:10', 'max:500', Rule::unique('products')->ignore($id)],
            'price' => ['required', function ($attribute, $value, $fail) use ($price) {
                if (!is_numeric($price)) {
                    $fail('قیمت وارد شده نامعتبر می‌باشد!');
                }
            }],
            'discount' => ['nullable', 'integer', 'between:0,100'],
            'category_id' => [Rule::requiredIf($id == null), 'integer'],
            'brand_id' => ['nullable', 'integer'],
            'guarantee' => ['nullable'],
            'weight' => ['nullable', function ($attribute, $value, $fail) use ($weight) {
                if (!is_numeric($weight)) {
                    $fail('وزن باید مقداری عددی باشد.');
                }
            }],
            'introduction' => ['nullable'],
            'image' => [Rule::requiredIf($id == null)],
            'inventory' => ['required', function ($attribute, $value, $fail) use ($inventory) {
                if (!is_numeric($inventory)) {
                    $fail('موجودی باید مقداری عددی باشد.');
                }
            }],
        ], ['category_id.required' => 'تمامی سطوح دسته‌بندی را مشخص کنید.']);

        $data['price'] = $price;
        $data['weight'] = $weight;
        $data['inventory'] = $inventory;
        if ($request['discount'] == '') {
            $data['discount'] = 0;
        }
        if ($request['weight'] == '') {
            $data['weight'] = 0;
        }
        if ($request['brand_id'] == 0) {
            $data['brand_id'] = null;
        }

        unset($data['image']);

        return $data;
    }

    public function imageSave(Product $product, $image)
    {
        $fileName = 'product-' . $product->id . '.' . 'jpg';
        $fileName220 = 'product-' . $product->id . '_220.' . 'jpg';

        $path = public_path('images/products/' . $product->id . '/' . $fileName);
        $path220 = public_path('images/products/' . $product->id . '/' . $fileName220);

        Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path);
        Image::make($image->getRealPath())->resize(220, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path220);
    }

    /**
     * @param Request $request
     * @param int $productID
     * @return void
     */
    public function insertAttributes(Request $request, $productID): void
    {
        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'attribute-')) {
                if (!is_null($value)) {
                    $attrID = explode('-', $key)[1];

                    if (!is_numeric($value)) {
                        $attribute = Attribute::query()->find($attrID);
                        $newVal = $attribute->values()->create([
                            'value' => $value,
                        ]);
                        $valID = $newVal->id;
                    } else {
                        $valID = $value;
                    }

                    DB::table('attribute_product')->insert([
                        'attribute_id' => $attrID,
                        'product_id' => $productID,
                        'value_id' => $valID,
                    ]);
                }
            }
        }
    }

    public function loadSubCategory(Category $category)
    {
        $categories = $category->children;
        $brands = $category->brands;
        $attributes = $category->attributes()->with('values')->get();
        return [$categories, $brands, $attributes];
    }

    public function createBrand(Request $request)
    {
        try {
            $rules = [
                'name' => ['required', Rule::unique('brands', 'name')->where(function ($query) use ($request) {
                    return $query->where('category_id', $request->category_id);
                })],
                'en_name' => ['nullable'],
                'category_id' => ['required', 'integer'],
            ];

            $validator = Validator::make($request->toArray(), $rules, ['name.unique' => 'این برند از قبل وجود دارد.', 'name.required' => 'عنوان را وارد کنید.']);

            $data = $validator->getData();

            if ($validator->fails()) {
                return ['error', $validator->errors()->messages()];
            } else {

                Brand::query()->create($data);
            }
        } catch (CommunicationException $e) {
        }

        $brands = Brand::query()->where('category_id', $request->category_id)->get();
        return ['success', 'برند با موفقیت اضافه شد.', $brands];
    }

    public function createColor(Request $request)
    {
        $rules = [
            'name' => ['required', 'min:2', 'max:80', 'unique:colors,name'],
            'hex' => ['required', 'unique:colors,hex'],
        ];

        $validator = Validator::make($request->toArray(), $rules, ['hex.required' => 'رنگ را از color picker انتخاب کنید.']);

        if ($validator->fails()) {
            return ['error', $validator->errors()->getMessages()];
        } else {
            $data = $validator->getData();

            $color = Color::query()->create($data);

            return ['success', $color];
        }
    }

    public function gallery(Product $product)
    {
        $this->authorize('gallery-product', $product->user);
        return view('admin.product.gallery', compact('product'));
    }

    public function storeGallery(Request $request, Product $product)
    {
        $this->authorize('gallery-product', $product->user);
        foreach ($request->file('images') as $key => $image) {

            $name = randomString(50, $key);
            $path = public_path('images/products/' . $product->id . '/gallery/' . $name . '.jpg');
            Image::make($image->getRealPath())->save($path);

            $product->images()->create(['image' => $name]);
        }

        alert()->success('حله', 'تصاویر جدید با موفقیت اضافه شدند.');
        return back();
    }

    public function deleteImage(Product $product, ProductImage $image)
    {
        $this->authorize('gallery-product', $product->user);
        $image->delete();
        unlink(public_path('images/products/' . $product->id . '/gallery/' . $image->image . '.jpg'));

        return $product->images;
    }

    public function review(Product $product)
    {
        $this->authorize('review-product', $product->user);
        $reviews = $product->reviews;
        return view('admin.product.review', compact(['product', 'reviews']));
    }

    public function editReview(Request $request, ProductReview $review)
    {
        $this->authorize('review-product', $review->product->user);
        if ($request->title == '') {
            return 'عنوان نقد و بررسی نمی‌توند خالی باشد.';
        } else if (mb_strlen($request->title, 'UTF-8') < 5) {
            return 'عنوان نقد و بررسی باید حداقل ۵ کاراکتر داشته باشد.';
        } else if ($request->review == '') {
            return 'متن نقد و بررسی نمی‌توند خالی باشد.';
        } else if (mb_strlen($request->review, 'UTF-8') < 20) {
            return 'متن نقد و بررسی باید حداقل ۲۰ کاراکتر داشته باشد.';
        } else {
            $review->update(['review' => $request->review, 'title' => $request->title]);
            $newReview = ProductReview::find($review->id);
            return [$newReview->review, $newReview->title];
        }
    }

    public function deleteReview(Product $product, ProductReview $review)
    {
        $this->authorize('review-product', $product->user);
        $review->delete();
        return $product->reviews;
    }

    public function storeReview(Request $request, Product $product)
    {
        $this->authorize('review-product', $product->user);
        $data = $request->validate([
            'title' => ['min:5', 'max:400'],
            'review' => ['min:20', 'max:10000'],
        ]);

        $product->reviews()->create($data);
        alert()->success('حله', 'نقد جدید با موفقیت اضافه شدند.');
        return back();
    }

    public function makeSpecial(Request $request, Product $product)
    {
        $hour = persianToEng($request->special_time);
        $validate = Validator::make($request->toArray(), [
            'special_time' => ['required', function ($attribute, $value, $fail) use ($hour) {
                if (!is_numeric($hour)) {
                    $fail('');
                }
            }],
        ]);

        if ($validate->fails()) {
            return response()->json(['error' => 'مقدار وارد شده نامعتبر می‌باشد!'], 400);
        }

        try {
            $specialTime = $hour * 3600 + time();
            $product->update(['special_time' => $specialTime]);
        } catch (CommunicationException $e) {}

        $newSpecial = $product->special_time;
        $date = jdate($newSpecial)->format('%e %B %Y');
        $hour = jdate($newSpecial)->format('%H:%M');

        return ['date' => $date, 'hour' => $hour];
    }

    public function removeSpecial(Product $product)
    {
        try {
            $product->update(['special_time' => NULL]);
        } catch (CommunicationException $e) {}
    }
}

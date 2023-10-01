<?php

namespace App\Models;

use App\Http\Pivots\ProductAttributeValues;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title', 'en_title', 'price', 'discount', 'category_id', 'brand_id', 'guarantee', 'weight', 'introduction', 'image', 'inventory', 'sold', 'views', 'is_special', 'special_time', 'user_id',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function specialProducts()
    {
        $products = Product::query()->where('is_special', 1)->orderBy('id', 'desc')->limit(8)->get();

        foreach ($products as $product) {

            $product->nav_title = Str::words($product->title, 4, ' ...');
            $product->con_title = Str::words($product->title, 10, ' ...');
            $product->first_price = abbreviatePrice($product->price)[0];
            $product->discounted_price = abbreviatePrice($product->final_price)[0];
            $product->unit = abbreviatePrice($product->final_price)[1];
            $product->special_date = Carbon::parse($product->special_time)->format('F d,Y H:i:s');
            //$product->setAttribute('special_date', Carbon::parse($product->special_time)->format('F d,Y H:i:s'));
        }

        return $products;
    }

    public static function productsDetails($products)
    {
        foreach ($products as $key => $product) {
            $products[$key]['fix_title'] = Str::words($product->title, 10, ' ...');
            $products[$key]['first_price'] = engToPersian(number_format($product->price));
            $products[$key]['discounted_price'] = number_format($product->final_price);
        }

        return $products;
    }

    public static function mostVisited($limit = 12)
    {
        $products = Product::query()->orderBy('views', 'desc')->limit($limit)->get();
        Product::productsDetails($products);
        return $products;
    }

    public static function bestSellers($limit = 12)
    {
        $products = Product::query()->orderBy('sold', 'desc')->limit($limit)->get();
        Product::productsDetails($products);

        return $products;
    }

    public static function newests($limit = 12)
    {
        $products = Product::query()->latest()->limit($limit)->get();
        Product::productsDetails($products);

        return $products;
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->using(ProductAttributeValues::class)->withPivot('value_id');
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
            'en_title' => $this->en_title,
            'brand' => $this->brand->name ?? null,
            'category' => $this->category->allParents()->pluck('title'),
        ];
    }

    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class, 'attribute_product', 'product_id', 'value_id');
    }

    public function getFinalPriceAttribute()
    {
        $finalPrice = $this->price - (($this->price * $this->discount) / 100);
        return floorPrice($finalPrice);
    }

    public function getDiscountAmountAttribute()
    {
        return floorPrice(($this->price * $this->discount) / 100);
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}

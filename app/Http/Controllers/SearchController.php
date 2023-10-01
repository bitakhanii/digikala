<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function categorySearch(Category $category)
    {
        return getSearchFilters($category);
    }

    public function keywordSearch(Request $request)
    {
        return getSearchFilters($request);
    }

    //TODO بهینه سازی متد doSearch
    public function doSearch(Request $request, Category $category = null)
    {
        if (isset($category)) {
            $query = Product::search($category->title, function ($meilisearch, $query, $options) {
                $options['attributesToSearchOn'] = ['category'];
                return $meilisearch->search($query, $options);
            })->get();
        } else {
            $query = Product::search($request->keyword)->get();
        }

        $dbProducts = Product::query();

        if ($request->brands) {
            $products = $query->whereIn('brand_id', $request->brands);
            $dbProducts = $dbProducts->whereIn('id', $products->pluck('id'));
        }


        if ($request->colors) {
            $products = $query->filter(function ($product) use ($request) {
                return $product->colors->whereIn('id', $request->colors)->count() > 0;
            });
            $dbProducts = $dbProducts->whereIn('id', $products->pluck('id'));
        }

        $priceRange = explode(';', $request['price-slider']);
        $minPrice = $priceRange[0];
        $maxPrice = $priceRange[1];

        $products = $query->whereBetween('price', [$minPrice, $maxPrice]);
        $dbProducts = $dbProducts->whereIn('id', $products->pluck('id'));

        if ($request->available == 1) {
            $products = $query->where('inventory', '>', 0);
            $dbProducts = $dbProducts->whereIn('id', $products->pluck('id'));
        }

        if (isset($category)) {
            foreach ($request->all() as $key => $value) {
                if (str_starts_with($key, 'attr-')) {
                    $dbProducts = $dbProducts->whereHas('attributeValues', function ($query) use ($value) {
                        $query->whereIn('id', $value);
                    });
                }
            }
        }

        $allProducts = $dbProducts->orderBy($request->filter, $request['order-by'])->get();

        foreach ($allProducts as $product) {
            $product->load(['colors', 'comments' => function ($query) use ($product) {
                $commentsCount = $query->where('approved', 1)->count();
                if ($commentsCount > 0) {
                    $product->score = productScore($product->id);
                }
            }, 'attributes' => function ($query) {
                $query->where('filter', 1)->orderBy('id', 'desc')->take(6);
            }]);

            if ($product->attributes) {
                foreach ($product->attributes as $attribute) {
                    $attribute->value = $attribute->pivot->value->value;
                }
            }

            $product->discounted_price = $product->final_price;
        }

        $productsNum = $allProducts->count();
        $perPage = $request['per-page'];
        $page = $request['currentPage'];
        $offset = ($page - 1) * $perPage;
        $perPageProducts = $allProducts->slice($offset, $perPage);

        $pagesNum = ceil($productsNum / $perPage);

        return [$perPageProducts, $pagesNum];
    }
}

<?php

use App\Models\CategoryProperty;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

if (!function_exists('engToPersian')) {

    function engToPersian($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        $output = str_replace($english, $persian, $string);
        return $output;
    }
}

if (!function_exists('persianToEng')) {
    function persianToEng($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        $output = str_replace($persian, $english, $string);
        return $output;
    }
}

if (!function_exists('abbreviatePrice')) {
    function abbreviatePrice($price)
    {
        $priceChar = strlen($price);

        if ($priceChar >= 4 and $priceChar <= 6) {
            $abbPrice = ($price / 1000);
            $unit = 'هزار';

        } else if ($priceChar >= 7 and $priceChar <= 9) {
            $abbPrice = ($price / 1000000);
            $unit = 'میلیون';

        } else {
            $abbPrice = $price;
        }

        return [$abbPrice, $unit];
    }
}

if (!function_exists('getPosters')) {
    function getPosters($page, $position = '')
    {
        if ($position == '') {
            return \App\Models\Poster::query()->where('position', $page)->get();
        } else {
            return \App\Models\Poster::query()->where('position', $page . '-' . $position)->get();
        }
    }
}

if (!function_exists('getSetting')) {
    function getSetting($setting)
    {
        return \App\Models\Setting::query()->where('option', $setting)->pluck('value')->first();
    }
}

/*if (!function_exists('productScore')) {
    function productScore($productID)
    {
        $product = Product::query()->find($productID);
        $category = $product->category;
        $propertiesNumber = $category->properties()->count();

        $comments = $product->comments;
        $totalCommentsScore = count($comments) * $propertiesNumber;

        $commentScores = $comments->pluck('id')->map(function ($id) {
            return DB::table('product_scores')->where('comment_id', '=', $id)->pluck('score')->sum();
        });

        $result = $commentScores->sum() / $totalCommentsScore;
        return round($result, 1);
    }
}*/

if (!function_exists('productScore')) {
    function productScore($productID)
    {
        $product = Product::query()->find($productID);
        $comments = $product->comments()->where('approved', 1)->get();
        if ($comments->count() > 0) {
            $commentsID = $comments->pluck('id');

            $commentScores = $commentsID->map(function ($id) {
                return DB::table('product_scores')->where('comment_id', '=', $id)->pluck('score')->sum();
            });
            $countOfScores = DB::table('product_scores')->whereIn('comment_id', $commentsID)->count();

            $result = $commentScores->sum() / $countOfScores;
            return round($result, 1);
        }
    }
}

if (!function_exists('getFilterableAttributes')) {
    function getFilterableAttributes($indexName)
    {
        $client = new \Meilisearch\Client('http://localhost:7700');
        $index = $client->getIndex($indexName);
        return $index->getFilterableAttributes();
    }
}

if (!function_exists('getSearchFilters')) {
    function getSearchFilters($keyword)
    {
        if ($keyword instanceof \App\Models\Category) {
            $products = $keyword->getProducts()->flatten();
            $attributes = $keyword->attributes()->where('filter', 1)->get();
            $parents = $keyword->allParents();

        } elseif ($keyword instanceof \Illuminate\Http\Request) {
            $products = Product::search($keyword->keyword)->get();
            $attributes = '';
            $parents = '';
        }

        $brands = $products->pluck('brand')->unique()->whereNotNull();

        $colors = collect();
        foreach ($products as $product) {
            $colors = $colors->merge($product->colors()->pluck('id'));
        }
        $colors = $colors->unique();

        $minPrice = $products->pluck('price')->min();
        $maxPrice = $products->pluck('price')->max();

        $productsNumber = $products->count();

        $category = $keyword;
        $keyword = $keyword->keyword;
        return view('search.index', compact(['category', 'brands', 'colors', 'minPrice', 'maxPrice', 'attributes', 'parents', 'productsNumber', 'keyword']));
    }
}

if (!function_exists('floorPrice')) {
    function floorPrice($price)
    {
        if ($price >= 300000) {
            $formattedPrice = floor($price / 1000) * 1000;
        } else {
            $formattedPrice = floor($price / 100) * 100;
        }
        return $formattedPrice;
    }
}

if (!function_exists('commentScores')) {
    function commentScores($commentID) {
        $commentScores = DB::table('product_scores')->where('comment_id', $commentID)->get();
        foreach ($commentScores as $score) {
            $score->title = CategoryProperty::query()->find($score->property_id)->title;
        }

        return $commentScores;
    }
}

if (! function_exists('commentUserReaction')) {
    function commentUserReaction($comment, $type) {
        $reactions = $comment->usersReaction()->where('type', $type)->pluck('id');
        $userID = auth()->user()->id;
        if ($reactions->contains($userID)) {
            $userReaction = true;
        } else {
            $userReaction = false;
        }

        return $userReaction;
    }
}

/*if (! function_exists('to_english_numbers')) {
    function to_english_numbers(String $string): String {
        $persinaDigits1 = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $persinaDigits2 = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];
        $allPersianDigits = array_merge($persinaDigits1, $persinaDigits2);
        $replaces = [...range(0, 9), ...range(0, 9)];

        return str_replace($allPersianDigits, $replaces , $string);
    }
}*/

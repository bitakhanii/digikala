<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    function messageUpdate()
    {
        $messages = auth()->user()->messages()->orderBy('id', 'desc')->get();
        auth()->user()->messages()->update([
            'status' => 1,
        ]);

        return $messages;
    }

    public static function ordersCount()
    {
        $orders = [];
        $user = auth()->user();
        $orders['count'] = count($user->orders);
        $orders['paid'] = count($user->orders()->whereStatus('paid')->get());
        $orders['processing'] = count($user->orders()->where('status', 'processing')->get());
        $orders['canceled'] = count($user->orders()->where('status', 'canceled')->get());
        $orders['posted'] = count($user->orders()->where('status', 'posted')->get()) + count($user->orders()->where('status', 'received')->get());

        return $orders;
    }

    function showFavorites($folderID)
    {
        $favorites = auth()->user()->favorites();
        if ($folderID == 0) {
            $favorites = $favorites->where('parent', '!=', 0)->latest()->get();
        } else {
            $favorites = $favorites->where('parent', $folderID)->latest()->get();
        }
        foreach ($favorites as $key => $favorite) {
            $products = Product::query();
            $product_title = $products->where('id', $favorite['product_id'])->pluck('title');
            $image = $products->where('id', $favorite['product_id'])->pluck('image');
            $favorites[$key]['product_title'] = $product_title;
            $favorites[$key]['image'] = $image;
        }

        return $favorites;
    }
}

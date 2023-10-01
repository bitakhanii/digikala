<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function getProducts(Product $product)
    {
        $product->attributes = $product->attributes()->get()->take(5);
        $activeTab = getSetting('product_active_tab');

        return view('product.index', compact(['product', 'activeTab']));
    }

    public function activeTab(Product $product, Request $request)
    {
        $index = $request->index;
        if ($index == 0) {
            $reviews = $product->reviews;
            return view('product.review', compact('reviews'));
        }

        if ($index == 1) {
            $attributes = $product->attributes;
            return view('product.technical', compact(['attributes', 'product']));
        }

        if ($index == 2) {
            $comments = $product->comments()->where('approved', 1)->latest()->get();
            if ($comments->count() > 0) {
                $commentsID = $comments->pluck('id');
                $properties = $product->category->properties;
                foreach ($properties as $property) {
                    $query = DB::table('product_scores')
                        ->where('property_id', $property->id)
                        ->whereIn('comment_id', $commentsID)
                        ->get();

                    $score = $query->sum('score');
                    $count = $query->count();
                    $property->score = round($score / $count, 1);
                }
            } else {
                $properties = '';
            }

            foreach ($comments as $comment) {
                $comment->user_like = commentUserReaction($comment, true);
                $comment->user_dislike = commentUserReaction($comment, false);
            }

            return view('product.comments', compact(['product', 'comments', 'properties']));
        }

        if ($index == 3) {
            $questions = $product->questions()->where('parent', 0)->latest()->get();
            return view('product.questions', compact(['product', 'questions']));
        }
    }

    public function storeQuestion(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'question' => ['required', 'min:5'],
        ]);

        $parent = $request->parent ? $request->parent : 0;
        $response = $request->parent ? 'پاسخ' : 'پرسش';

        if ($validator->fails()) {
            alert()->error('ناموفق!', 'متن '.$response.' باید حداقل ۵ کاراکتر داشته باشد.');
            return back();
        } else {
            $product->questions()->create([
                'question' => $request->question,
                'user_id' => auth()->user()->id,
                'parent' => $parent,
            ]);

            alert()->success('حله!', $response.' شما با موفقیت ثبت شد.');
            return back();
        }
    }
}

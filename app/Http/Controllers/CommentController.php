<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Http\Client\Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        $properties = $product->category->properties();
        return view('addcomment.index', compact(['product', 'properties']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        $data = $this->validateComment($request);

        $comment = $product->comments()->create([
            'user_id' => auth()->user()->id,
            'title' => $data['title'],
            'comment' => $data['comment'],
            'positive' => $data['positive'],
            'negative' => $data['negative'],
        ]);

        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'property-')) {
                $propertyID = explode('-', $key)[1];
                DB::table('product_scores')->insert([
                    'property_id' => $propertyID,
                    'comment_id' => $comment->id,
                    'score' => $value,
                ]);
            }
        }

        alert()->success('حله!', 'نظر شما پس از تأیید در سایت قرار میگیرد.');
        return redirect(route('product', $product->id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $this->authorize('edit-comment', $comment->user);
        $product = $comment->commentable;
        $properties = $product->category->properties();
        return view('addcomment.index', compact(['comment', 'product', 'properties']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $data = $this->validateComment($request);
        $comment->update([
            'title' => $data['title'],
            'comment' => $data['comment'],
            'positive' => $data['positive'],
            'negative' => $data['negative'],
            'approved' => 0,
        ]);

        alert()->success('حله!', 'نظر شما پس از تأیید در سایت قرار میگیرد.');
        return redirect(route('product', $comment->commentable->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
    }

    public function sort(Request $request, Product $product)
    {
        if ($request->type == 'new') {
            $comments = $product->comments()
                ->where('approved', 1)
                ->latest()
                ->get();
        }

        if ($request->type == 'useful') {
            $comments = $product->comments()
                ->where('approved', 1)
                ->get()
                ->sortByDesc('likes')
                ->values();
        }

        foreach ($comments as $comment) {
            $comment->user_name = $comment->user->first_name . ' ' . $comment->user->last_name;
            $comment->date = jdate($comment->created_at)->format('%Y/%m/%d');
            $comment->scores = commentScores($comment->id);
            $comment->likes = $comment->likes;
            $comment->dislikes = $comment->dislikes;

            $userOrdersProducts = $comment->user->orders()->get()->map(function ($item) {
                return $item->products->pluck('id');
            });
            if ($userOrdersProducts->has($product->id)) {
                $comment->buyer = 1;
            } else {
                $comment->buyer = 0;
            }

            $comment->user_like = commentUserReaction($comment, true);
            $comment->user_dislike = commentUserReaction($comment, false);
        }

        return $comments;
    }

    public function dislike(Comment $comment)
    {
        $userDislike = DB::table('comment_user_reaction')->where('comment_id', $comment->id)->where('user_id', auth()->user()->id)->first();
        if (!$userDislike) {
            $comment->usersReaction()->attach(auth()->user()->id, ['type' => false]);
        } else {
            $comment->usersReaction()->detach(auth()->user()->id, ['type' => false]);
        }
        return response()->json(['dislikes' => $comment->dislikes]);
    }

    public function reaction(Comment $comment, Request $request)
    {
        $type = $request->type;
        $userReaction = DB::table('comment_user_reaction')->where('comment_id', $comment->id)->where('user_id', auth()->user()->id)->first();
        if (!$userReaction) {
            $comment->usersReaction()->attach(auth()->user()->id, ['type' => $type]);
        } else {
            $storedType = $userReaction->type;
            if ($type == $storedType) {
                $comment->usersReaction()->detach(auth()->user()->id, ['type' => $type]);
            } else {
                $comment->usersReaction()->syncWithoutDetaching([auth()->user()->id => ['type' => $type]]);
            }
        }
        if ($type) {
            return response()->json(['reaction' => $comment->likes, 'oldReact' => $comment->dislikes]);
        } else {
            return response()->json(['reaction' => $comment->dislikes, 'oldReact' => $comment->likes]);
        }
    }

    protected function validateComment($request)
    {
        $data = $request->validate([
            'property.*' => ['required', 'between:1,5'],
            'title' => ['required', 'string', 'min: 3', 'max: 255'],
            'positive.*' => ['nullable', 'min: 3', 'max: 255'],
            'negative.*' => ['nullable', 'min: 3', 'max: 255'],
            'comment' => ['required', 'min:10', 'max: 2000'],
        ]);

        $positive = (array_filter($request->positive) == []) ? null : json_encode(array_filter($request->positive));
        $negative = (array_filter($request->negative) == []) ? null : json_encode(array_filter($request->negative));

        $data['positive'] = $positive;
        $data['negative'] = $negative;

        return $data;
    }
}

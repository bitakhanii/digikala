<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'comment', 'positive', 'negative', 'approved', 'likes', 'dislikes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function usersReaction()
    {
        return $this->belongsToMany(User::class, 'comment_user_reaction');
    }

    public function getLikesAttribute()
    {
        return DB::table('comment_user_reaction')->where('comment_id', $this->id)->where('type', 1)->count();
    }

    public function getDislikesAttribute()
    {
        return DB::table('comment_user_reaction')->where('comment_id', $this->id)->where('type', 0)->count();
    }
}

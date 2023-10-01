<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug' , 'article', 'reading_time', 'image', 'resize_image', 'video', 'is_news', 'is_video',
    ];

    public static function articles($limit = 5)
    {
        return Article::query()->where('is_video', 0)->where('is_news', 0)->orderBy('id', 'desc')->limit($limit)->get();

    }

    public static function videos($limit = 5)
    {
        return Article::query()->where('is_video', 1)->where('is_news', 0)->orderBy('id', 'desc')->limit($limit)->get();
    }

    public static function news($limit = 5)
    {
        return Article::query()->where('is_news' , 1)->where('is_video' , 0)->orderBy('id' , 'desc')->limit($limit)->get();
    }
}

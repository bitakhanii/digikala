<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\CategoryProperty;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        return view('index.index');
    }

    public function getArticle(Article $article)
    {
        $createdAt = $article->created_at;
        $directory = 'images/articles/' . $createdAt->year . '/' . $createdAt->month . '/' . $createdAt->day . '/' . $article->id . '/videos/';
        $files = glob($directory . '*.mp4');
        $article->videos = $files;

        return view('article.index', compact('article'));
    }
}

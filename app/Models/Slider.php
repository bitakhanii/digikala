<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'navigator', 'link',
    ];

    public static function sliders($limit = 5)
    {
        return Slider::query()->orderBy('id' , 'desc')->limit($limit)->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Brand extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name', 'en_name', 'category_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'en_name' => $this->en_name,
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Psy\Util\Str;
use function Sodium\add;

class Category extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title', 'slug', 'parent',
    ];

    /*public function getRouteKeyName()
    {
        return 'slug';
    }*/

    public function children()
    {
        return $this->hasMany(Category::class, 'parent');
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent');
    }

    public function allChildren()
    {
        $children = collect([$this]); // Add the current category to the list of children

        $childCategories = $this->children;

        foreach ($childCategories as $childCategory) {
            $grandChildren = $childCategory->allChildren();
            $children = $children->merge($grandChildren);
        }

        return $children;
    }

    public function allParents()
    {
        $parents = [$this];

        $parent = $this->parentCategory;

        while ($parent) {
            $parents[] = $parent;
            $parent = $parent->parentCategory;
        }

        return collect(array_reverse($parents));
    }

    public function getProducts()
    {
        $productIds = $this->allChildren()->pluck('products.*.id')->flatten()->toArray();
        $products = Product::query()->whereIn('id', $productIds)->orderBy('views', 'desc')->get();

        foreach ($products as $product) {
            if ($product->comments()->count() > 0) {
                $product->score = productScore($product->id);
            }
        }
        return $products;
    }

    public function image()
    {
        return $this->hasOne(CategoryImage::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function properties()
    {
        return $this->hasMany(CategoryProperty::class);
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
        ];
    }

    /* public function colors()
     {
         return $this->hasManyThrough(Color::class, Product::class);
     }

     public function getProductsAndColorsAttribute()
     {
         return $this->products()->with('colors')->get();
     }*/
}

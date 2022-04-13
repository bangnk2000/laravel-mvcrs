<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image'];

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'product_category',
            'product_id',
            'category_id'
        );
    }

    public function attachCategory($categoryId)
    {
        return  $this->categories()->attach($categoryId);
    }

    public function syncCategory($categoryId)
    {
        return  $this->categories()->sync($categoryId);
    }

    public function detachCategory()
    {
        return  $this->categories()->detach();
    }

    public function scopeWithName($query, $name)
    {
        return $name ? $query->where('name', 'like', '%' . $name . '%') : null;
    }

    public function scopeWithMorePrice($query, $price)
    {
        return $price ? $query->where('price', '>=', $price) : null;
    }

    public function scopeWithCategoryId($query, $categoryId)
    {
        return $categoryId ? $query->whereHas('categories', function ($subQ) use ($categoryId) {
            $subQ->where('category_id', $categoryId);
        }) : null;
    }
}

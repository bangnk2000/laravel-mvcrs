<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'parent_id'
    ];

    public function getParentInfo() {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }

    public function scopeWithName($query, $name)
    {
        return $name ? $query->where('name', 'like', '%' . $name. '%') : null;
    }

    public function scopeWithParentId($query, $parentId)
    {
        return $parentId ? $query->where('parent_id', '=', $parentId) : null;
    }
}

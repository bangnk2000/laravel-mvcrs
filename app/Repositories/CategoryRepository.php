<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    public function model()
    {
        return Category::class;
    }

    /**
     * Get category parent
     */
    public function getParent()
    {
        return $this->model->where('parent_id', 0)->get();
    }

    /**
     * Search category
     */
    public function search($dataSearch)
    {
        return $this->model
            ->withName($dataSearch['name'])
            ->withParentId($dataSearch['parent_id'])
            ->latest('id')->paginate(5);
    }
}
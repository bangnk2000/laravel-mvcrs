<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    public function model()
    {
        return Product::class;
    }

    public function search($dataSearch)
    {
        return $this->model
            ->withCategoryId($dataSearch['category_id'])
            ->withName($dataSearch['name'])
            ->withMorePrice($dataSearch['price'])
            ->latest('id')->paginate(5);
    }
}

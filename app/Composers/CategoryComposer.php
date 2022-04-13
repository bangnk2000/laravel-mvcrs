<?php

namespace App\Composers;

use App\Services\CategoryService;
use Illuminate\View\View;

class CategoryComposer
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function compose(View $view)
    {
        $view->with('categories', $this->categoryService->getWithPaginate());
        $view->with('categoryList', $this->categoryService->getAll());
    }
}
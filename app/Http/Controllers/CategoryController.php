<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        View::share('parentCategories', $this->categoryService->getParent());
    }

    public function index()
    {
        return view('categories.index');
    }

    public function list(Request $request)
    {
        $categories = $this->categoryService->search($request);
        return view('categories.list', compact('categories'))->render();
    }

    public function store(CategoryCreateRequest $request)
    {
        $category = $this->categoryService->create($request);
        return $this->sentSuccessResponse($category, 'success', Response::HTTP_OK);
    }

    public function edit($id)
    {
        $category = $this->categoryService->findById($id);
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = $this->categoryService->update($request, $id);
        return $this->sentSuccessResponse($category, 'success', Response::HTTP_OK);
    }

    public function delete($id)
    {
        $this->categoryService->delete($id);
        return $this->sentSuccessResponse('', 'success', Response::HTTP_OK);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
        View::share('categories', $this->productService->getCategories());
    }

    public function index(Request $request)
    {
        $products = $this->productService->search($request);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductCreateRequest $request)
    {
        $this->productService->create($request);
        return redirect()->route('products.index')->with('message', 'product created successfully');
    }

    public function show($id)
    {
        $product = $this->productService->findById($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = $this->productService->findById($id);
        return view('products.edit', compact('product'));
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $this->productService->update($request, $id);
        return redirect()->route('products.index')->with('message', 'product updated successfully');
    }

    public function delete($id)
    {
        $this->productService->delete($id);
        return redirect()->route('products.index')->with('message', 'product deleted successfully');
    }
}

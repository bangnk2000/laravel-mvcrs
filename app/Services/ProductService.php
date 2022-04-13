<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Traits\HandleImage;

class ProductService
{
    use HandleImage;

    protected $productRepository;
    protected $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }


    public function search($request)
    {
        $dataSearch = $request->all();

        $dataSearch['name'] = $request->name ?? '';

        $dataSearch['category_id'] = $request->category_id ?? '';

        $dataSearch['price'] = $request->price ?? '';

        return $this->productRepository->search($dataSearch);
    }

    public function getCategories()
    {
        return $this->categoryRepository->getWithPaginate();
    }

    public function create($request)
    {
        $data = $request->all();
        $data['image'] = $this->saveImage($request);
        $product = $this->productRepository->create($data);
        $product->attachCategory($request->category_id);
        return $product;
    }

    public function findById($id)
    {
        return $this->productRepository->findById($id);
    }

    public function update($request, $id)
    {
        $dataUpdate = $request->all();
        $product = $this->productRepository->findById($id);
        $dataUpdate['image'] = $this->updateImage($request, $product->image);
        $product->update($dataUpdate);
        $product->syncCategory($request->category_id);
        return $product;
    }

    public function delete($id)
    {
        $product = $this->productRepository->findById($id);
        $product->detachCategory();
        $this->deleteImage($product->image);
        return $product->delete();
    }
}

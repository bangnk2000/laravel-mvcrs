<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getWithPaginate()
    {
        return $this->categoryRepository->getWithPaginate();
    }

    public function getAll()
    {
        return $this->categoryRepository->all();
    }

    public function search($request)
    {
        $dataSearch['name'] = $request->name ?? '';
        $dataSearch['parent_id'] = $request->parent_id ?? '';
        return $this->categoryRepository->search($dataSearch);
    }

    public function getParent()
    {
        return $this->categoryRepository->getParent();
    }

    public function create($request)
    {
        $data = $request->all();
        return $this->categoryRepository->create($data);
    }

    public function findById($id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function update($request, $id)
    {
        $data = $request->all();
        return $this->categoryRepository->updateById($data, $id);
    }

    public function delete($id)
    {
        return $this->categoryRepository->destroy($id);
    }
}

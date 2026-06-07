<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;

class CategoryController extends BaseController
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return $this->success(
            $this->categoryService->getAll(),
            "Data kategori berhasil ditampilkan"
        );
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = $this->categoryService->create(
            $request->validated()
        );

        return $this->success(
            $category,
            "Kategori berhasil dibuat",
            201
        );
    }

    public function show($id)
    {
        try {
            $category = $this->categoryService->findById($id);

            return $this->success(
                $category,
                "Detail kategori berhasil ditampilkan"
            );
        } catch (\Exception $e) {
            return $this->error(
                $e->getMessage(),
                404
            );
        }
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = $this->categoryService->update(
            $id,
            $request->validated()
        );

        return $this->success(
            $category,
            "Kategori berhasil diperbarui"
        );
    }

    public function destroy($id)
    {
        $this->categoryService->delete($id);

        return $this->success(
            null,
            "Kategori berhasil dihapus",
            204
        );
    }
}
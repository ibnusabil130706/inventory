<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Services\ItemService;

class ItemController extends BaseController
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index()
    {
        return $this->success(
            $this->itemService->getAll(),
            "Data item berhasil ditampilkan"
        );
    }

    public function store(StoreItemRequest $request)
    {
        $item = $this->itemService->create(
            $request->validated()
        );

        return $this->success(
            $item,
            "Item berhasil dibuat",
            201
        );
    }

    public function show($id)
    {
        try {
            $item = $this->itemService->findById($id);

            return $this->success(
                $item,
                "Detail item berhasil ditampilkan"
            );
        } catch (\Exception $e) {
            return $this->error(
                $e->getMessage(),
                404
            );
        }
    }

    public function update(UpdateItemRequest $request, $id)
    {
        $item = $this->itemService->update(
            $id,
            $request->validated()
        );

        return $this->success(
            $item,
            "Item berhasil diperbarui"
        );
    }

    public function destroy($id)
    {
        $this->itemService->delete($id);

        return $this->success(
            null,
            "Item berhasil dihapus",
            204
        );
    }
}
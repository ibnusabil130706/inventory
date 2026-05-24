<?php

namespace App\Http\Controllers;

use App\Services\ItemService;
use Illuminate\Http\Request; // Pastikan ini di-import

class ItemController extends Controller
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index()
    {
        return response()->json($this->itemService->getAll());
    }

    public function store(Request $request) // Pakai Request biasa di sini
    {
        // Validasi langsung di sini saja supaya simple
        $data = $request->validate([
            'name'        => 'required|string',
            'quantity'    => 'required|integer',
            'price'       => 'required|numeric',
            'category_id' => 'required|integer',
        ]);

        $item = $this->itemService->create($data);
        return response()->json($item, 201);
    }

    public function show($id)
    {
        return response()->json($this->itemService->findById($id));
    }

    public function update(Request $request, $id)
    {
        $item = $this->itemService->update($id, $request->all());
        return response()->json($item);
    }

    public function destroy($id)
    {
        $this->itemService->delete($id);
        return response()->json(['message' => 'Item deleted successfully']);
    }
}
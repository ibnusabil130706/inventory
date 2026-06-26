<?php

namespace App\Http\Controllers;

use App\Services\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index(Request $request)
    {
        $items = $this->itemService->getAll($request->category_id);

        return response()->json([
            'success' => true,
            'message' => 'Items retrieved successfully',
            'data' => $items
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string',
            'quantity'    => 'required|integer',
            'price'       => 'required|numeric',
            'category_id' => 'required|integer',
        ]);


        $item = $this->itemService->create($data);

        return response()->json([
            'success' => true,
            'message' => 'Item created successfully',
            'data' => $item
        ], 201);
    }

    public function show($id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Item retrieved successfully',
            'data' => $this->itemService->findById($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = $this->itemService->update($id, $request->all());

        return response()->json([
            'success' => true,
            'message' => 'Item updated successfully',
            'data' => $item
        ]);
    }

    public function destroy($id)
    {
        $this->itemService->delete($id);

        return response()->json([
            'success' => true,
            'message' => 'Item deleted successfully'
        ]);
    }
}
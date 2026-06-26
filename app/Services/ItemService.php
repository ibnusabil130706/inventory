<?php

namespace App\Services;

use App\Models\Item;
use Illuminate\Support\Facades\Log;

class ItemService
{
    public function getAll($categoryId = null)
    {
        $query = Item::query();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        return $query->get();
    }

    public function findById($id)
    {
        return Item::findOrFail($id);
    }

    public function create(array $data)
    {
        Log::info('Item berhasil dibuat', [
            'data' => $data
        ]);

        $item = Item::create($data);

        return $item;
    }

    public function update($id, array $data)
    {
        $item = Item::findOrFail($id);

        $item->update($data);

        Log::info('Item berhasil diupdate', [
            'item_id' => $item->id,
            'data' => $data
        ]);

        return $item;
    }

    public function delete($id)
    {
        $item = Item::findOrFail($id);

        Log::info('Item berhasil dihapus', [
            'item_id' => $item->id
        ]);

        $item->delete();

        return true;
    }
}
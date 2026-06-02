<?php

namespace App\Services;

class CategoryService
{
    public function all()
    {
        return [];
    }

    public function create(array $data)
    {
        return $data;
    }

    public function find($id)
    {
        return ['id' => $id];
    }

    public function update($id, array $data)
    {
        return $data;
    }

    public function delete($id)
    {
        return true;
    }
}
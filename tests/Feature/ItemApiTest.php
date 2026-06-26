<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_all_items()
    {
        Item::factory()->count(3)->create();

        $response = $this->getJson('/api/items');

        $response->assertStatus(200);
    }

    public function test_can_create_item()
    {
        $data = [
            'name' => 'Laptop Asus',
            'quantity' => 10,
            'price' => 15000000,
            'category_id' => 1
        ];

        $response = $this->postJson('/api/items', $data);

        $response->assertStatus(201);
    }

    public function test_can_show_item()
    {
        $item = Item::factory()->create();

        $response = $this->getJson("/api/items/{$item->id}");

        $response->assertStatus(200);
    }

    public function test_can_delete_item()
    {
        $item = Item::factory()->create();

        $response = $this->deleteJson("/api/items/{$item->id}");

        $response->assertStatus(200);
    }
}
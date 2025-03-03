<?php

namespace Tests\Feature\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_products_can_be_indexed(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_product_can_be_shown()
    {
       $product = Product::factory()->create();

        $response = $this->get('products/' . $product->getKey());
        $response->assertStatus(200);
    }

    public function test_product_can_be_stored()
    {
        $attribuste = [
            'sku' =>'test',
            'name'=>'test',
            'price' => 123213
        ];

        $response = $this->post('products/', $attribuste);

        $response->assertStatus(201);

        $this->assertDatabaseHas('products', $attribuste);
    }

    public function test_product_can_be_updated()
    {
        $product = Product::factory()->create();

        $attribuste = [
            'sku' =>'test',
            'name'=>'test',
            'price' => 123213
        ];

        $response = $this->patch('products/' . $product->getKey(), $attribuste);

        $response->assertStatus(202);

        $this->assertDatabaseHas('products', array_merge(
            ['id' => $product->getKey()] , $attribuste
        ));
    }

    public function test_product_can_be_destroyed()
    {
        $product = Product::factory()->create();
        $response = $this->delete('products/' . $product->getKey());
        $response->assertStatus(204);
        
        $this->assertDatabaseMissing('products', array_merge(['id' => $product->getKey()]));
    }
}
<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test updating an existing product.
     *
     * @return void
     */
    public function test_update_product()
    {
        $product = Product::factory()->create();

        $updatedProductData = [
            'name' => 'Produk update',
            'detail' => 'produk ini baru di update.',
        ];

        $response = $this->put(route('products.update', $product->id), $updatedProductData);

        $response->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', $updatedProductData);
    }
}

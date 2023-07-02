<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test deleting a product.
     *
     * @return void
     */
    public function test_delete_product()
    {
        $product = Product::factory()->create();

        $response = $this->delete(route('products.destroy', $product->id));

        $response->assertRedirect(route('products.index'));

        $response->assertSessionHas('success', 'Product deleted successfully');
        
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}

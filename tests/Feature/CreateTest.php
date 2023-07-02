<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test storing a newly created product.
     *
     * @return void
     */
    public function test_success_create_product()
    {
        $productData = [
            'name' => 'Testing',
            'detail' => 'ini testing create produk.',
        ];

        $response = $this->post(route('products.store'), $productData);

        $response->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', $productData);
    }

    public function test_failed_create_product()
    {
        $productData = [
            'name' => '',
            'detail' => ''
        ];
        
        $response = $this->post(route('products.store'), $productData);
        $response->assertInvalid([
            'name' => 'The name field is required',
            'detail' => 'The detail field is required',
        ]);
    }
}

<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test displaying a listing of products.
     *
     * @return void
     */
    public function test_success()
    {
        $response = $this->get('/products');
        $response->assertOk();
    }

    public function test_failed()
    {
        $response = $this->get('/productss');
        $response->assertNotFound();
    }
}

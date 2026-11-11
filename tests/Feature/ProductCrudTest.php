<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_shows_products(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertSee('Data Produk');
    }

    public function test_store_creates_product(): void
    {
        $response = $this->post('/products', [
            'name' => 'Produk Uji Coba',
            'price' => 150000,
            'description' => 'Deskripsi produk uji coba.',
        ]);

        $response->assertRedirect('/products');
        $this->assertDatabaseHas('products', ['name' => 'Produk Uji Coba']);
    }

    public function test_update_modifies_product(): void
    {
        $product = \App\Models\Product::create([
            'name' => 'Produk Awal',
            'price' => 50000,
            'description' => 'Deskripsi awal.',
        ]);

        $response = $this->put("/products/{$product->id}", [
            'name' => 'Produk Diubah',
            'price' => 99999,
            'description' => 'Deskripsi diubah.',
        ]);

        $response->assertRedirect('/products');
        $this->assertDatabaseHas('products', ['id' => $product->id, 'name' => 'Produk Diubah']);
    }

    public function test_destroy_removes_product(): void
    {
        $product = \App\Models\Product::create([
            'name' => 'Produk Hapus',
            'price' => 20000,
            'description' => 'Akan dihapus.',
        ]);

        $response = $this->delete("/products/{$product->id}");

        $response->assertRedirect('/products');
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_validation_rejects_empty_form(): void
    {
        $response = $this->post('/products', []);

        $response->assertSessionHasErrors(['name', 'price', 'description']);
    }
}

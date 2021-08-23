<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductParticulars;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductAllProductParticularsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_product_all_product_particulars()
    {
        $product = Product::factory()->create();
        $allProductParticulars = ProductParticulars::factory()
            ->count(2)
            ->create([
                'product_id' => $product->id,
            ]);

        $response = $this->getJson(
            route('api.products.all-product-particulars.index', $product)
        );

        $response
            ->assertOk()
            ->assertSee($allProductParticulars[0]->particulars);
    }

    /**
     * @test
     */
    public function it_stores_the_product_all_product_particulars()
    {
        $product = Product::factory()->create();
        $data = ProductParticulars::factory()
            ->make([
                'product_id' => $product->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.products.all-product-particulars.store', $product),
            $data
        );

        unset($data['product_id']);

        $this->assertDatabaseHas('product_particulars', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $productParticulars = ProductParticulars::latest('id')->first();

        $this->assertEquals($product->id, $productParticulars->product_id);
    }
}

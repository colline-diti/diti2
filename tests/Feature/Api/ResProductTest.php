<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ResProduct;

use App\Models\ResCategory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResProductTest extends TestCase
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
    public function it_gets_res_products_list()
    {
        $resProducts = ResProduct::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.res-products.index'));

        $response->assertOk()->assertSee($resProducts[0]->product_name);
    }

    /**
     * @test
     */
    public function it_stores_the_res_product()
    {
        $data = ResProduct::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.res-products.store'), $data);

        unset($data['product_price']);

        $this->assertDatabaseHas('res_products', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_res_product()
    {
        $resProduct = ResProduct::factory()->create();

        $resCategory = ResCategory::factory()->create();

        $data = [
            'product_name' => $this->faker->text(255),
            'product_price' => $this->faker->randomNumber(0),
            'category' => $this->faker->text(255),
            'res_category_id' => $resCategory->id,
        ];

        $response = $this->putJson(
            route('api.res-products.update', $resProduct),
            $data
        );

        unset($data['product_price']);

        $data['id'] = $resProduct->id;

        $this->assertDatabaseHas('res_products', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_res_product()
    {
        $resProduct = ResProduct::factory()->create();

        $response = $this->deleteJson(
            route('api.res-products.destroy', $resProduct)
        );

        $this->assertDeleted($resProduct);

        $response->assertNoContent();
    }
}

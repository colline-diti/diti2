<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ResProduct;
use App\Models\ResCategory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResCategoryResProductsTest extends TestCase
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
    public function it_gets_res_category_res_products()
    {
        $resCategory = ResCategory::factory()->create();
        $resProducts = ResProduct::factory()
            ->count(2)
            ->create([
                'res_category_id' => $resCategory->id,
            ]);

        $response = $this->getJson(
            route('api.res-categories.res-products.index', $resCategory)
        );

        $response->assertOk()->assertSee($resProducts[0]->product_name);
    }

    /**
     * @test
     */
    public function it_stores_the_res_category_res_products()
    {
        $resCategory = ResCategory::factory()->create();
        $data = ResProduct::factory()
            ->make([
                'res_category_id' => $resCategory->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.res-categories.res-products.store', $resCategory),
            $data
        );

        unset($data['product_price']);

        $this->assertDatabaseHas('res_products', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $resProduct = ResProduct::latest('id')->first();

        $this->assertEquals($resCategory->id, $resProduct->res_category_id);
    }
}

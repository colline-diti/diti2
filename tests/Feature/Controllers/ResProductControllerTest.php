<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ResProduct;

use App\Models\ResCategory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResProductControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_res_products()
    {
        $resProducts = ResProduct::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('res-products.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.res_products.index')
            ->assertViewHas('resProducts');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_res_product()
    {
        $response = $this->get(route('res-products.create'));

        $response->assertOk()->assertViewIs('app.res_products.create');
    }

    /**
     * @test
     */
    public function it_stores_the_res_product()
    {
        $data = ResProduct::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('res-products.store'), $data);

        unset($data['product_price']);

        $this->assertDatabaseHas('res_products', $data);

        $resProduct = ResProduct::latest('id')->first();

        $response->assertRedirect(route('res-products.edit', $resProduct));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_res_product()
    {
        $resProduct = ResProduct::factory()->create();

        $response = $this->get(route('res-products.show', $resProduct));

        $response
            ->assertOk()
            ->assertViewIs('app.res_products.show')
            ->assertViewHas('resProduct');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_res_product()
    {
        $resProduct = ResProduct::factory()->create();

        $response = $this->get(route('res-products.edit', $resProduct));

        $response
            ->assertOk()
            ->assertViewIs('app.res_products.edit')
            ->assertViewHas('resProduct');
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

        $response = $this->put(
            route('res-products.update', $resProduct),
            $data
        );

        unset($data['product_price']);

        $data['id'] = $resProduct->id;

        $this->assertDatabaseHas('res_products', $data);

        $response->assertRedirect(route('res-products.edit', $resProduct));
    }

    /**
     * @test
     */
    public function it_deletes_the_res_product()
    {
        $resProduct = ResProduct::factory()->create();

        $response = $this->delete(route('res-products.destroy', $resProduct));

        $response->assertRedirect(route('res-products.index'));

        $this->assertDeleted($resProduct);
    }
}

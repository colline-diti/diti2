<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\RestaurantRequisition;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RestaurantRequisitionControllerTest extends TestCase
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
    public function it_displays_index_view_with_restaurant_requisitions()
    {
        $restaurantRequisitions = RestaurantRequisition::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('restaurant-requisitions.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.restaurant_requisitions.index')
            ->assertViewHas('restaurantRequisitions');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_restaurant_requisition()
    {
        $response = $this->get(route('restaurant-requisitions.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.restaurant_requisitions.create');
    }

    /**
     * @test
     */
    public function it_stores_the_restaurant_requisition()
    {
        $data = RestaurantRequisition::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('restaurant-requisitions.store'), $data);

        $this->assertDatabaseHas('restaurant_requisitions', $data);

        $restaurantRequisition = RestaurantRequisition::latest('id')->first();

        $response->assertRedirect(
            route('restaurant-requisitions.edit', $restaurantRequisition)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_restaurant_requisition()
    {
        $restaurantRequisition = RestaurantRequisition::factory()->create();

        $response = $this->get(
            route('restaurant-requisitions.show', $restaurantRequisition)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.restaurant_requisitions.show')
            ->assertViewHas('restaurantRequisition');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_restaurant_requisition()
    {
        $restaurantRequisition = RestaurantRequisition::factory()->create();

        $response = $this->get(
            route('restaurant-requisitions.edit', $restaurantRequisition)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.restaurant_requisitions.edit')
            ->assertViewHas('restaurantRequisition');
    }

    /**
     * @test
     */
    public function it_updates_the_restaurant_requisition()
    {
        $restaurantRequisition = RestaurantRequisition::factory()->create();

        $data = [
            'item_name' => $this->faker->text(255),
            'quantity' => $this->faker->randomNumber,
            'dateofDelivery' => $this->faker->text(255),
            'status' => $this->faker->word,
            'Particulars' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('restaurant-requisitions.update', $restaurantRequisition),
            $data
        );

        $data['id'] = $restaurantRequisition->id;

        $this->assertDatabaseHas('restaurant_requisitions', $data);

        $response->assertRedirect(
            route('restaurant-requisitions.edit', $restaurantRequisition)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_restaurant_requisition()
    {
        $restaurantRequisition = RestaurantRequisition::factory()->create();

        $response = $this->delete(
            route('restaurant-requisitions.destroy', $restaurantRequisition)
        );

        $response->assertRedirect(route('restaurant-requisitions.index'));

        $this->assertDeleted($restaurantRequisition);
    }
}

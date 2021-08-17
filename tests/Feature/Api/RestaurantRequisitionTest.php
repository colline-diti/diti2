<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\RestaurantRequisition;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RestaurantRequisitionTest extends TestCase
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
    public function it_gets_restaurant_requisitions_list()
    {
        $restaurantRequisitions = RestaurantRequisition::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.restaurant-requisitions.index'));

        $response->assertOk()->assertSee($restaurantRequisitions[0]->item_name);
    }

    /**
     * @test
     */
    public function it_stores_the_restaurant_requisition()
    {
        $data = RestaurantRequisition::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.restaurant-requisitions.store'),
            $data
        );

        $this->assertDatabaseHas('restaurant_requisitions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.restaurant-requisitions.update', $restaurantRequisition),
            $data
        );

        $data['id'] = $restaurantRequisition->id;

        $this->assertDatabaseHas('restaurant_requisitions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_restaurant_requisition()
    {
        $restaurantRequisition = RestaurantRequisition::factory()->create();

        $response = $this->deleteJson(
            route('api.restaurant-requisitions.destroy', $restaurantRequisition)
        );

        $this->assertDeleted($restaurantRequisition);

        $response->assertNoContent();
    }
}

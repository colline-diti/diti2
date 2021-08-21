<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\RequisitionItem;
use App\Models\RestaurantRequisition;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RestaurantRequisitionRequisitionItemsTest extends TestCase
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
    public function it_gets_restaurant_requisition_requisition_items()
    {
        $restaurantRequisition = RestaurantRequisition::factory()->create();
        $requisitionItems = RequisitionItem::factory()
            ->count(2)
            ->create([
                'restaurant_requisition_id' => $restaurantRequisition->id,
            ]);

        $response = $this->getJson(
            route(
                'api.restaurant-requisitions.requisition-items.index',
                $restaurantRequisition
            )
        );

        $response->assertOk()->assertSee($requisitionItems[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_restaurant_requisition_requisition_items()
    {
        $restaurantRequisition = RestaurantRequisition::factory()->create();
        $data = RequisitionItem::factory()
            ->make([
                'restaurant_requisition_id' => $restaurantRequisition->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.restaurant-requisitions.requisition-items.store',
                $restaurantRequisition
            ),
            $data
        );

        $this->assertDatabaseHas('requisition_items', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $requisitionItem = RequisitionItem::latest('id')->first();

        $this->assertEquals(
            $restaurantRequisition->id,
            $requisitionItem->restaurant_requisition_id
        );
    }
}

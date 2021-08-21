<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\RequisitionItem;

use App\Models\RestaurantRequisition;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RequisitionItemTest extends TestCase
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
    public function it_gets_requisition_items_list()
    {
        $requisitionItems = RequisitionItem::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.requisition-items.index'));

        $response->assertOk()->assertSee($requisitionItems[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_requisition_item()
    {
        $data = RequisitionItem::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.requisition-items.store'),
            $data
        );

        $this->assertDatabaseHas('requisition_items', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_requisition_item()
    {
        $requisitionItem = RequisitionItem::factory()->create();

        $restaurantRequisition = RestaurantRequisition::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'restaurant_requisition_id' => $restaurantRequisition->id,
        ];

        $response = $this->putJson(
            route('api.requisition-items.update', $requisitionItem),
            $data
        );

        $data['id'] = $requisitionItem->id;

        $this->assertDatabaseHas('requisition_items', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_requisition_item()
    {
        $requisitionItem = RequisitionItem::factory()->create();

        $response = $this->deleteJson(
            route('api.requisition-items.destroy', $requisitionItem)
        );

        $this->assertDeleted($requisitionItem);

        $response->assertNoContent();
    }
}

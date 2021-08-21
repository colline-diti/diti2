<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\RequisitionItem;
use App\Models\RequisitionDelivery;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RequisitionItemRequisitionDeliveriesTest extends TestCase
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
    public function it_gets_requisition_item_requisition_deliveries()
    {
        $requisitionItem = RequisitionItem::factory()->create();
        $requisitionDeliveries = RequisitionDelivery::factory()
            ->count(2)
            ->create([
                'requisition_item_id' => $requisitionItem->id,
            ]);

        $response = $this->getJson(
            route(
                'api.requisition-items.requisition-deliveries.index',
                $requisitionItem
            )
        );

        $response
            ->assertOk()
            ->assertSee($requisitionDeliveries[0]->item_quantity);
    }

    /**
     * @test
     */
    public function it_stores_the_requisition_item_requisition_deliveries()
    {
        $requisitionItem = RequisitionItem::factory()->create();
        $data = RequisitionDelivery::factory()
            ->make([
                'requisition_item_id' => $requisitionItem->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.requisition-items.requisition-deliveries.store',
                $requisitionItem
            ),
            $data
        );

        unset($data['requisition_item_id']);

        $this->assertDatabaseHas('requisition_deliveries', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $requisitionDelivery = RequisitionDelivery::latest('id')->first();

        $this->assertEquals(
            $requisitionItem->id,
            $requisitionDelivery->requisition_item_id
        );
    }
}

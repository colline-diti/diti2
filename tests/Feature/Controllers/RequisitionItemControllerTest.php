<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\RequisitionItem;

use App\Models\RestaurantRequisition;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RequisitionItemControllerTest extends TestCase
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
    public function it_displays_index_view_with_requisition_items()
    {
        $requisitionItems = RequisitionItem::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('requisition-items.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.requisition_items.index')
            ->assertViewHas('requisitionItems');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_requisition_item()
    {
        $response = $this->get(route('requisition-items.create'));

        $response->assertOk()->assertViewIs('app.requisition_items.create');
    }

    /**
     * @test
     */
    public function it_stores_the_requisition_item()
    {
        $data = RequisitionItem::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('requisition-items.store'), $data);

        $this->assertDatabaseHas('requisition_items', $data);

        $requisitionItem = RequisitionItem::latest('id')->first();

        $response->assertRedirect(
            route('requisition-items.edit', $requisitionItem)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_requisition_item()
    {
        $requisitionItem = RequisitionItem::factory()->create();

        $response = $this->get(
            route('requisition-items.show', $requisitionItem)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.requisition_items.show')
            ->assertViewHas('requisitionItem');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_requisition_item()
    {
        $requisitionItem = RequisitionItem::factory()->create();

        $response = $this->get(
            route('requisition-items.edit', $requisitionItem)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.requisition_items.edit')
            ->assertViewHas('requisitionItem');
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

        $response = $this->put(
            route('requisition-items.update', $requisitionItem),
            $data
        );

        $data['id'] = $requisitionItem->id;

        $this->assertDatabaseHas('requisition_items', $data);

        $response->assertRedirect(
            route('requisition-items.edit', $requisitionItem)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_requisition_item()
    {
        $requisitionItem = RequisitionItem::factory()->create();

        $response = $this->delete(
            route('requisition-items.destroy', $requisitionItem)
        );

        $response->assertRedirect(route('requisition-items.index'));

        $this->assertDeleted($requisitionItem);
    }
}

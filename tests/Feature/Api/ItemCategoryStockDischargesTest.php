<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ItemCategory;
use App\Models\StockDischarge;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemCategoryStockDischargesTest extends TestCase
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
    public function it_gets_item_category_stock_discharges()
    {
        $itemCategory = ItemCategory::factory()->create();
        $stockDischarges = StockDischarge::factory()
            ->count(2)
            ->create([
                'item_category_id' => $itemCategory->id,
            ]);

        $response = $this->getJson(
            route('api.item-categories.stock-discharges.index', $itemCategory)
        );

        $response->assertOk()->assertSee($stockDischarges[0]->description);
    }

    /**
     * @test
     */
    public function it_stores_the_item_category_stock_discharges()
    {
        $itemCategory = ItemCategory::factory()->create();
        $data = StockDischarge::factory()
            ->make([
                'item_category_id' => $itemCategory->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.item-categories.stock-discharges.store', $itemCategory),
            $data
        );

        unset($data['item_category_id']);

        $this->assertDatabaseHas('stock_discharges', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $stockDischarge = StockDischarge::latest('id')->first();

        $this->assertEquals(
            $itemCategory->id,
            $stockDischarge->item_category_id
        );
    }
}

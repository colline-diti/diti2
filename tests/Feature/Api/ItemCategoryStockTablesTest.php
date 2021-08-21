<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\StockTable;
use App\Models\ItemCategory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemCategoryStockTablesTest extends TestCase
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
    public function it_gets_item_category_stock_tables()
    {
        $itemCategory = ItemCategory::factory()->create();
        $stockTables = StockTable::factory()
            ->count(2)
            ->create([
                'item_category_id' => $itemCategory->id,
            ]);

        $response = $this->getJson(
            route('api.item-categories.stock-tables.index', $itemCategory)
        );

        $response->assertOk()->assertSee($stockTables[0]->item_name);
    }

    /**
     * @test
     */
    public function it_stores_the_item_category_stock_tables()
    {
        $itemCategory = ItemCategory::factory()->create();
        $data = StockTable::factory()
            ->make([
                'item_category_id' => $itemCategory->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.item-categories.stock-tables.store', $itemCategory),
            $data
        );

        $this->assertDatabaseHas('stock_tables', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $stockTable = StockTable::latest('id')->first();

        $this->assertEquals($itemCategory->id, $stockTable->item_category_id);
    }
}

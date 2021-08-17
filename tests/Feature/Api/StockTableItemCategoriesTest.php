<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\StockTable;
use App\Models\ItemCategory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StockTableItemCategoriesTest extends TestCase
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
    public function it_gets_stock_table_item_categories()
    {
        $stockTable = StockTable::factory()->create();
        $itemCategories = ItemCategory::factory()
            ->count(2)
            ->create([
                'stock_table_id' => $stockTable->id,
            ]);

        $response = $this->getJson(
            route('api.stock-tables.item-categories.index', $stockTable)
        );

        $response->assertOk()->assertSee($itemCategories[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_stock_table_item_categories()
    {
        $stockTable = StockTable::factory()->create();
        $data = ItemCategory::factory()
            ->make([
                'stock_table_id' => $stockTable->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.stock-tables.item-categories.store', $stockTable),
            $data
        );

        unset($data['stock_table_id']);

        $this->assertDatabaseHas('item_categories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $itemCategory = ItemCategory::latest('id')->first();

        $this->assertEquals($stockTable->id, $itemCategory->stock_table_id);
    }
}

<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\StockTable;

use App\Models\Unit;
use App\Models\ItemCategory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StockTableTest extends TestCase
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
    public function it_gets_stock_tables_list()
    {
        $stockTables = StockTable::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.stock-tables.index'));

        $response->assertOk()->assertSee($stockTables[0]->item_name);
    }

    /**
     * @test
     */
    public function it_stores_the_stock_table()
    {
        $data = StockTable::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.stock-tables.store'), $data);

        $this->assertDatabaseHas('stock_tables', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_stock_table()
    {
        $stockTable = StockTable::factory()->create();

        $itemCategory = ItemCategory::factory()->create();
        $unit = Unit::factory()->create();

        $data = [
            'item_name' => $this->faker->text(255),
            'quantity' => $this->faker->randomNumber,
            'remarks' => $this->faker->sentence(15),
            'item_category_id' => $itemCategory->id,
            'unit_id' => $unit->id,
        ];

        $response = $this->putJson(
            route('api.stock-tables.update', $stockTable),
            $data
        );

        $data['id'] = $stockTable->id;

        $this->assertDatabaseHas('stock_tables', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_stock_table()
    {
        $stockTable = StockTable::factory()->create();

        $response = $this->deleteJson(
            route('api.stock-tables.destroy', $stockTable)
        );

        $this->assertDeleted($stockTable);

        $response->assertNoContent();
    }
}

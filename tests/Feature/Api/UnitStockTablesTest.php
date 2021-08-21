<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Unit;
use App\Models\StockTable;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UnitStockTablesTest extends TestCase
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
    public function it_gets_unit_stock_tables()
    {
        $unit = Unit::factory()->create();
        $stockTables = StockTable::factory()
            ->count(2)
            ->create([
                'unit_id' => $unit->id,
            ]);

        $response = $this->getJson(
            route('api.units.stock-tables.index', $unit)
        );

        $response->assertOk()->assertSee($stockTables[0]->item_name);
    }

    /**
     * @test
     */
    public function it_stores_the_unit_stock_tables()
    {
        $unit = Unit::factory()->create();
        $data = StockTable::factory()
            ->make([
                'unit_id' => $unit->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.units.stock-tables.store', $unit),
            $data
        );

        $this->assertDatabaseHas('stock_tables', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $stockTable = StockTable::latest('id')->first();

        $this->assertEquals($unit->id, $stockTable->unit_id);
    }
}

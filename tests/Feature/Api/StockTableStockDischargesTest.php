<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\StockTable;
use App\Models\StockDischarge;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StockTableStockDischargesTest extends TestCase
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
    public function it_gets_stock_table_stock_discharges()
    {
        $stockTable = StockTable::factory()->create();
        $stockDischarges = StockDischarge::factory()
            ->count(2)
            ->create([
                'stock_table_id' => $stockTable->id,
            ]);

        $response = $this->getJson(
            route('api.stock-tables.stock-discharges.index', $stockTable)
        );

        $response->assertOk()->assertSee($stockDischarges[0]->section);
    }

    /**
     * @test
     */
    public function it_stores_the_stock_table_stock_discharges()
    {
        $stockTable = StockTable::factory()->create();
        $data = StockDischarge::factory()
            ->make([
                'stock_table_id' => $stockTable->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.stock-tables.stock-discharges.store', $stockTable),
            $data
        );

        $this->assertDatabaseHas('stock_discharges', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $stockDischarge = StockDischarge::latest('id')->first();

        $this->assertEquals($stockTable->id, $stockDischarge->stock_table_id);
    }
}

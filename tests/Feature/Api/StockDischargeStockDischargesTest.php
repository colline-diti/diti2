<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\StockDischarge;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StockDischargeStockDischargesTest extends TestCase
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
    public function it_gets_stock_discharge_stock_discharges()
    {
        $stockDischarge = StockDischarge::factory()->create();
        $stockDischarges = StockDischarge::factory()
            ->count(2)
            ->create([
                'stock_discharge_id' => $stockDischarge->id,
            ]);

        $response = $this->getJson(
            route(
                'api.stock-discharges.stock-discharges.index',
                $stockDischarge
            )
        );

        $response->assertOk()->assertSee($stockDischarges[0]->description);
    }

    /**
     * @test
     */
    public function it_stores_the_stock_discharge_stock_discharges()
    {
        $stockDischarge = StockDischarge::factory()->create();
        $data = StockDischarge::factory()
            ->make([
                'stock_discharge_id' => $stockDischarge->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.stock-discharges.stock-discharges.store',
                $stockDischarge
            ),
            $data
        );

        unset($data['stock_discharge_id']);

        $this->assertDatabaseHas('stock_discharges', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $stockDischarge = StockDischarge::latest('id')->first();

        $this->assertEquals(
            $stockDischarge->id,
            $stockDischarge->stock_discharge_id
        );
    }
}

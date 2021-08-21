<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Unit;
use App\Models\StockDischarge;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UnitStockDischargesTest extends TestCase
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
    public function it_gets_unit_stock_discharges()
    {
        $unit = Unit::factory()->create();
        $stockDischarges = StockDischarge::factory()
            ->count(2)
            ->create([
                'unit_id' => $unit->id,
            ]);

        $response = $this->getJson(
            route('api.units.stock-discharges.index', $unit)
        );

        $response->assertOk()->assertSee($stockDischarges[0]->return_date);
    }

    /**
     * @test
     */
    public function it_stores_the_unit_stock_discharges()
    {
        $unit = Unit::factory()->create();
        $data = StockDischarge::factory()
            ->make([
                'unit_id' => $unit->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.units.stock-discharges.store', $unit),
            $data
        );

        $this->assertDatabaseHas('stock_discharges', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $stockDischarge = StockDischarge::latest('id')->first();

        $this->assertEquals($unit->id, $stockDischarge->unit_id);
    }
}

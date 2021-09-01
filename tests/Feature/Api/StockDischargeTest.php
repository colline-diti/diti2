<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\StockDischarge;

use App\Models\StockTable;
use App\Models\ResSection;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StockDischargeTest extends TestCase
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
    public function it_gets_stock_discharges_list()
    {
        $stockDischarges = StockDischarge::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.stock-discharges.index'));

        $response->assertOk()->assertSee($stockDischarges[0]->section);
    }

    /**
     * @test
     */
    public function it_stores_the_stock_discharge()
    {
        $data = StockDischarge::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.stock-discharges.store'), $data);

        $this->assertDatabaseHas('stock_discharges', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_stock_discharge()
    {
        $stockDischarge = StockDischarge::factory()->create();

        $stockTable = StockTable::factory()->create();
        $resSection = ResSection::factory()->create();

        $data = [
            'quantity_issued' => $this->faker->randomNumber(0),
            'section' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
            'issued_by' => $this->faker->text(255),
            'stock_table_id' => $stockTable->id,
            'res_section_id' => $resSection->id,
        ];

        $response = $this->putJson(
            route('api.stock-discharges.update', $stockDischarge),
            $data
        );

        $data['id'] = $stockDischarge->id;

        $this->assertDatabaseHas('stock_discharges', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_stock_discharge()
    {
        $stockDischarge = StockDischarge::factory()->create();

        $response = $this->deleteJson(
            route('api.stock-discharges.destroy', $stockDischarge)
        );

        $this->assertDeleted($stockDischarge);

        $response->assertNoContent();
    }
}

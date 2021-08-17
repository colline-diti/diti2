<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\StockDischarge;

use App\Models\StockTable;
use App\Models\ResSection;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StockDischargeControllerTest extends TestCase
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
    public function it_displays_index_view_with_stock_discharges()
    {
        $stockDischarges = StockDischarge::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('stock-discharges.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.stock_discharges.index')
            ->assertViewHas('stockDischarges');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_stock_discharge()
    {
        $response = $this->get(route('stock-discharges.create'));

        $response->assertOk()->assertViewIs('app.stock_discharges.create');
    }

    /**
     * @test
     */
    public function it_stores_the_stock_discharge()
    {
        $data = StockDischarge::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('stock-discharges.store'), $data);

        $this->assertDatabaseHas('stock_discharges', $data);

        $stockDischarge = StockDischarge::latest('id')->first();

        $response->assertRedirect(
            route('stock-discharges.edit', $stockDischarge)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_stock_discharge()
    {
        $stockDischarge = StockDischarge::factory()->create();

        $response = $this->get(route('stock-discharges.show', $stockDischarge));

        $response
            ->assertOk()
            ->assertViewIs('app.stock_discharges.show')
            ->assertViewHas('stockDischarge');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_stock_discharge()
    {
        $stockDischarge = StockDischarge::factory()->create();

        $response = $this->get(route('stock-discharges.edit', $stockDischarge));

        $response
            ->assertOk()
            ->assertViewIs('app.stock_discharges.edit')
            ->assertViewHas('stockDischarge');
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

        $response = $this->put(
            route('stock-discharges.update', $stockDischarge),
            $data
        );

        $data['id'] = $stockDischarge->id;

        $this->assertDatabaseHas('stock_discharges', $data);

        $response->assertRedirect(
            route('stock-discharges.edit', $stockDischarge)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_stock_discharge()
    {
        $stockDischarge = StockDischarge::factory()->create();

        $response = $this->delete(
            route('stock-discharges.destroy', $stockDischarge)
        );

        $response->assertRedirect(route('stock-discharges.index'));

        $this->assertDeleted($stockDischarge);
    }
}

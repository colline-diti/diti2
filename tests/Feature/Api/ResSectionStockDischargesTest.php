<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ResSection;
use App\Models\StockDischarge;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResSectionStockDischargesTest extends TestCase
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
    public function it_gets_res_section_stock_discharges()
    {
        $resSection = ResSection::factory()->create();
        $stockDischarges = StockDischarge::factory()
            ->count(2)
            ->create([
                'res_section_id' => $resSection->id,
            ]);

        $response = $this->getJson(
            route('api.res-sections.stock-discharges.index', $resSection)
        );

        $response->assertOk()->assertSee($stockDischarges[0]->section);
    }

    /**
     * @test
     */
    public function it_stores_the_res_section_stock_discharges()
    {
        $resSection = ResSection::factory()->create();
        $data = StockDischarge::factory()
            ->make([
                'res_section_id' => $resSection->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.res-sections.stock-discharges.store', $resSection),
            $data
        );

        $this->assertDatabaseHas('stock_discharges', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $stockDischarge = StockDischarge::latest('id')->first();

        $this->assertEquals($resSection->id, $stockDischarge->res_section_id);
    }
}

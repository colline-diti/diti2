<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\TaxRates;
use App\Models\Invoices;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaxRatesAllInvoicesTest extends TestCase
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
    public function it_gets_tax_rates_all_invoices()
    {
        $taxRates = TaxRates::factory()->create();
        $allInvoices = Invoices::factory()
            ->count(2)
            ->create([
                'tax_rates_id' => $taxRates->id,
            ]);

        $response = $this->getJson(
            route('api.all-tax-rates.all-invoices.index', $taxRates)
        );

        $response->assertOk()->assertSee($allInvoices[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_tax_rates_all_invoices()
    {
        $taxRates = TaxRates::factory()->create();
        $data = Invoices::factory()
            ->make([
                'tax_rates_id' => $taxRates->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.all-tax-rates.all-invoices.store', $taxRates),
            $data
        );

        $this->assertDatabaseHas('invoices', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $invoices = Invoices::latest('id')->first();

        $this->assertEquals($taxRates->id, $invoices->tax_rates_id);
    }
}

<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\TaxRates;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaxRatesTest extends TestCase
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
    public function it_gets_all_tax_rates_list()
    {
        $allTaxRates = TaxRates::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-tax-rates.index'));

        $response->assertOk()->assertSee($allTaxRates[0]->tax_name);
    }

    /**
     * @test
     */
    public function it_stores_the_tax_rates()
    {
        $data = TaxRates::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.all-tax-rates.store'), $data);

        $this->assertDatabaseHas('tax_rates', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_tax_rates()
    {
        $taxRates = TaxRates::factory()->create();

        $data = [
            'tax_name' => $this->faker->text(255),
            'rate' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.all-tax-rates.update', $taxRates),
            $data
        );

        $data['id'] = $taxRates->id;

        $this->assertDatabaseHas('tax_rates', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_tax_rates()
    {
        $taxRates = TaxRates::factory()->create();

        $response = $this->deleteJson(
            route('api.all-tax-rates.destroy', $taxRates)
        );

        $this->assertDeleted($taxRates);

        $response->assertNoContent();
    }
}

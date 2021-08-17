<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\TaxRates;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaxRatesControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_tax_rates()
    {
        $allTaxRates = TaxRates::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-tax-rates.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_tax_rates.index')
            ->assertViewHas('allTaxRates');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_tax_rates()
    {
        $response = $this->get(route('all-tax-rates.create'));

        $response->assertOk()->assertViewIs('app.all_tax_rates.create');
    }

    /**
     * @test
     */
    public function it_stores_the_tax_rates()
    {
        $data = TaxRates::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-tax-rates.store'), $data);

        $this->assertDatabaseHas('tax_rates', $data);

        $taxRates = TaxRates::latest('id')->first();

        $response->assertRedirect(route('all-tax-rates.edit', $taxRates));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_tax_rates()
    {
        $taxRates = TaxRates::factory()->create();

        $response = $this->get(route('all-tax-rates.show', $taxRates));

        $response
            ->assertOk()
            ->assertViewIs('app.all_tax_rates.show')
            ->assertViewHas('taxRates');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_tax_rates()
    {
        $taxRates = TaxRates::factory()->create();

        $response = $this->get(route('all-tax-rates.edit', $taxRates));

        $response
            ->assertOk()
            ->assertViewIs('app.all_tax_rates.edit')
            ->assertViewHas('taxRates');
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

        $response = $this->put(route('all-tax-rates.update', $taxRates), $data);

        $data['id'] = $taxRates->id;

        $this->assertDatabaseHas('tax_rates', $data);

        $response->assertRedirect(route('all-tax-rates.edit', $taxRates));
    }

    /**
     * @test
     */
    public function it_deletes_the_tax_rates()
    {
        $taxRates = TaxRates::factory()->create();

        $response = $this->delete(route('all-tax-rates.destroy', $taxRates));

        $response->assertRedirect(route('all-tax-rates.index'));

        $this->assertDeleted($taxRates);
    }
}

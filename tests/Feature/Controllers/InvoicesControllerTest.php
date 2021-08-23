<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Invoices;

use App\Models\Clients;
use App\Models\TaxRates;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvoicesControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_invoices()
    {
        $allInvoices = Invoices::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-invoices.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_invoices.index')
            ->assertViewHas('allInvoices');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_invoices()
    {
        $response = $this->get(route('all-invoices.create'));

        $response->assertOk()->assertViewIs('app.all_invoices.create');
    }

    /**
     * @test
     */
    public function it_stores_the_invoices()
    {
        $data = Invoices::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-invoices.store'), $data);

        $this->assertDatabaseHas('invoices', $data);

        $invoices = Invoices::latest('id')->first();

        $response->assertRedirect(route('all-invoices.edit', $invoices));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_invoices()
    {
        $invoices = Invoices::factory()->create();

        $response = $this->get(route('all-invoices.show', $invoices));

        $response
            ->assertOk()
            ->assertViewIs('app.all_invoices.show')
            ->assertViewHas('invoices');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_invoices()
    {
        $invoices = Invoices::factory()->create();

        $response = $this->get(route('all-invoices.edit', $invoices));

        $response
            ->assertOk()
            ->assertViewIs('app.all_invoices.edit')
            ->assertViewHas('invoices');
    }

    /**
     * @test
     */
    public function it_updates_the_invoices()
    {
        $invoices = Invoices::factory()->create();

        $clients = Clients::factory()->create();
        $taxRates = TaxRates::factory()->create();

        $data = [
            'clients_id' => $clients->id,
            'tax_rates_id' => $taxRates->id,
        ];

        $response = $this->put(route('all-invoices.update', $invoices), $data);

        $data['id'] = $invoices->id;

        $this->assertDatabaseHas('invoices', $data);

        $response->assertRedirect(route('all-invoices.edit', $invoices));
    }

    /**
     * @test
     */
    public function it_deletes_the_invoices()
    {
        $invoices = Invoices::factory()->create();

        $response = $this->delete(route('all-invoices.destroy', $invoices));

        $response->assertRedirect(route('all-invoices.index'));

        $this->assertDeleted($invoices);
    }
}

<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Invoices;

use App\Models\Clients;
use App\Models\TaxRates;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvoicesTest extends TestCase
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
    public function it_gets_all_invoices_list()
    {
        $allInvoices = Invoices::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-invoices.index'));

        $response->assertOk()->assertSee($allInvoices[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_invoices()
    {
        $data = Invoices::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.all-invoices.store'), $data);

        $this->assertDatabaseHas('invoices', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.all-invoices.update', $invoices),
            $data
        );

        $data['id'] = $invoices->id;

        $this->assertDatabaseHas('invoices', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_invoices()
    {
        $invoices = Invoices::factory()->create();

        $response = $this->deleteJson(
            route('api.all-invoices.destroy', $invoices)
        );

        $this->assertDeleted($invoices);

        $response->assertNoContent();
    }
}

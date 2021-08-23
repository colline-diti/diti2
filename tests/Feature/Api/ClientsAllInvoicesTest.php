<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Clients;
use App\Models\Invoices;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientsAllInvoicesTest extends TestCase
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
    public function it_gets_clients_all_invoices()
    {
        $clients = Clients::factory()->create();
        $allInvoices = Invoices::factory()
            ->count(2)
            ->create([
                'clients_id' => $clients->id,
            ]);

        $response = $this->getJson(
            route('api.all-clients.all-invoices.index', $clients)
        );

        $response->assertOk()->assertSee($allInvoices[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_clients_all_invoices()
    {
        $clients = Clients::factory()->create();
        $data = Invoices::factory()
            ->make([
                'clients_id' => $clients->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.all-clients.all-invoices.store', $clients),
            $data
        );

        $this->assertDatabaseHas('invoices', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $invoices = Invoices::latest('id')->first();

        $this->assertEquals($clients->id, $invoices->clients_id);
    }
}

<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Sale;
use App\Models\Clients;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientsSalesTest extends TestCase
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
    public function it_gets_clients_sales()
    {
        $clients = Clients::factory()->create();
        $sales = Sale::factory()
            ->count(2)
            ->create([
                'clients_id' => $clients->id,
            ]);

        $response = $this->getJson(
            route('api.all-clients.sales.index', $clients)
        );

        $response->assertOk()->assertSee($sales[0]->product_name);
    }

    /**
     * @test
     */
    public function it_stores_the_clients_sales()
    {
        $clients = Clients::factory()->create();
        $data = Sale::factory()
            ->make([
                'clients_id' => $clients->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.all-clients.sales.store', $clients),
            $data
        );

        $this->assertDatabaseHas('sales', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $sale = Sale::latest('id')->first();

        $this->assertEquals($clients->id, $sale->clients_id);
    }
}

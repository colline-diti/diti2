<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Clients;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientsTest extends TestCase
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
    public function it_gets_all_clients_list()
    {
        $allClients = Clients::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-clients.index'));

        $response->assertOk()->assertSee($allClients[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_clients()
    {
        $data = Clients::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.all-clients.store'), $data);

        $this->assertDatabaseHas('clients', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_clients()
    {
        $clients = Clients::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'contact' => $this->faker->randomNumber(0),
            'email' => $this->faker->email,
        ];

        $response = $this->putJson(
            route('api.all-clients.update', $clients),
            $data
        );

        $data['id'] = $clients->id;

        $this->assertDatabaseHas('clients', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_clients()
    {
        $clients = Clients::factory()->create();

        $response = $this->deleteJson(
            route('api.all-clients.destroy', $clients)
        );

        $this->assertDeleted($clients);

        $response->assertNoContent();
    }
}

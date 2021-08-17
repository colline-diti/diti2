<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Clients;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientsControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_clients()
    {
        $allClients = Clients::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-clients.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_clients.index')
            ->assertViewHas('allClients');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_clients()
    {
        $response = $this->get(route('all-clients.create'));

        $response->assertOk()->assertViewIs('app.all_clients.create');
    }

    /**
     * @test
     */
    public function it_stores_the_clients()
    {
        $data = Clients::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-clients.store'), $data);

        $this->assertDatabaseHas('clients', $data);

        $clients = Clients::latest('id')->first();

        $response->assertRedirect(route('all-clients.edit', $clients));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_clients()
    {
        $clients = Clients::factory()->create();

        $response = $this->get(route('all-clients.show', $clients));

        $response
            ->assertOk()
            ->assertViewIs('app.all_clients.show')
            ->assertViewHas('clients');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_clients()
    {
        $clients = Clients::factory()->create();

        $response = $this->get(route('all-clients.edit', $clients));

        $response
            ->assertOk()
            ->assertViewIs('app.all_clients.edit')
            ->assertViewHas('clients');
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

        $response = $this->put(route('all-clients.update', $clients), $data);

        $data['id'] = $clients->id;

        $this->assertDatabaseHas('clients', $data);

        $response->assertRedirect(route('all-clients.edit', $clients));
    }

    /**
     * @test
     */
    public function it_deletes_the_clients()
    {
        $clients = Clients::factory()->create();

        $response = $this->delete(route('all-clients.destroy', $clients));

        $response->assertRedirect(route('all-clients.index'));

        $this->assertDeleted($clients);
    }
}

<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\PettyCash;

use App\Models\ExpesesResturant;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PettyCashControllerTest extends TestCase
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
    public function it_displays_index_view_with_petty_cashes()
    {
        $pettyCashes = PettyCash::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('petty-cashes.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.petty_cashes.index')
            ->assertViewHas('pettyCashes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_petty_cash()
    {
        $response = $this->get(route('petty-cashes.create'));

        $response->assertOk()->assertViewIs('app.petty_cashes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_petty_cash()
    {
        $data = PettyCash::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('petty-cashes.store'), $data);

        $this->assertDatabaseHas('petty_cashes', $data);

        $pettyCash = PettyCash::latest('id')->first();

        $response->assertRedirect(route('petty-cashes.edit', $pettyCash));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_petty_cash()
    {
        $pettyCash = PettyCash::factory()->create();

        $response = $this->get(route('petty-cashes.show', $pettyCash));

        $response
            ->assertOk()
            ->assertViewIs('app.petty_cashes.show')
            ->assertViewHas('pettyCash');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_petty_cash()
    {
        $pettyCash = PettyCash::factory()->create();

        $response = $this->get(route('petty-cashes.edit', $pettyCash));

        $response
            ->assertOk()
            ->assertViewIs('app.petty_cashes.edit')
            ->assertViewHas('pettyCash');
    }

    /**
     * @test
     */
    public function it_updates_the_petty_cash()
    {
        $pettyCash = PettyCash::factory()->create();

        $expesesResturant = ExpesesResturant::factory()->create();

        $data = [
            'details' => $this->faker->sentence(20),
            'debit' => $this->faker->randomNumber(0),
            'credit' => $this->faker->randomNumber(0),
            'expeses_resturant_id' => $expesesResturant->id,
        ];

        $response = $this->put(route('petty-cashes.update', $pettyCash), $data);

        $data['id'] = $pettyCash->id;

        $this->assertDatabaseHas('petty_cashes', $data);

        $response->assertRedirect(route('petty-cashes.edit', $pettyCash));
    }

    /**
     * @test
     */
    public function it_deletes_the_petty_cash()
    {
        $pettyCash = PettyCash::factory()->create();

        $response = $this->delete(route('petty-cashes.destroy', $pettyCash));

        $response->assertRedirect(route('petty-cashes.index'));

        $this->assertDeleted($pettyCash);
    }
}

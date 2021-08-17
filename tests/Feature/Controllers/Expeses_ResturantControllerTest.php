<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Expeses_Resturant;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Expeses_ResturantControllerTest extends TestCase
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
    public function it_displays_index_view_with_expeses_resturants()
    {
        $expesesResturants = Expeses_Resturant::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('expeses-resturants.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.expeses_resturants.index')
            ->assertViewHas('expesesResturants');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_expeses_resturant()
    {
        $response = $this->get(route('expeses-resturants.create'));

        $response->assertOk()->assertViewIs('app.expeses_resturants.create');
    }

    /**
     * @test
     */
    public function it_stores_the_expeses_resturant()
    {
        $data = Expeses_Resturant::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('expeses-resturants.store'), $data);

        $this->assertDatabaseHas('expeses_resturants', $data);

        $expesesResturant = Expeses_Resturant::latest('id')->first();

        $response->assertRedirect(
            route('expeses-resturants.edit', $expesesResturant)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_expeses_resturant()
    {
        $expesesResturant = Expeses_Resturant::factory()->create();

        $response = $this->get(
            route('expeses-resturants.show', $expesesResturant)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.expeses_resturants.show')
            ->assertViewHas('expesesResturant');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_expeses_resturant()
    {
        $expesesResturant = Expeses_Resturant::factory()->create();

        $response = $this->get(
            route('expeses-resturants.edit', $expesesResturant)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.expeses_resturants.edit')
            ->assertViewHas('expesesResturant');
    }

    /**
     * @test
     */
    public function it_updates_the_expeses_resturant()
    {
        $expesesResturant = Expeses_Resturant::factory()->create();

        $data = [
            'particulars' => $this->faker->text(255),
            'quantity' => $this->faker->randomNumber,
            'rate' => $this->faker->randomNumber(0),
            'ammount' => $this->faker->randomNumber(0),
        ];

        $response = $this->put(
            route('expeses-resturants.update', $expesesResturant),
            $data
        );

        $data['id'] = $expesesResturant->id;

        $this->assertDatabaseHas('expeses_resturants', $data);

        $response->assertRedirect(
            route('expeses-resturants.edit', $expesesResturant)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_expeses_resturant()
    {
        $expesesResturant = Expeses_Resturant::factory()->create();

        $response = $this->delete(
            route('expeses-resturants.destroy', $expesesResturant)
        );

        $response->assertRedirect(route('expeses-resturants.index'));

        $this->assertDeleted($expesesResturant);
    }
}

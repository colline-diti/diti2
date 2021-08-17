<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Expeses_Resturant;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Expeses_ResturantTest extends TestCase
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
    public function it_gets_expeses_resturants_list()
    {
        $expesesResturants = Expeses_Resturant::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.expeses-resturants.index'));

        $response->assertOk()->assertSee($expesesResturants[0]->particulars);
    }

    /**
     * @test
     */
    public function it_stores_the_expeses_resturant()
    {
        $data = Expeses_Resturant::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.expeses-resturants.store'),
            $data
        );

        $this->assertDatabaseHas('expeses_resturants', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.expeses-resturants.update', $expesesResturant),
            $data
        );

        $data['id'] = $expesesResturant->id;

        $this->assertDatabaseHas('expeses_resturants', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_expeses_resturant()
    {
        $expesesResturant = Expeses_Resturant::factory()->create();

        $response = $this->deleteJson(
            route('api.expeses-resturants.destroy', $expesesResturant)
        );

        $this->assertDeleted($expesesResturant);

        $response->assertNoContent();
    }
}

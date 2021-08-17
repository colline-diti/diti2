<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PettyCash;

use App\Models\ExpesesResturant;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PettyCashTest extends TestCase
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
    public function it_gets_petty_cashes_list()
    {
        $pettyCashes = PettyCash::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.petty-cashes.index'));

        $response->assertOk()->assertSee($pettyCashes[0]->details);
    }

    /**
     * @test
     */
    public function it_stores_the_petty_cash()
    {
        $data = PettyCash::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.petty-cashes.store'), $data);

        $this->assertDatabaseHas('petty_cashes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.petty-cashes.update', $pettyCash),
            $data
        );

        $data['id'] = $pettyCash->id;

        $this->assertDatabaseHas('petty_cashes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_petty_cash()
    {
        $pettyCash = PettyCash::factory()->create();

        $response = $this->deleteJson(
            route('api.petty-cashes.destroy', $pettyCash)
        );

        $this->assertDeleted($pettyCash);

        $response->assertNoContent();
    }
}

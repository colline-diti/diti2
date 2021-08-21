<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\StockDischarge;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserStockDischargesTest extends TestCase
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
    public function it_gets_user_stock_discharges()
    {
        $user = User::factory()->create();
        $stockDischarges = StockDischarge::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.stock-discharges.index', $user)
        );

        $response->assertOk()->assertSee($stockDischarges[0]->return_date);
    }

    /**
     * @test
     */
    public function it_stores_the_user_stock_discharges()
    {
        $user = User::factory()->create();
        $data = StockDischarge::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.stock-discharges.store', $user),
            $data
        );

        $this->assertDatabaseHas('stock_discharges', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $stockDischarge = StockDischarge::latest('id')->first();

        $this->assertEquals($user->id, $stockDischarge->user_id);
    }
}

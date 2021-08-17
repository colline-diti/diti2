<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Reciept;

use App\Models\ResProduct;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecieptTest extends TestCase
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
    public function it_gets_reciepts_list()
    {
        $reciepts = Reciept::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.reciepts.index'));

        $response->assertOk()->assertSee($reciepts[0]->served_by);
    }

    /**
     * @test
     */
    public function it_stores_the_reciept()
    {
        $data = Reciept::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.reciepts.store'), $data);

        $this->assertDatabaseHas('reciepts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_reciept()
    {
        $reciept = Reciept::factory()->create();

        $resProduct = ResProduct::factory()->create();

        $data = [
            'quantity' => $this->faker->randomNumber,
            'cash' => $this->faker->randomNumber(0),
            'change' => $this->faker->randomNumber(0),
            'balance' => $this->faker->randomNumber(0),
            'total' => $this->faker->randomNumber(0),
            'served_by' => $this->faker->text(255),
            'res_product_id' => $resProduct->id,
        ];

        $response = $this->putJson(
            route('api.reciepts.update', $reciept),
            $data
        );

        $data['id'] = $reciept->id;

        $this->assertDatabaseHas('reciepts', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_reciept()
    {
        $reciept = Reciept::factory()->create();

        $response = $this->deleteJson(route('api.reciepts.destroy', $reciept));

        $this->assertDeleted($reciept);

        $response->assertNoContent();
    }
}

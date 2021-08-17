<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Reciept;
use App\Models\ResProduct;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResProductRecieptsTest extends TestCase
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
    public function it_gets_res_product_reciepts()
    {
        $resProduct = ResProduct::factory()->create();
        $reciepts = Reciept::factory()
            ->count(2)
            ->create([
                'res_product_id' => $resProduct->id,
            ]);

        $response = $this->getJson(
            route('api.res-products.reciepts.index', $resProduct)
        );

        $response->assertOk()->assertSee($reciepts[0]->served_by);
    }

    /**
     * @test
     */
    public function it_stores_the_res_product_reciepts()
    {
        $resProduct = ResProduct::factory()->create();
        $data = Reciept::factory()
            ->make([
                'res_product_id' => $resProduct->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.res-products.reciepts.store', $resProduct),
            $data
        );

        $this->assertDatabaseHas('reciepts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $reciept = Reciept::latest('id')->first();

        $this->assertEquals($resProduct->id, $reciept->res_product_id);
    }
}

<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ResProduct;
use App\Models\ResSalesTable;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResProductResSalesTablesTest extends TestCase
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
    public function it_gets_res_product_res_sales_tables()
    {
        $resProduct = ResProduct::factory()->create();
        $resSalesTables = ResSalesTable::factory()
            ->count(2)
            ->create([
                'res_product_id' => $resProduct->id,
            ]);

        $response = $this->getJson(
            route('api.res-products.res-sales-tables.index', $resProduct)
        );

        $response->assertOk()->assertSee($resSalesTables[0]->product_name);
    }

    /**
     * @test
     */
    public function it_stores_the_res_product_res_sales_tables()
    {
        $resProduct = ResProduct::factory()->create();
        $data = ResSalesTable::factory()
            ->make([
                'res_product_id' => $resProduct->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.res-products.res-sales-tables.store', $resProduct),
            $data
        );

        $this->assertDatabaseHas('res_sales_tables', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $resSalesTable = ResSalesTable::latest('id')->first();

        $this->assertEquals($resProduct->id, $resSalesTable->res_product_id);
    }
}

<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ResSalesTable;

use App\Models\ResProduct;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResSalesTableTest extends TestCase
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
    public function it_gets_res_sales_tables_list()
    {
        $resSalesTables = ResSalesTable::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.res-sales-tables.index'));

        $response->assertOk()->assertSee($resSalesTables[0]->product_name);
    }

    /**
     * @test
     */
    public function it_stores_the_res_sales_table()
    {
        $data = ResSalesTable::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.res-sales-tables.store'), $data);

        $this->assertDatabaseHas('res_sales_tables', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_res_sales_table()
    {
        $resSalesTable = ResSalesTable::factory()->create();

        $resProduct = ResProduct::factory()->create();

        $data = [
            'product_name' => $this->faker->text(255),
            'price' => $this->faker->randomNumber(0),
            'res_product_id' => $resProduct->id,
        ];

        $response = $this->putJson(
            route('api.res-sales-tables.update', $resSalesTable),
            $data
        );

        $data['id'] = $resSalesTable->id;

        $this->assertDatabaseHas('res_sales_tables', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_res_sales_table()
    {
        $resSalesTable = ResSalesTable::factory()->create();

        $response = $this->deleteJson(
            route('api.res-sales-tables.destroy', $resSalesTable)
        );

        $this->assertDeleted($resSalesTable);

        $response->assertNoContent();
    }
}

<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ResSalesTable;

use App\Models\ResProduct;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResSalesTableControllerTest extends TestCase
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
    public function it_displays_index_view_with_res_sales_tables()
    {
        $resSalesTables = ResSalesTable::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('res-sales-tables.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.res_sales_tables.index')
            ->assertViewHas('resSalesTables');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_res_sales_table()
    {
        $response = $this->get(route('res-sales-tables.create'));

        $response->assertOk()->assertViewIs('app.res_sales_tables.create');
    }

    /**
     * @test
     */
    public function it_stores_the_res_sales_table()
    {
        $data = ResSalesTable::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('res-sales-tables.store'), $data);

        $this->assertDatabaseHas('res_sales_tables', $data);

        $resSalesTable = ResSalesTable::latest('id')->first();

        $response->assertRedirect(
            route('res-sales-tables.edit', $resSalesTable)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_res_sales_table()
    {
        $resSalesTable = ResSalesTable::factory()->create();

        $response = $this->get(route('res-sales-tables.show', $resSalesTable));

        $response
            ->assertOk()
            ->assertViewIs('app.res_sales_tables.show')
            ->assertViewHas('resSalesTable');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_res_sales_table()
    {
        $resSalesTable = ResSalesTable::factory()->create();

        $response = $this->get(route('res-sales-tables.edit', $resSalesTable));

        $response
            ->assertOk()
            ->assertViewIs('app.res_sales_tables.edit')
            ->assertViewHas('resSalesTable');
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

        $response = $this->put(
            route('res-sales-tables.update', $resSalesTable),
            $data
        );

        $data['id'] = $resSalesTable->id;

        $this->assertDatabaseHas('res_sales_tables', $data);

        $response->assertRedirect(
            route('res-sales-tables.edit', $resSalesTable)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_res_sales_table()
    {
        $resSalesTable = ResSalesTable::factory()->create();

        $response = $this->delete(
            route('res-sales-tables.destroy', $resSalesTable)
        );

        $response->assertRedirect(route('res-sales-tables.index'));

        $this->assertDeleted($resSalesTable);
    }
}

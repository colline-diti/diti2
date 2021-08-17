<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Sale;

use App\Models\Clients;
use App\Models\PaymentTypes;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SaleTest extends TestCase
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
    public function it_gets_sales_list()
    {
        $sales = Sale::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.sales.index'));

        $response->assertOk()->assertSee($sales[0]->product_name);
    }

    /**
     * @test
     */
    public function it_stores_the_sale()
    {
        $data = Sale::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.sales.store'), $data);

        $this->assertDatabaseHas('sales', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_sale()
    {
        $sale = Sale::factory()->create();

        $clients = Clients::factory()->create();
        $paymentTypes = PaymentTypes::factory()->create();

        $data = [
            'product_name' => $this->faker->text,
            'unit_price' => $this->faker->randomNumber(0),
            'total_price' => $this->faker->randomNumber(0),
            'discounts' => $this->faker->randomNumber(0),
            'clients_id' => $clients->id,
            'payment_types_id' => $paymentTypes->id,
        ];

        $response = $this->putJson(route('api.sales.update', $sale), $data);

        $data['id'] = $sale->id;

        $this->assertDatabaseHas('sales', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_sale()
    {
        $sale = Sale::factory()->create();

        $response = $this->deleteJson(route('api.sales.destroy', $sale));

        $this->assertDeleted($sale);

        $response->assertNoContent();
    }
}

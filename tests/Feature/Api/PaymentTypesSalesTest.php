<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Sale;
use App\Models\PaymentTypes;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentTypesSalesTest extends TestCase
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
    public function it_gets_payment_types_sales()
    {
        $paymentTypes = PaymentTypes::factory()->create();
        $sales = Sale::factory()
            ->count(2)
            ->create([
                'payment_types_id' => $paymentTypes->id,
            ]);

        $response = $this->getJson(
            route('api.all-payment-types.sales.index', $paymentTypes)
        );

        $response->assertOk()->assertSee($sales[0]->product_name);
    }

    /**
     * @test
     */
    public function it_stores_the_payment_types_sales()
    {
        $paymentTypes = PaymentTypes::factory()->create();
        $data = Sale::factory()
            ->make([
                'payment_types_id' => $paymentTypes->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.all-payment-types.sales.store', $paymentTypes),
            $data
        );

        $this->assertDatabaseHas('sales', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $sale = Sale::latest('id')->first();

        $this->assertEquals($paymentTypes->id, $sale->payment_types_id);
    }
}

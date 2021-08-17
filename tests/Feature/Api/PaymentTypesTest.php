<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PaymentTypes;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentTypesTest extends TestCase
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
    public function it_gets_all_payment_types_list()
    {
        $allPaymentTypes = PaymentTypes::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-payment-types.index'));

        $response->assertOk()->assertSee($allPaymentTypes[0]->payment_name);
    }

    /**
     * @test
     */
    public function it_stores_the_payment_types()
    {
        $data = PaymentTypes::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.all-payment-types.store'),
            $data
        );

        $this->assertDatabaseHas('payment_types', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_payment_types()
    {
        $paymentTypes = PaymentTypes::factory()->create();

        $data = [
            'payment_name' => $this->faker->name,
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->putJson(
            route('api.all-payment-types.update', $paymentTypes),
            $data
        );

        $data['id'] = $paymentTypes->id;

        $this->assertDatabaseHas('payment_types', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_payment_types()
    {
        $paymentTypes = PaymentTypes::factory()->create();

        $response = $this->deleteJson(
            route('api.all-payment-types.destroy', $paymentTypes)
        );

        $this->assertDeleted($paymentTypes);

        $response->assertNoContent();
    }
}

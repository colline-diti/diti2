<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\PaymentTypes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentTypesControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_payment_types()
    {
        $allPaymentTypes = PaymentTypes::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-payment-types.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_payment_types.index')
            ->assertViewHas('allPaymentTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_payment_types()
    {
        $response = $this->get(route('all-payment-types.create'));

        $response->assertOk()->assertViewIs('app.all_payment_types.create');
    }

    /**
     * @test
     */
    public function it_stores_the_payment_types()
    {
        $data = PaymentTypes::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-payment-types.store'), $data);

        $this->assertDatabaseHas('payment_types', $data);

        $paymentTypes = PaymentTypes::latest('id')->first();

        $response->assertRedirect(
            route('all-payment-types.edit', $paymentTypes)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_payment_types()
    {
        $paymentTypes = PaymentTypes::factory()->create();

        $response = $this->get(route('all-payment-types.show', $paymentTypes));

        $response
            ->assertOk()
            ->assertViewIs('app.all_payment_types.show')
            ->assertViewHas('paymentTypes');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_payment_types()
    {
        $paymentTypes = PaymentTypes::factory()->create();

        $response = $this->get(route('all-payment-types.edit', $paymentTypes));

        $response
            ->assertOk()
            ->assertViewIs('app.all_payment_types.edit')
            ->assertViewHas('paymentTypes');
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

        $response = $this->put(
            route('all-payment-types.update', $paymentTypes),
            $data
        );

        $data['id'] = $paymentTypes->id;

        $this->assertDatabaseHas('payment_types', $data);

        $response->assertRedirect(
            route('all-payment-types.edit', $paymentTypes)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_payment_types()
    {
        $paymentTypes = PaymentTypes::factory()->create();

        $response = $this->delete(
            route('all-payment-types.destroy', $paymentTypes)
        );

        $response->assertRedirect(route('all-payment-types.index'));

        $this->assertDeleted($paymentTypes);
    }
}

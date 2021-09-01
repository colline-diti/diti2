<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sale::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->text,
            'unit_price' => $this->faker->randomNumber(0),
            'total_price' => $this->faker->randomNumber(0),
            'discounts' => $this->faker->randomNumber(0),
            'clients_id' => \App\Models\Clients::factory(),
            'payment_types_id' => \App\Models\PaymentTypes::factory(),
        ];
    }
}

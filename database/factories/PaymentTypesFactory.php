<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\PaymentTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentTypesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaymentTypes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payment_name' => $this->faker->name,
            'description' => $this->faker->sentence(15),
        ];
    }
}

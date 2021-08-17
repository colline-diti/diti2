<?php

namespace Database\Factories;

use App\Models\Reciept;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecieptFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reciept::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity' => $this->faker->randomNumber,
            'cash' => $this->faker->randomNumber(0),
            'change' => $this->faker->randomNumber(0),
            'balance' => $this->faker->randomNumber(0),
            'total' => $this->faker->randomNumber(0),
            'served_by' => $this->faker->text(255),
            'res_product_id' => \App\Models\ResProduct::factory(),
        ];
    }
}

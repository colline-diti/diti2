<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ProductParticulars;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductParticularsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductParticulars::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'particulars' => $this->faker->text(255),
            'quantity' => $this->faker->randomNumber,
            'product_id' => \App\Models\Product::factory(),
        ];
    }
}

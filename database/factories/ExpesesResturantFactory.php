<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ExpesesResturant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpesesResturantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExpesesResturant::class;

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
            'rate' => $this->faker->randomNumber(0),
            'ammount' => $this->faker->randomNumber(0),
        ];
    }
}

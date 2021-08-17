<?php

namespace Database\Factories;

use App\Models\PettyCash;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PettyCashFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PettyCash::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'details' => $this->faker->sentence(20),
            'debit' => $this->faker->randomNumber(0),
            'credit' => $this->faker->randomNumber(0),
            'expeses_resturant_id' => \App\Models\ExpesesResturant::factory(),
        ];
    }
}

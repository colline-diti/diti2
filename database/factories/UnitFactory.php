<?php

namespace Database\Factories;

use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Unit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'unit_name' => $this->faker->text(255),
            'unit_description' => $this->faker->text,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\TaxRates;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxRatesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaxRates::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tax_name' => $this->faker->text(255),
            'rate' => $this->faker->text(255),
        ];
    }
}

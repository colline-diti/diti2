<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ResSalesTable;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResSalesTableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ResSalesTable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->text(255),
            'price' => $this->faker->randomNumber(0),
            'res_product_id' => \App\Models\ResProduct::factory(),
        ];
    }
}

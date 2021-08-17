<?php

namespace Database\Factories;

use App\Models\ResProduct;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ResProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->text(255),
            'product_price' => $this->faker->randomNumber(0),
            'category' => $this->faker->text(255),
            'res_category_id' => \App\Models\ResCategory::factory(),
        ];
    }
}

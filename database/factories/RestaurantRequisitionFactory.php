<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\RestaurantRequisition;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantRequisitionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RestaurantRequisition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item_name' => $this->faker->text(255),
            'quantity' => $this->faker->randomNumber,
            'dateofDelivery' => $this->faker->text(255),
            'status' => $this->faker->word,
            'Particulars' => $this->faker->text(255),
        ];
    }
}

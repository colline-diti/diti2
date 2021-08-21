<?php

namespace Database\Factories;

use App\Models\StockTable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockTableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StockTable::class;

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
            'remarks' => $this->faker->sentence(15),
            'item_category_id' => \App\Models\ItemCategory::factory(),
            'unit_id' => \App\Models\Unit::factory(),
        ];
    }
}

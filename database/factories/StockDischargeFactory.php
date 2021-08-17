<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\StockDischarge;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockDischargeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StockDischarge::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity_issued' => $this->faker->randomNumber(0),
            'section' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
            'issued_by' => $this->faker->text(255),
            'stock_table_id' => \App\Models\StockTable::factory(),
            'res_section_id' => \App\Models\ResSection::factory(),
        ];
    }
}

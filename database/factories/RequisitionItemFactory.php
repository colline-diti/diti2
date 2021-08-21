<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\RequisitionItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequisitionItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RequisitionItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'restaurant_requisition_id' => \App\Models\RestaurantRequisition::factory(),
        ];
    }
}

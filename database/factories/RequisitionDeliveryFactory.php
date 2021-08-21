<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\RequisitionDelivery;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequisitionDeliveryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RequisitionDelivery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item_quantity' => $this->faker->text(255),
            'delivery_date' => $this->faker->date,
            'remarks' => $this->faker->text(255),
            'requisition_item_id' => \App\Models\RequisitionItem::factory(),
        ];
    }
}

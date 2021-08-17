<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\AssetsAccounts;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssetsAccountsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AssetsAccounts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'asset_name' => $this->faker->name,
            'quantity' => $this->faker->randomNumber,
            'supplier' => $this->faker->text(255),
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'asset_types_id' => \App\Models\AssetTypes::factory(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\ResSection;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResSectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ResSection::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'section_name' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
        ];
    }
}

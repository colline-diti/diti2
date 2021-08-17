<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RestaurantRequisition;

class RestaurantRequisitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RestaurantRequisition::factory()
            ->count(5)
            ->create();
    }
}

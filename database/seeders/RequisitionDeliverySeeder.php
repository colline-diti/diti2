<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RequisitionDelivery;

class RequisitionDeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RequisitionDelivery::factory()
            ->count(5)
            ->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\StockDischarge;
use Illuminate\Database\Seeder;

class StockDischargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StockDischarge::factory()
            ->count(5)
            ->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\StockTable;
use Illuminate\Database\Seeder;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StockTable::factory()
            ->count(5)
            ->create();
    }
}

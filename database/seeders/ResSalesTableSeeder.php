<?php

namespace Database\Seeders;

use App\Models\ResSalesTable;
use Illuminate\Database\Seeder;

class ResSalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResSalesTable::factory()
            ->count(5)
            ->create();
    }
}

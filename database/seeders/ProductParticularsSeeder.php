<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductParticulars;

class ProductParticularsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductParticulars::factory()
            ->count(5)
            ->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\ResProduct;
use Illuminate\Database\Seeder;

class ResProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResProduct::factory()
            ->count(5)
            ->create();
    }
}

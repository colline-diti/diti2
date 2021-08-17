<?php

namespace Database\Seeders;

use App\Models\ResCategory;
use Illuminate\Database\Seeder;

class ResCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResCategory::factory()
            ->count(5)
            ->create();
    }
}

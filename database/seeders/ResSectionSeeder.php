<?php

namespace Database\Seeders;

use App\Models\ResSection;
use Illuminate\Database\Seeder;

class ResSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResSection::factory()
            ->count(5)
            ->create();
    }
}

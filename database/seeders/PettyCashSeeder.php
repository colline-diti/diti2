<?php

namespace Database\Seeders;

use App\Models\PettyCash;
use Illuminate\Database\Seeder;

class PettyCashSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PettyCash::factory()
            ->count(5)
            ->create();
    }
}

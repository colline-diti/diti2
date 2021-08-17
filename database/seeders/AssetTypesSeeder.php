<?php

namespace Database\Seeders;

use App\Models\AssetTypes;
use Illuminate\Database\Seeder;

class AssetTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AssetTypes::factory()
            ->count(5)
            ->create();
    }
}

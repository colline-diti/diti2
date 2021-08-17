<?php

namespace Database\Seeders;

use App\Models\AssetsAccounts;
use Illuminate\Database\Seeder;

class AssetsAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AssetsAccounts::factory()
            ->count(5)
            ->create();
    }
}

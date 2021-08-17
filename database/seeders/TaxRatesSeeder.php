<?php

namespace Database\Seeders;

use App\Models\TaxRates;
use Illuminate\Database\Seeder;

class TaxRatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaxRates::factory()
            ->count(5)
            ->create();
    }
}

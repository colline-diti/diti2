<?php

namespace Database\Seeders;

use App\Models\PaymentTypes;
use Illuminate\Database\Seeder;

class PaymentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentTypes::factory()
            ->count(5)
            ->create();
    }
}

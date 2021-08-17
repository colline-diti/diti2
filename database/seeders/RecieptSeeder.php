<?php

namespace Database\Seeders;

use App\Models\Reciept;
use Illuminate\Database\Seeder;

class RecieptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reciept::factory()
            ->count(5)
            ->create();
    }
}

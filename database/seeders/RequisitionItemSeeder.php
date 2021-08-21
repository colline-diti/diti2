<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RequisitionItem;

class RequisitionItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RequisitionItem::factory()
            ->count(5)
            ->create();
    }
}

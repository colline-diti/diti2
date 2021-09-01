<?php

namespace App\Exports;

use App\Models\available_stock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users = DB::table('available_stock')
            ->select("*")
            ->get();
        return $users;
    }
}

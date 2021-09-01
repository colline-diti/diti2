<?php

namespace App\Http\Controllers;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class Available_stockController extends Controller
{
    //
    public function export() 
    {
        return Excel::download(new UsersExport, 'curentStock.xlsx');
    }
}

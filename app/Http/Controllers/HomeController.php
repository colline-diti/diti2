<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

     /**
     * Show the cafe dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cafeDashboard()
    {
        return view('cafeDashboard');
    }

    public function userDashboard()
    {
        return view('userDashboard');
    }

     /**
     * Show the pointOfsale.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pointOfsale()
    {
        return view('pointOfsale');
    }
}

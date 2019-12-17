<?php

namespace App\Http\Controllers;
use Gate;
use App\Pricing;
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
       
        $this->middleware('can:dashboardPermission');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $services = Pricing::all();
        return view('home', compact('services'));
    }
}

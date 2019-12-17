<?php

namespace App\Http\Controllers;

use App\Order;
use App\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('can:dashboardPermission');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'order-name' => 'required | min:4',
            'customer-name' => 'required | min:4',
            'email' => 'required | email',
            'service-type' => 'required | min:4',
            'qty' => 'required',
            'provide-content' => 'required',
            'fast-delivery' => 'required'
        ]);
        $service = new Princing();
        $service->email = $request->email;
        $service->save();
        return redirect()->back()->with('success', 'You\'ve Succesfffully Subscribed');
    }



    public function edit(Pricing $pricing)
    {
        //
    }

    public function update(Request $request, Pricing $pricing)
    {
        //
    }

    
    public function destroy(Pricing $pricing)
    {
        //
    }
}

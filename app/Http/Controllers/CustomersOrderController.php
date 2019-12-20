<?php

namespace App\Http\Controllers;

use auth;
use App\User;
use App\Order;
use App\Contact;
use App\Pricing;
use Illuminate\Http\Request;

class CustomersOrderController extends Controller
{

    // public function welcome()
    // {
    //     return view('welcome');
    // }

    public function index()
    {
        $services = Pricing::where('status', true)->get();
        return view('pricing', compact('services'));
    }
    
    public function storeOrder(Request $request, User $user)
    {
        $this->validate($request,[
            'order_name' => 'required',
            'customer_name' => Auth::guest() ? 'required' : '',
            'email' => Auth::guest() ? 'required' : '',
            'service_type' => 'required',
            'qty' => 'required',
            'provide_content' => 'required',
            'fast_delivery' => 'required',
            'message' => 'required'
        ]);
        $order = new Order();
        $order->order_number = rand();
        $order->order_name = $request->order_name;
        $order->pricing_id = $request->pricing_id;
        $order->user_id = Auth::check() ? Auth::user()->id : 0 ;
        $order->customer_name = Auth::check() ? Auth::user()->name : $request->customer_name;
        $order->email = Auth::check() ? Auth::user()->email : $request->email;
        $order->service_type = $request->service_type;
        $order->qty = $request->qty;
        $order->provide_content = $request->provide_content;
        $order->fast_delivery = $request->fast_delivery;
        $order->country = $request->country ? $request->country : 'World Wide';
        $order->amount = $request->amount;
        $order->message = $request->message;
        $order->amount_spent = $order->amount * $order->qty;
        $order->save();
        return redirect()->back()->with('success', 'You\'ve succesfffully placed your order');
    }

    public function show(Pricing $pricing, $slug)
    {
        $pricing = Pricing::where('slug',$slug)->first();
        return view('order', compact('pricing'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function customOrder(Request $request, User $user)
    {
        $this->validate($request,[
            'name' => Auth::guest() ? 'required' : '',
            'email' => Auth::guest() ? 'required' : '',
            'subject' => 'required' ,
            'message' => 'required'
        ]);
        $customOrder = new Contact();
        $customOrder->user_id = Auth::check() ? Auth::user()->id : 0 ;
        $customOrder->name = Auth::check() ? Auth::user()->name : $request->name;
        $customOrder->email = Auth::check() ? Auth::user()->email : $request->email;
        $customOrder->subject = $request->subject;
        $customOrder->message = $request->message;
        $customOrder->save();
        return redirect()->back()->with('success', 'You\'ve succesfffully placed your order');
    }

}

<?php

namespace App\Http\Controllers;
use App\Order;
use App\Contact;
use App\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
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
    
    public function contactList()
    {
        $contacts = Contact::all();
        return view('services.contactlist', compact('contacts'));
    }

    public function create()
    {
       return view('services.create');
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'service_name' => 'required',
            'price' => 'required',
        ]);
        $slug = str_slug($request->service_name);
        $service = new Pricing();
        $service->service_name = $request->service_name;
        $service->price = $request->price;
        $service->slug = $slug;
        $service->save();
        return redirect()->route('home')->with('success', ' Service created Succesfffully');
    }

    
    // public function show($id)
    // {
    //     //
    // }

    public function Orders()
    {
        $orders = Order::all();
        return view('services.orders', compact('orders'));
    }

    public function status(Pricing $pricing, $id)
    {
       $pricing = Pricing::find($id);
        if($pricing->status == true){
            $pricing->update(['status' => false]);
            $pricing->save();
            return redirect()->back()->with('success', 'You\'ve Succesfffully Updated Service Status');
        }
        else
        {
            $pricing->status = false;
            $pricing->update(['status' => true]);
            $pricing->save();
            return redirect()->back()->with('success', 'You\'ve Succesfffully Updated Service Status');
        }
    }

    public function OrderisCompleted(Order $order, $id)
    {
            $pricing = Order::find($id);
            if($pricing->status == true){
                if($pricing->completed == true){
                    $pricing->update(['completed' => false]);
                    $pricing->save();
                    return redirect()->back()->with('success', 'You\'ve Succesfffully Updated Service Status');
                }
                else
                {
                    $pricing->completed = false;
                    $pricing->update(['completed' => true]);
                    $pricing->save();
                    return redirect()->back()->with('success', 'You\'ve Succesfffully Updated Service Status');
                }
            }
            else{
                return redirect()->back()->with('warning', 'Inactive order cannot completed');
            }
        }

    public function Orderstatus(Order $order, $id)
    {
        $order = Order::find($id);
        if($order->completed == false){
            if($order->status == false){
                $order->update(['status' => true]);
                $order->save();
                return redirect()->back()->with('success', 'You\'ve Succesfffully Updated Order Status');
            }

            else
            {
                $order->status == true;
                $order->update(['status' => false]);
                $order->save();
                return redirect()->back()->with('success', 'You\'ve Succesfffully Updated Order Status');
            }
        }
        else{
            return redirect()->back()->with('warning', 'Completed Order Cannot be Inactive');
        }
    }

    
    public function edit($id)
    {
        $service = Pricing::find($id);
        return view('services.edit', compact('service'));
    }

    public function ContactisCompleted(Contact $contact, $id)
    {
       $contact = Contact::find($id);
       if($contact->status == true){
            if($contact->completed == true){
                $contact->update(['completed' => false]);
                $contact->save();
                return redirect()->back()->with('success', 'You\'ve Succesfffully Updated Service Status');
            }
            else
            {
                $contact->completed = false;
                $contact->update(['completed' => true]);
                $contact->save();
                return redirect()->back()->with('success', 'You\'ve Succesfffully Updated Service Status');
            }
       }
       else{
        return redirect()->back()->with('warning', 'Inactive order cannot completed');
       }
    }

    public function ContactStatus(Contact $contact, $id)
    {
       $contact = Contact::find($id);
       if($contact->completed == false){
            if($contact->status == true){
                $contact->update(['status' => false]);
                $contact->save();
                return redirect()->back()->with('success', 'You\'ve Succesfffully Updated Service Status');
            }
            else
            {
                $contact->status = false;
                $contact->update(['status' => true]);
                $contact->save();
                return redirect()->back()->with('success', 'You\'ve Succesfffully Updated Service Status');
            }
        }
        else{
            return redirect()->back()->with('warning', 'Completed Order Cannot be Inactive');
        }
    }

    public function update(Request $request, $id)
    {
        $service = Pricing::findOrFail($id);
        
        $this->validate($request,['service_name' => 'required','price' => 'required',]);
        
        $service->update($request->all());
        return redirect()->route('home')->with('success', ' Service Updated Succesfffully');
    }

    // public function destroy($id)
    // {
    //     //
    // }
}

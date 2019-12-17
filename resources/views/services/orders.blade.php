@extends('layouts.app')

@section('content')

<div class="container"style=" max-width: 100vw" >
    <div class="row ">
        <div class="col-md-12 col-lg-12 ">
            <div class="card">
                <div class="card-header">List of Orders
                <a href="{{route('home')}}" class="btn btn-success" style="float: right" >Dashbaord</a>
                </div>
                @include('layouts.frontend.partial.message')
                <table class="table table-responsive">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Service Name</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Customer Email</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Service Type</th>
                        <th scope="col">Provide Cont.</th>
                        <th scope="col">Fast ?.</th>
                        <th scope="col">Targeted Country</th>
                        <th scope="col">Message</th>
                        <th scope="col">Status</th>
                        <th scope="col">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{$order->order_number}}</th>
                                <td>{{$order->order_name}}</td>
                                <td>{{$order->customer_name}}</td>
                                <td>{{$order->email}}</td>
                                <td>$ {{$order->amount}}</td>
                                <td>{{$order->qty}}</td>
                                <td>$ {{$order->amount_spent}}</td>
                                <td>{{$order->service_type}}</td>
                                <td>{{$order->provide_content}}</td>
                                <td>{{$order->fast_delivery}}</td>
                                <td>{{$order->country}}</td>
                                <td>{{$order->message}}</td>
                                <td class="d-flex"> 
                                    <form action="{{route('order.status', $order->id )}}" method="post">
                                     @csrf  @method('patch')
                                        <button type="submit" class="btn {{$order->status == true ? 'btn-success' : 'btn-danger'}}">{{$order->status == true ? 'Confirmed' : 'Inactive'}}</button>
                                   </form>
                                   <form action="{{route('order.completed', $order->id )}}" method="post">
                                     @csrf  @method('patch')
                                        <button type="submit" class="btn ml-1  {{$order->completed == true ? 'btn-success' : 'btn-warning'}}">{{$order->completed == true ? 'Completed' : 'Processing'}}</button>
                                   </form>
                                </td>
                                <td>{{$order->created_at->toFormattedDateString()}}</td>
                                <!-- <td> 
                                    <a href="" class="btn btn-success">Edit</a>
                                </td> -->
                            </tr>
                            <tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection

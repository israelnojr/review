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
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Customer Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Status</th>
                        <th scope="col">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $order)
                            <tr>
                                <td>{{$order->name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->subject}}</td>
                                <td>{{$order->message}}</td>
                                <td class="d-flex"> 
                                    <form action="{{route('contactlist.update', $order->id )}}" method="post">
                                     @csrf  @method('patch')
                                        <button type="submit" class="btn {{$order->status == true ? 'btn-success' : 'btn-danger'}}">{{$order->status == true ? 'Confirmed' : 'Inactive'}}</button>
                                   </form>
                                   <form action="{{route('contactlist.completed', $order->id )}}" method="post">
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

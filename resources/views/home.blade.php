@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{route('service.create')}}" class="btn btn-success">Create Service</a>
                    <a href="{{route('orders')}}" class="btn btn-success float-right">View Orders</a>
                   @can('edit-user')
                    <a href="{{route('admin.users.index')}}" class="btn btn-primary"style="margin-left:5px">Manage Users</a>
                   @endcan
                    <a href="{{route('contactlist')}}" class="btn btn-warning"style="margin-left:5px">Custom Orders</a>
                </div>
                @include('layouts.frontend.partial.message')
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of services</div>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Service Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr>
                                <th scope="row">{{$service->id}}</th>
                                <td>{{$service->service_name}}</td>
                                <td>$ {{$service->price}}</td>
                                <td> 
                                    <form action="{{route('service.status', $service->id )}}" method="post">
                                     @csrf  @method('patch')
                                        <button type="submit" class="btn {{$service->status == true ? 'btn-success' : 'btn-danger'}}">{{$service->status == true ? 'Active' : 'Inactive'}}</button>
                                   </form>
                                </td>
                                <td> 
                                    <a href="{{route('service.edit', $service->id)}}" class="btn btn-success">Edit</a>
                                </td>
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

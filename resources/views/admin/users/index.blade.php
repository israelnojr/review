@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center"> <span>List of Users</span>
                <a href="{{route('home')}}" class="float-right btn btn-primary ml-2">Dashboard</a href="{{route('home')}}">
                </div>
                @include('layouts.frontend.partial.message')
                <table class="table table-stripped">
                    <thead class="thead-dark">  
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                            <td class="d-flex justify-content-space-between"> 
                                <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-success">Edit</a>
                                <form action="{{route('admin.users.destroy', $user)}}" method="post">
                                    @csrf() @method('delete')
                                    <button type="submit" class="btn btn-danger ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection

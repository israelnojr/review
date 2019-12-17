@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>
                <div class="card-body">
                   <form action="{{route('admin.users.update', $user->id)}}" method="post"> 
                        @csrf @method('put')
                    <label for="name" class="col-md-8 col-form-label text-md-left">{{ __('Roles') }}</label>
                    <div class="form-role d-flex">
                    @foreach($roles as $role)
                        <div class="form-check">
                            <input type="checkbox" name="roles[]" value="{{$role->id}}"
                            @if($user->roles->pluck('id')->contains($role->id)) checked @endif >
                            <label for="roles">{{$role->name}}</label>
                        </div>
                    @endforeach
                    </div>
                    <!-- <div class="form-group">
                        <label for="name" class="col-md-8 col-form-label text-md-left">{{ __('Name') }}</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                            @error('service_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger">Save</button>
                    </div>
                   </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
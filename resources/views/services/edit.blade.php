@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                <span>Edit Service</span>
                <a href="{{route('home')}}" class="btn btn-success ml-3" style="float: right" >Dashbaord</a>
                </div>
                <div class="card-body">
                   <form action="{{route('service.update', $service->id)}}" method="post"> 
                        @csrf 
                        <div class="col-md-8">
                            <input id="service_name" type="text" class="form-control @error('service_name') is-invalid @enderror" name="service_name" 
                            value="{{$service->service_name}}" required autocomplete="name" autofocus>
                            
                        </div>
                        <br>
                        <div class="col-md-8">
                            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" 
                            value="{{$service->price}}" required autocomplete="name" autofocus>
                           
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger ml-4">Save</button>
                        </div>
                   </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
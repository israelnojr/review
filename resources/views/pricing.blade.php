@extends('layouts.frontend.app')
@section('content')
<!--==========================
      Why Us Section
    ============================-->
    <br><br><br>
    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Prices & Services</h3>
          <p>Choose from our best ranges of deals which services best suit your budget.</p>
        </header>
        @include('layouts.frontend.partial.message')
        <div class="row row-eq-height justify-content-center">
        @foreach($services as $service)
          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <!-- <i class="fa fa-facebook"></i> -->
              <div class="card-body">
                <h5 class="card-title">{{$service->service_name}}</h5>
                <p class="card-text"> 
                    <span class="price">$ {{$service->price}}</span> 
                    <strong>Per Review</strong>
                </p> 
                @guest
                  <a data-toggle="modal" data-target="#exampleModal" class="readmore">Order Now</a>
                  @else
                  <a href="{{ route('order', $service->slug) }}" class="readmore">Order Now</a>
                @endguest
              </div>
            </div>
          </div>
         <!-- end of pricing -->
          <!-- Button trigger modal -->
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">You're not logged in, <a href="{{ route('login') }}">Please click to login</a></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                 We would recommend you login, if you want to keep track of your orders.
                </div>
                <div class="modal-footer">
                  <a href="{{ route('register') }}" class="btn btn-secondary">Please register me</a>
                  <a href="{{ route('order', $service->slug) }}" class="btn btn-primary">No i want to continue checkout</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
            <div class="col-lg-12 mb-12">
            <div class="card wow bounceInUp">
              <div class="card-body">
               <span>Request a Custom</span> <a href="{{route('contact')}}" class="readmore">Order</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
@endsection
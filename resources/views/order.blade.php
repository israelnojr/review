@extends('layouts.frontend.app')
@section('content')

 <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container-fluid">

        <div class="section-header">
          <!-- <h3>Contact Us</h3> -->
        </div>
      
        <div class="row wow fadeInUp">
        <div class="form col-lg-8 offset-sm-2 col-md-8 center d-flex" >
          @include('layouts.frontend.partial.message')
        </div>
            <div class="form col-lg-8 offset-sm-2 col-md-8 center" >
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action=" {{ route('pay-order') }} " method="post" role="form" class="contactForm">
                  @csrf()
                <div class="form-row">
                  <div class="form-group {{ Auth::guest() ? 'col-lg-6 ' : 'col-lg-12'}}">
                    <input type="text" name="order_name" class="form-control" id="order_name"   value="{{ old('order_name') }}"
                     placeholder="Name Your Order" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                  @guest
                    <div class="form-group col-lg-6">
                      <input type="text" name="customer_name" class="form-control" id="customer_name" value="{{ old('customer_name') }}"   
                      placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                      <div class="validation"></div>
                    </div>
                  @endguest
                    <div class="form-group col-lg-12">
                    <input type="hidden" name="pricing_id" class="form-control" id="price_id" value="{{$pricing->id}}" />
                      <div class="validation"></div>
                    </div>
                  @guest
                  <div class="form-group col-lg-12">
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                    placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                  @endguest
                  <div class="form-group col-lg-12">
                  <input type="hidden" name="amount" class="form-control" id="amount" value="{{$pricing->price}}" />
                    <div class="validation"></div>
                  </div>
             
                  <div class="form-group col-lg-6">
                    <input type="hidden" name="service_type" class="form-control" id="service_type" value="{{$pricing->service_name}}" />
                    <div class="validation"></div>
                  </div>
                   
                    <div class="form-group col-lg-12">
                      <input type="number" name="qty" class="form-control" id="qty" value="1" min="1" value="{{ old('number') }}" />
                      <div class="validation"></div>
                    </div>
                    <div class="form-group  col-lg-6">
                      <select type="text" class="form-control" name="provide_content" id="subject"> 
                          <option value="{{ old('provide_content') }}">Will you be providing the review content</option>
                          <option value="yes">Yes</option>
                          <option value="no">No</option>
                      </select>
                      <div class="validation"></div>
                    </div>
                    <div class="form-group  col-lg-6">
                      <select type="text" class="form-control" name="fast_delivery" id="subject"> 
                          <option value="{{ old('provide_content') }}">Do you need drip feed delivery</option>
                          <option value="yes">Yes</option>
                          <option value="no">No</option>
                      </select>
                      <div class="validation"></div>
                    </div>
                    <div class="form-group col-lg-12">
                      <input type="text" name="country" class="form-control" id="country" placeholder="Specific Country" value="{{ old('country') }}" />
                      <div class="validation"></div>
                    </div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Special Instructions">{{ old('message') }}</textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">Proceed To Checkout</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

    @endsection
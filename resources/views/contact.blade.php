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
            <form action=" {{ route('customorder') }} " method="post" role="form" class="contactForm">
                  @csrf()
                <div class="form-row">
                @guest
                  <div class="form-group {{ Auth::guest() ? 'col-lg-6 ' : 'col-lg-12'}}">
                    <input type="text" name="name" class="form-control"  value="{{ old('name') }}"
                     placeholder="Full Name" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group {{ Auth::guest() ? 'col-lg-6 ' : 'col-lg-12'}}">
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                    placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                  @endguest
                    <div class="form-group col-lg-12">
                      <input type="text" name="subject" class="form-control" id="subject" placeholder="Specific subject" value="{{ old('subject') }}" />
                      <div class="validation"></div>
                    </div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Special Instructions">{{ old('message') }}</textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">Send</button></div>
              </form>
          </div>
        </div>

      </div>

    </div>
  </section><!-- #contact -->

  @endsection

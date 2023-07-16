@extends('layout')

@section('content')
 <section id="hero" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Better Digital Experience With DigiLoc</h1>
    
          <h3 style="color:white">Your Own Online Locker  </h3>
          <h5 style="color:white">Store and Secure Your Documents</h5>
          <div><a href="login" class="btn-get-started scrollto">Get Started</a></div>
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="{{asset('img/hero-img.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
@endsection
@extends('layouts.main')
@section('content')
  <section class="hero-banner d-flex align-items-center">
    <video id="myVideo" class="animated fadeIn delay-1s" width="100%" height="800" preload="yes" loop autoplay muted playsinline>
        <source src="{{asset('landing_page')}}/video/Plexus-Loop.mp4" type="video/mp4">
      <source src="{{asset('landing_page')}}/video/Plexus-Loop.ogv" type="video/ogv">
      <source src="{{asset('landing_page')}}/video/Plexus-Loop.webm" type="video/webm">
      Your browser does not support the video tag.
    </video> 
    <div class="container">
      <h1 class="animated fadeIn delay-1s">DRIVING PROFITABILITY THROUGH EFFECTIVE NEGOTIATION</h1>
      <p class="animated fadeIn delay-2s">Delivering world class negotiation consulting and training services</p>
      <div class="banner-down-arrow animated fadeIn delay-3s">
        <a class="js-scroll-trigger" href="#services">
          <img src="{{ asset('landing_page') }}/images/white-down-arrow.png" alt="white-down-arrow" class="normal"/>
          <img src="{{ asset('landing_page') }}/images/yellow-down-arrow.png" alt="yellow-down-arrow" class="hover"/>
        </a>
        <button onclick="playVid()" type="button" id="buttonId" style="display: none;">Play Video</button>
      </div>
    </div>
  </section><!-- hero banner -->

@if(!empty($negotiations))
  <section id="services" class="sapceTB100 services-content">
    <div class="container">
      <div class="row">
        <h2 class="col-12 section-title wow fadeIn">What We Do</h2>

        <div class="col-12 text-center consulting-content  wow fadeIn">
          <h3 class="heading"><a href="{{route('consulting')}}">Negotiation Consulting</a></h3>
          <p>Deal specific, bespoke solutions, helping your team maximize their potential in any negotiation. Employing our rigorous 8 step negotiation process along with tried and tested behavioral frameworks and decades worth of real world commercial negotiation experience, we consistently exceed our clients expectations.</p>
          <div class="video-frame">
           <div class="earth-video  brain-video">
              <video id="brainVideo" class="animated fadeIn delay-1s" width="100%" height="400" preload="yes" loop autoplay muted playsinline>
                <source src="{{asset('landing_page')}}/video/brain.mp4" type="video/mp4">
                <source src="{{asset('landing_page')}}/video/brain.ogv" type="video/ogv">
                <source src="{{asset('landing_page')}}/video/brain.webm" type="video/webm">
                Your browser does not support the video tag.
              </video> 
              <button onclick="playVid()" type="button" id="brainVideoButton" style="display: none;">Play Video</button>
            </div>
          </div>
        </div>
        <h3 class="col-12 heading text-center wow fadeIn">Negotiation Workshops</h3>
        <div class="col-12 col-md-4 workshop-level wow fadeIn">
          <h4><a href="{{route('negotiation','LV1')}}">Negotiation / <span>LV1</span></a></h4>
          <p>{{$negotiations->description1}}</p>
        </div>
        <div class="col-12 col-md-4 workshop-level wow fadeIn">
          <h4><a href="{{route('negotiation','LV2')}}">Negotiation / <span>LV2</span></a></h4>
          <p>{{$negotiations->description2}}</p>
        </div>
        <div class="col-12 col-md-4 workshop-level wow fadeIn">
          <h4><a href="{{route('negotiation','LV3')}}">Negotiation / <span>LV3</span></a></h4>
          <p>{{$negotiations->description3}}</p>
        </div>
        <div class="col-12 wow fadeIn">
          <div class="video-frame workshop-video">
            <div class="earth-video">
              <video id="earthVideo" class="animated fadeIn delay-1s" width="100%"  height="275" preload="yes" loop autoplay muted playsinline>
                <source src="{{asset('landing_page')}}/video/earth.mp4" type="video/mp4">
                <source src="{{asset('landing_page')}}/video/earth.ogv" type="video/ogv">
                <source src="{{asset('landing_page')}}/video/earth.webm" type="video/webm">
                Your browser does not support the video tag.
              </video> 
              <button onclick="playVid()" type="button" id="earthVideoButton" style="display: none;">Play Video</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- service end -->
@endif

@if(!empty($meet_maker))
  <section id="about" class="sapceTB100 goldenBg about-maker">
    <div class="container">
      <div class="row">
        <h2 class="col-12 section-title wow fadeIn">Meet Maker</h2>
        <div class="col-12 col-md-4 text-center wow fadeIn">
          <figure><img src="{{ asset('landing_page') }}/images/story.png" alt="Our Story" /></figure>
          <h5>Our Story</h5>
          <p>{{$meet_maker->description1}}</p>
        </div>
        <div class="col-12 col-md-4 text-center wow fadeIn">
          <figure><img src="{{ asset('landing_page') }}/images/vision.png" alt="Our Vision" /></figure>
          <h5>Our Vision</h5>
          <p>{{$meet_maker->description2}}</p>
        </div>
        <div class="col-12 col-md-4 text-center wow fadeIn">
          <figure><img src="{{ asset('landing_page') }}/images/methodology.png" alt="Our Methodology" /></figure>
          <h5>Our Methodology</h5>
          <p>{{$meet_maker->description3}}</p>
        </div>
      </div>
    </div>
  </section><!-- about end -->
  @endif
  @include('layouts.page_templates.contact_form')
  @endsection
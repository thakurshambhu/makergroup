@extends('layouts.inner_main')
@section('content')
<section class="fromation-style">
    <div class="container ">
      <div class="row">
        <div class="col-12">
          <h1 class="page-title">{{$pageDetails['page_name']}} / <span>{{$pageDetails['title']}}</span> </h1>
          <div class="sub-heading">{{$pageDetails['subtitle']}}</div>

          <div class="content-style-frame spaceTB30">
            <p>{{$pageDetails['description']}}</p>
          </div>
        </div> 
      </div>

      <div class="row">
        <div class="col-12 col-md-6 d-flex align-items-center">
          <ul class="point-list row">
            <li class="col-12">
              <span class="image-frame"><img src="{{asset('/uploads/images/detail_page_icons')}}/{{$pageDetails['kfIcon1']}}" alt="people"/></span>
              <span>{{$pageDetails['keyfeature1']}}</span>
            </li>
            <li class="col-12"><span class="image-frame"><img class="sand-timer" src="{{asset('/uploads/images/detail_page_icons')}}/{{$pageDetails['kfIcon2']}}" alt="working hour"/></span> <span>{{$pageDetails['keyfeature2']}}</span></li>
            <li class="col-12"><span class="image-frame"><img src="{{asset('/uploads/images/detail_page_icons')}}/{{$pageDetails['kfIcon3']}}" alt="interactive"/></span> <span>{{$pageDetails['keyfeature3']}}</span></li>
            <li class="col-12"><span class="image-frame"><img src="{{asset('/uploads/images/detail_page_icons')}}/{{$pageDetails['kfIcon4']}}" alt="home"/></span> <span>{{$pageDetails['keyfeature4']}}</span></li>
          </ul>
        </div>
        @if($slug_id == "LV1")
        <div class="col-12 col-md-6 d-flex justify-content-end nago-video">
          <video id="video1" class="animated fadeIn delay-1s" width="100%" height="316" preload="yes" loop autoplay muted playsinline>
            <source src="{{asset('landing_page')}}/video/pen.mp4" type="video/mp4">
            <source src="{{asset('landing_page')}}/video/pen.ogv" type="video/ogv">
            <source src="{{asset('landing_page')}}/video/pen.webm" type="video/webm">
            Your browser does not support the video tag.
          </video> 
          <button onclick="playVid()" type="button" id="videoButton1" style="display: none;">Play Video</button>
        </div>
        @endif

         @if($slug_id == "LV2")
        <div class="col-12 col-md-6 d-flex justify-content-end nago-video" style="overflow:hidden;">
          <video id="video2" class="animated fadeIn delay-1s" width="100%" height="316" preload="yes" loop autoplay muted playsinline>
            <source src="{{asset('landing_page')}}/video/lamp.mp4" type="video/mp4">
            <source src="{{asset('landing_page')}}/video/lamp.ogv" type="video/ogv">
            <source src="{{asset('landing_page')}}/video/lamp.webm" type="video/webm">
            Your browser does not support the video tag.
          </video> 
          <button onclick="playVid()" type="button" id="videoButton2" style="display: none;">Play Video</button>
        </div>
        @endif 

         @if($slug_id == "LV3")
        <div class="col-12 col-md-6 d-flex justify-content-end nago-video">
          <video id="video3" class="animated fadeIn delay-1s" width="100%" height="316" preload="yes" loop autoplay muted playsinline>
            <source src="{{asset('landing_page')}}/video/watch.mp4" type="video/mp4">
            <source src="{{asset('landing_page')}}/video/watch.ogv" type="video/ogv">
            <source src="{{asset('landing_page')}}/video/watch.webm" type="video/webm">
            Your browser does not support the video tag.
          </video> 
          <button onclick="playVid()" type="button" id="videoButton3" style="display: none;">Play Video</button>
        </div>
        @endif        
      </div>

      <div class="row" hidden="true">
        <div class="col-12 slider">
          <blockquote class="blockquote">{{$pageDetails['client_quote']}}</blockquote>
        </div>
        <div class="col-12 btn-frame text-center">
          <a href="{{route('home')}}#contact" class="btn btn-warning">Request More Information</a>
        </div>
      </div>
    </div>
  </section>
 @endsection
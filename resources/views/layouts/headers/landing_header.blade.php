<header class="site-header "><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" @if (\Route::current()->getName() == 'consulting') href="{{route('home')}}" @else href="#page-top" @endif>
          <img src="{{ asset('landing_page') }}/images/TMG-001-Brand-Logo-WT-FNL-01.svg" width="121" height="121" class="img-fluid" alt="The Maker Group" />
        </a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-times"></i>
            </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              @if (\Route::current()->getName() == 'consulting') 
                  <a class="nav-link js-scroll-trigger" href="{{route('home')}}">Home</a>
              @else
              <a class="nav-link js-scroll-trigger" href="#page-top">Home</a>
              @endif
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
              <ul class="sub-menu">
                <li><a href="{{route('consulting')}}">Consulting</a></li>
                @foreach($detail_pages as $detail_page)
                <li><a href="{{route('negotiation',$detail_page->title)}}">{{$detail_page->page_name}} {{$detail_page->title}}</a></li>
                @endforeach
               <!--  <li><a href="negotiation-lv3.html">Negotiation LV 3</a></li> -->
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="https://elearning.themakergroup.com" target="_blank">eLearning</a></li>
            @if (Auth::check())
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="@if(Auth::user()->complete_profile == 1){{route('dashboard')}} @else {{ route('profile.edit') }} @endif">Dashboard</a></li>
            @else
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/login')}}">Sign In</a></li>
            @endif
          </ul>
        </div>

        <div class="vertical-scroll">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#page-top"></a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services"></a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about"></a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact"></a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#footer"></a></li>
          </ul>
        </div>
        
      </div>
    </nav>  
  </header>
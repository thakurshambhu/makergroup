 <header class="site-header inner-site-header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{ route('home') }}">
          <img src="{{asset('landing_page')}}/images/TMG-001-Brand-Logo-WT-FNL-01.svg" alt="The Maker Group" />
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('home')}}">Home</a></li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{route('home')}}/#services">Services</a>
              <ul class="sub-menu">
                <li><a href="{{route('consulting')}}">Consulting</a></li>
                @foreach($DetailPages as $DetailPage)
                <li><a href="{{route('negotiation',$DetailPage->title)}}">{{$DetailPage->page_name}} {{$DetailPage->title}}</a></li>
                @endforeach
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('home')}}#about">About</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('home')}}#contact">Contact</a></li>
            @if (Auth::check())
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('dashboard')}}">Dashboard</a></li>
            @else
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/login')}}">Sign In</a></li>
            @endif
          </ul>
        </div>
      </div>
    </nav>  
  </header>
<footer id="footer" class="site-footer">
    <div class="goldenBg spaceTB50">
      <div class="container">
        <div class="row">
          <div class="col-12  col-md-3 wow fadeIn logo">
            <a class="js-scroll-trigger" href="#page-top">
              <img src="{{ asset('landing_page') }}/images/TMG-001-Brand-Logo-Tag-BK-FNL.png" alt="The Maker Group" />
            </a>
          </div>
          <div class="col-12 col-sm-4 col-md-3 wow fadeIn">
            <h2>Links</h2>
            <ul>
              <li><a class="js-scroll-trigger" href="{{route('home')}}#page-top">Home</a></li>
              <li><a class="js-scroll-trigger" href="{{route('home')}}#services">Services</a></li>
              <li><a class="js-scroll-trigger" href="{{route('home')}}#about">About</a></li>
              <li><a class="js-scroll-trigger" href="{{route('home')}}#contact">Contact</a></li>
              @if (Auth::check())
              <li><a href="{{route('dashboard')}}">Dashboard</a></li>
              @else
              <li><a href="{{url('/login')}}">Sign In</a></li>
              @endif
              <li><a href="{{ 'terms' }}">Terms of Use</a></li>
              <li><a href="{{ 'policy' }}">Privacy Policy</a></li>
            </ul>
          </div>
          <div class="col-12 col-sm-4 col-md-3 wow fadeIn">
            <h2>About</h2>
            <ul>
              <li><a href="mailto:info@themakergroup.com">info@themakergroup.com</a></li>
              <li><a href="tel:1-800-987-1553">1-800-987-1553</a></li>
            </ul>
          </div>
          <div class="col-12 col-sm-4 col-md-3 wow fadeIn social-link">
            <h2>Social</h2>
            <a href="javascript:;"><i class="fab fa-linkedin-in"></i></a>
            <a href="javascript:;"><i class="fab fa-facebook-f"></i></a>
            <a href="javascript:;"><i class="fab fa-twitter"></i></a>
          </div>
        </div>
      </div>
    </div>
    <p class="copyright wow fadeIn">&copy; The Maker Group. All Right Reserved.</p>
    <p class="copyright wow fadeIn">By continuing to use this website, you acknowledge and agree to the <a href="{{ 'terms' }}">Terms of Use</a>, Including the <a href="{{ 'policy' }}">Privacy & Cookie Policy</a></p>
  </footer><!-- footer end -->
<section id="contact" class="sapceTB100 contact-details">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          <h2 class="section-title margin-bottom50 wow fadeIn">Request Info</h2>
          <div id='loadingmessage' style='display:none'>
            <img src="{{asset('landing_page')}}/images/loading.gif"/>
          </div>
          <div id="messages"></div>
          <!-- <form method="POST" action="{{route('saveContactUs')}}" id="contactForm">
            @csrf
          <div class="form-group wow fadeIn">
            <input type="text" class="form-control" placeholder="Name"/>
          </div>
          <div class="form-group wow fadeIn">
            <input type="email" class="form-control" placeholder="Email"/>
          </div>
          <div class="form-group wow fadeIn">
            <input type="text" class="form-control" placeholder="Phone"/>
          </div>
          <div class="form-group wow fadeIn">
            <textarea class="form-control" placeholder="Message"></textarea>
          </div>
          <button type="submit" class="btn btn-warning wow fadeIn">Submit</button>
        </div>
        </form> -->
        @include('layouts.page_templates.form')
      </div>
        <div class="col-12 col-md-6 get-in-touch">
          <h2 class="section-title margin-bottom50 wow fadeIn">Get In Touch</h2>
          <div class="contact-links wow fadeIn"><a href="http://www.themakergroup.com/" target="_blank">www.themakergroup.com</a></div>
          <div class="contact-links wow fadeIn"><a href="mailto:info@themakergroup.com">info@themakergroup.com</a></div>
          <div class="contact-number wow fadeIn"><a href="tel:1-800-987-1553">1-800-987-1553</a></div>
        </div>        
      </div>
    </div>
  </section><!-- contact end -->
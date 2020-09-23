<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>The Maker Group - making good, great</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet" >
  <link href="{{asset('landing_page')}}/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('landing_page')}}/css/all.min.css" rel="stylesheet">
  <link href="{{asset('landing_page')}}/device-mockups/device-mockups.min.css" rel="stylesheet">
  <link href="{{asset('landing_page')}}/css/slick.css" rel="stylesheet"/>
  <link href="{{asset('landing_page')}}/css/slick-theme.css" rel="stylesheet"/>
  <link href="{{asset('landing_page')}}/css/master.css" rel="stylesheet">
   <script src="{{asset('landing_page')}}/js/jquery.min.js"></script>
</head>
<body id="page-top">

  @include('layouts.headers.inner_head')
  @yield('content')
  @include('layouts.footers.landing_footer')



  <!-- scroll to top -->
  <a href="javascript:;" class="scrollup"><i class="fas fa-arrow-up"></i></a>

  <!-- Bootstrap core JavaScript -->
 <!-- jquery_session.js -->

  <!-- jQuery Validator -->
    <script src="{{asset('paper')}}/js/plugins/jqueryValidation.js"></script>
    <script src="{{asset('paper')}}/js/plugins/jsvalidation-additional.js"></script>
    <script src="{{ asset('paper') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('paper') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  -->
  <script src="{{asset('landing_page')}}/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('landing_page')}}/js/jquery.easing.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <script src="{{asset('landing_page')}}/js/new-age.min.js"></script>
  <script src="{{asset('landing_page')}}/js/jquery_session.js"></script>
  <script src="{{asset('landing_page')}}/js/slick.min.js"></script>

  <script>

    var vid = document.getElementById("videoButton1"); 
    function playVid() { 
      vid.play(); 
    }
    var vid = document.getElementById("videoButton2"); 
    function playVid() { 
      vid.play(); 
    }
    var vid = document.getElementById("videoButton3"); 
    function playVid() { 
      vid.play(); 
    }


    jQuery( document ).ready(function() {

      jQuery('.slider').slick(
        {
          autoplay:true,
          infinite: true,
        }
      );
    });

    jQuery( document ).ready(function() {


      jQuery ( "#buttonId" ).trigger( "click" );
      jQuery('#buttonId').click();

      jQuery ( "#brainVideoButton" ).trigger( "click" );
      jQuery('#brainVideoButton').click();

      jQuery ( "#earthVideoButton" ).trigger( "click" );
      jQuery('#earthVideoButton').click();

      jQuery ( "#videoButton1" ).trigger( "click" );
      jQuery('#videoButton1').click();

      jQuery ( "#videoButton2" ).trigger( "click" );
      jQuery('#videoButton2').click();

      jQuery ( "#videoButton3" ).trigger( "click" );
      jQuery('#videoButton3').click();

      wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: true,
        live: true
      })
      wow.init();
      
      function checkWidth() {
        var windowSize = $(window).width();

        if (windowSize <= 768) {
          jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 100) {
              jQuery('.scrollup').fadeIn();
            } else {
              jQuery('.scrollup').fadeOut();
            }
          });

          jQuery('.scrollup').click(function () {
            jQuery("html, body").animate({
              scrollTop: 0
            }, 600);
            return false;
          });
        }
      }

      

      checkWidth();
      $(window).resize(checkWidth)
    });
  </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>The Maker Group - making good, great</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet" >
  <link href="assest/css/bootstrap.min.css" rel="stylesheet">
  <link href="assest/css/all.min.css" rel="stylesheet">
  <link href="assest/device-mockups/device-mockups.min.css" rel="stylesheet">
  <link href="assest/css/master.css" rel="stylesheet">
</head>
<body id="page-top">


@include('layouts.headers.inner_head')
@yield('content')
@include('layouts.footers.landing_footer')




  <!-- scroll to top -->
  <a href="javascript:;" class="scrollup"><i class="fas fa-arrow-up"></i></a>

  <!-- Bootstrap core JavaScript -->
  <script src="assest/js/jquery.min.js"></script>
  <script src="assest/js/bootstrap.bundle.min.js"></script>
  <script src="assest/js/jquery.easing.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <script src="assest/js/new-age.min.js"></script>
  <script>

    jQuery( document ).ready(function() {
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
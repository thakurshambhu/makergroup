<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no, user-scalable=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>The Maker Group - making good, great</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet" >
  <link href="<?php echo e(asset('landing_page')); ?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo e(asset('landing_page')); ?>/css/all.min.css" rel="stylesheet">
  <link href="<?php echo e(asset('landing_page')); ?>/device-mockups/device-mockups.min.css" rel="stylesheet">
  <link href="<?php echo e(asset('landing_page')); ?>/css/master.css" rel="stylesheet">
  <script src="<?php echo e(asset('landing_page')); ?>/js/jquery.min.js"></script>
  <script src="http://malsup.github.com/jquery.form.js"></script>
  <script src="<?php echo e(asset('paper')); ?>/js/plugins/jqueryValidation.js"></script>
  <script src="<?php echo e(asset('paper')); ?>/js/plugins/jsvalidation-additional.js"></script>
</head>
<body id="page-top">

<?php echo $__env->make('layouts.headers.landing_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('layouts.footers.landing_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Bootstrap core JavaScript -->
  
  <script src="<?php echo e(asset('landing_page')); ?>/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo e(asset('landing_page')); ?>/js/jquery.easing.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <script src="<?php echo e(asset('landing_page')); ?>/js/new-age.min.js"></script>
  <script>
    //  document.getElementById('vid').play();

    var vid = document.getElementById("myVideo"); 

    function playVid() { 
      vid.play(); 
    } 

    var vid = document.getElementById("brainVideo"); 
    function playVid() { 
      vid.play(); 
    }

    var vid = document.getElementById("earthVideo"); 
    function playVid() { 
      vid.play(); 
    }

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
    });
      
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

  </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/layouts/main.blade.php ENDPATH**/ ?>
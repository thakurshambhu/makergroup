<!--
=========================================================
 Paper Dashboard - v2.0.0
=========================================================

 Product Page: https://www.creative-tim.com/product/paper-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 UPDIVISION (https://updivision.com)
 Licensed under MIT (https://github.com/creativetimofficial/paper-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('paper')); ?>/img/brain_logo.png">
    <link rel="icon" type="image/png" href="<?php echo e(asset('paper')); ?>/img/brand_logo.jpg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <!--  Social tags      -->
       <!-- Schema.org markup for Google+ -->
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Paper Dashboard Laravel by Creative Tim">

    <!-- meta name="twitter:description" content="Start your development with a Bootstrap 4 Admin Dashboard built for Laravel Framework 5.5 and Up."> -->
    <!-- <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/209/opt_pd_laravel_thumbnail.jpg"> -->


    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Paper Dashboard Laravel by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://www.creative-tim.com/live/paper-dashboard-laravel" />
    <meta property="og:description" content="Start your development with a Bootstrap 4 Admin Dashboard built for Laravel Framework 5.5 and Up." />
    <meta property="og:site_name" content="Creative Tim" />

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <title>
        <?php echo e(__('The Maker Group')); ?>

    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <!-- <link  rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <!-- <link href="<?php echo e(asset('paper')); ?>/css/bootstrap.min.css" rel="stylesheet" /> -->
    <link href="<?php echo e(asset('paper')); ?>/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo e(asset('paper')); ?>/demo/demo.css" rel="stylesheet" />

    <!--  css added by gaurav_bisht to variable section styling -->
    <link href=" <?php echo e(asset('paper')); ?>/css/admin-custom.css" rel="stylesheet" />
    
    <!-- <script src="<?php echo e(asset('paper')); ?>/js/core/jquery.min.js"></script> -->
    <!-- form validation Jquery -->

    <!-- Data Table -->
   <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
   <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>  -->

   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="<?php echo e(asset('paper')); ?>/css/owl.carousel.min.css" rel="stylesheet" type="text/css">


</head>

<body class="<?php echo e($class); ?>">
   <div class="loader-gif"><img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/loader.gif" alt=""></div>  
    <?php if(auth()->guard()->check()): ?>
        <?php echo $__env->make('layouts.page_templates.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layouts.navbars.fixed-plugin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    
    <?php if(auth()->guard()->guest()): ?>
        <?php echo $__env->make('layouts.page_templates.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>


 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
<script src="<?php echo e(asset('paper')); ?>/js/owl.carousel.min.js"></script>
<!-- <script src="<?php echo e(asset('paper')); ?>/js/custom.js"></script> -->

    <!-- Common JS file  -->
    <script src="<?php echo e(asset('paper')); ?>/js/common.js"></script>
    <!--   Core JS Files   -->
    <!-- <script src="<?php echo e(asset('paper')); ?>/js/core/popper.min.js"></script> -->
    <!-- jQuery Validator -->
    <script src="<?php echo e(asset('paper')); ?>/js/plugins/jqueryValidation.js"></script>
    <script src="<?php echo e(asset('paper')); ?>/js/plugins/jsvalidation-additional.js"></script>
    <script src="<?php echo e(asset('paper')); ?>/js/core/bootstrap.min.js"></script>
    <!-- <script src="<?php echo e(asset('paper')); ?>/js/plugins/perfect-scrollbar.jquery.min.js"></script> -->
    <!-- Chart JS -->
    <script src="<?php echo e(asset('paper')); ?>/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo e(asset('paper')); ?>/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo e(asset('paper')); ?>/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <!-- <script src="<?php echo e(asset('paper')); ?>/demo/demo.js"></script> -->
    <!-- Data Tables -->
     <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>

    <?php echo $__env->make('layouts.navbars.fixed-plugin-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/layouts/app.blade.php ENDPATH**/ ?>
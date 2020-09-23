<header class="site-header "><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" <?php if(\Route::current()->getName() == 'consulting'): ?> href="<?php echo e(route('home')); ?>" <?php else: ?> href="#page-top" <?php endif; ?>>
          <img src="<?php echo e(asset('landing_page')); ?>/images/TMG-001-Brand-Logo-WT-FNL-01.svg" width="121" height="121" class="img-fluid" alt="The Maker Group" />
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
              <?php if(\Route::current()->getName() == 'consulting'): ?> 
                  <a class="nav-link js-scroll-trigger" href="<?php echo e(route('home')); ?>">Home</a>
              <?php else: ?>
              <a class="nav-link js-scroll-trigger" href="#page-top">Home</a>
              <?php endif; ?>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
              <ul class="sub-menu">
                <li><a href="<?php echo e(route('consulting')); ?>">Consulting</a></li>
                <?php $__currentLoopData = $detail_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail_page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('negotiation',$detail_page->title)); ?>"><?php echo e($detail_page->page_name); ?> <?php echo e($detail_page->title); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <!--  <li><a href="negotiation-lv3.html">Negotiation LV 3</a></li> -->
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="https://elearning.themakergroup.com" target="_blank">eLearning</a></li>
            <?php if(Auth::check()): ?>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php if(Auth::user()->complete_profile == 1): ?><?php echo e(route('dashboard')); ?> <?php else: ?> <?php echo e(route('profile.edit')); ?> <?php endif; ?>">Dashboard</a></li>
            <?php else: ?>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo e(url('/login')); ?>">Sign In</a></li>
            <?php endif; ?>
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
  </header><?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/layouts/headers/landing_header.blade.php ENDPATH**/ ?>
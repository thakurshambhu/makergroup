 <header class="site-header inner-site-header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?php echo e(route('home')); ?>">
          <img src="<?php echo e(asset('landing_page')); ?>/images/TMG-001-Brand-Logo-WT-FNL-01.svg" alt="The Maker Group" />
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo e(route('home')); ?>">Home</a></li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo e(route('home')); ?>/#services">Services</a>
              <ul class="sub-menu">
                <li><a href="<?php echo e(route('consulting')); ?>">Consulting</a></li>
                <?php $__currentLoopData = $DetailPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $DetailPage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('negotiation',$DetailPage->title)); ?>"><?php echo e($DetailPage->page_name); ?> <?php echo e($DetailPage->title); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo e(route('home')); ?>#about">About</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo e(route('home')); ?>#contact">Contact</a></li>
            <?php if(Auth::check()): ?>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
            <?php else: ?>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo e(url('/login')); ?>">Sign In</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>  
  </header><?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/layouts/headers/inner_head.blade.php ENDPATH**/ ?>
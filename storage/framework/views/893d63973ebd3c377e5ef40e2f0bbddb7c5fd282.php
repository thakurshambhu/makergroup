<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <button id="nav-toggle" class="btn mr-2"><i class="fas fa-bars"></i></button>
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>"><?php echo e(__('The Maker Group')); ?></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn-magnify" href="<?php echo e(route('dashboard')); ?>" title="Dashboard">
                        <i class="nc-icon nc-layout-11"></i>
                        <p>
                            <span class="d-lg-none d-md-block"><?php echo e(__('Stats')); ?></span>
                        </p>
                    </a>
                </li>
              <!--   <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-bell-55"></i>
                        <p>
                            <span class="d-lg-none d-md-block"><?php echo e(__('Some Actions')); ?></span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#"><?php echo e(__('Action')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(__('Another action')); ?></a>
                        <a class="dropdown-item" href="#"><?php echo e(__('Something else here')); ?></a>
                    </div>
                </li> -->
                <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Settings">
                        <i class="nc-icon nc-settings-gear-65"></i>
                        <p>
                            <span class="d-lg-none d-md-block"><?php echo e(__('Account')); ?></span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                        <form class="dropdown-item" action="<?php echo e(route('logout')); ?>" id="formLogOut" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>"><?php echo e(__('My profile')); ?></a>
                            <a class="dropdown-item" onclick="document.getElementById('formLogOut').submit();"><?php echo e(__('Log out')); ?></a>
                            
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/layouts/navbars/navs/auth.blade.php ENDPATH**/ ?>
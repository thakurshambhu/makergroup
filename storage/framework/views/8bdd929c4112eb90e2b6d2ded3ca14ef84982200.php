<footer id="footer" class="site-footer">
    <div class="goldenBg spaceTB50">
      <div class="container">
        <div class="row">
          <div class="col-12  col-md-3 wow fadeIn logo">
            <a class="js-scroll-trigger" href="#page-top">
              <img src="<?php echo e(asset('landing_page')); ?>/images/TMG-001-Brand-Logo-Tag-BK-FNL.png" alt="The Maker Group" />
            </a>
          </div>
          <div class="col-12 col-sm-4 col-md-3 wow fadeIn">
            <h2>Links</h2>
            <ul>
              <li><a class="js-scroll-trigger" href="<?php echo e(route('home')); ?>#page-top">Home</a></li>
              <li><a class="js-scroll-trigger" href="<?php echo e(route('home')); ?>#services">Services</a></li>
              <li><a class="js-scroll-trigger" href="<?php echo e(route('home')); ?>#about">About</a></li>
              <li><a class="js-scroll-trigger" href="<?php echo e(route('home')); ?>#contact">Contact</a></li>
              <?php if(Auth::check()): ?>
              <li><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
              <?php else: ?>
              <li><a href="<?php echo e(url('/login')); ?>">Sign In</a></li>
              <?php endif; ?>
              <li><a href="<?php echo e('terms'); ?>">Terms of Use</a></li>
              <li><a href="<?php echo e('policy'); ?>">Privacy Policy</a></li>
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
    <p class="copyright wow fadeIn">By continuing to use this website, you acknowledge and agree to the <a href="<?php echo e('terms'); ?>">Terms of Use</a>, Including the <a href="<?php echo e('policy'); ?>">Privacy & Cookie Policy</a></p>
  </footer><!-- footer end --><?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/layouts/footers/landing_footer.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
<div class="content">
   <div id="messages">
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="row">
               <div class="col-md-9">
                  <div class="card-header">
                     <h4 class="card-title">Submit Feedbacks</h4>
                  </div>
               </div>
            <div class="card-body">
              <div class="row">
                <?php $__currentLoopData = $batch_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                <div class="card" style="width: 20;">
                  <?php if(empty($user->photo_url)): ?>
                  <img class="batch_profile_image" src="<?php echo e(asset('/uploads/images/profile_picture/default-avatar.png')); ?>">
                    <?php else: ?><img class="batch_profile_image" src="<?php echo e(asset('/uploads/images/profile_picture/' . $user->photo_url)); ?>">
                    <?php endif; ?>
                    <div class="card-body">
                      <h4 class="card-title"><?php echo e($user->name); ?></h4>
                      <p class="card-text"> <b>Email: </b> <a href="mailto:<?php echo e($user->email); ?>"><?php echo e($user->email); ?></a><br> <a class="btn btn-primary" id="submit_feedback" href="<?php echo e(route('getFeedBackSurvey')); ?>/<?php echo e($user->id); ?>"> Submit Feedback</a>
                        <?php if(session()->has('submittedUsers') && !in_array($user->id, Session::get('submittedUsers'))): ?>
                              
                        <?php else: ?>
                            <i class="fa fa-check" aria-hidden="true" title="Feedback Completed" style="color:#2c680b;font-size: 20px;"></i>
                        <?php endif; ?>
                    </div>
                  </div>
                 
                  </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </div>
              </div>
                <div class="col-md-2 offset-md-10">
                  <a type="button" class="btn btn-primary" href="<?php echo e(route('dashboard')); ?>">Back</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', [
'class' => '',
'elementActive' => 'feedback_dashboard'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/pages/feedback_dashboard.blade.php ENDPATH**/ ?>
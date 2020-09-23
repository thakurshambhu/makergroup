<?php $__env->startSection('content'); ?>
<style>
   .inner-site-header {
       display: none;
}

</style>
<section class="fromation-style">
   <div class="container">
      <div class="row padding-bottom35">
         <div class="col-12">
            <h2>Bidding Game</h2>
            <div class="content-style-frame">
               <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit</p> -->
                <div class="content-style-frame spaceTB30 col-12 question-btn-frame"><a class="btn btn-warning float-left" href="<?php echo e(route('dashboard')); ?>">Back To Dashboard</a></div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <div class="game-input">
               <h3> Workshop </h3>
               <select class="form-control" name="selectedBatch" id="selectedBatch">
                  <option value="" selected>Select Workshop</option>
                  <?php $__currentLoopData = $batches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($batch->id); ?>"><?php echo e($batch->batches); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
            </div>
         </div>
         <div class="col-md-6">
            <div class="game-input">
               <h3>Team</h3>
               <select class="form-control batchUsers">
                  <option value="">Name vs. Name</option>
               </select>
            </div>
         </div>
      </div>
      <div class="row" id="game_panel" >
         <?php for($i=1;$i<=6;$i++): ?>
            <?php if($i%2!=0): ?>
            <div class="col-12 col-md-4 marTop35">
               <div class="bid-frame">
                  <h6 class="text-center">Round <?php echo e($i); ?></h6>
                  <div class="error text-danger clear_error" id="error_<?php echo e($i); ?>"></div>
                  <div class="row bid-box">
                     <div class="col-6 user_1">Name</div>
                     <div class="col-6 user_2">Name</div>
                  </div>
                  <form id="round_<?php echo e($i); ?>">
                     <div class="row">
                         
                           <?php for($j=1;$j<=5;$j++): ?>
                           <div class="padTop8 col-6"><input type="number" class="form-control bid_input" name="r<?php echo e($i); ?>_bid_<?php echo e($j); ?>" id="r<?php echo e($i); ?>_<?php echo e($j); ?>_bid" onchange="no_bid_check('<?php echo e($i); ?>','<?php echo e($j); ?>')"value="" min="0" disabled="true"></div>
                           <?php endfor; ?>
                     </div>
                  </form>
                  <div class="row">
                     <div class="col-6">
                        <div class="padTop8">
                           <div class="form-control total" id="left_div<?php echo e($i); ?>" value=""></div>
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="padTop8">
                           <div class="form-control total" id="right_div<?php echo e($i); ?>" value=""></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php else: ?>
            <div class="col-12 col-md-4 marTop35">
               <div class="bid-frame">
                  <h6 class="text-center">Round <?php echo e($i); ?></h6>
                  <div class="row bid-box">
                     <div class="col-6 user_1">Name</div>
                     <div class="col-6 user_2">Name</div>
                  </div>
                  <form id="round_<?php echo e($i); ?>">
                     <div class="row">
                           <?php for($j=1;$j<=5;$j++): ?>
                            <?php if($j==1): ?>
                              <div class="padTop8 col-6"></div>
                           <?php endif; ?>
                           <div class="padTop8 col-6"><input type="number" class="form-control bid_input" name="r<?php echo e($i); ?>_bid_<?php echo e($j); ?>" id="r<?php echo e($i); ?>_<?php echo e($j); ?>_bid" onchange="no_bid_check('<?php echo e($i); ?>','<?php echo e($j); ?>')"value="" min="0" disabled="true"></div>
                           <?php endfor; ?>
                     </div>
                  </form>
                  <div class="row">
                     <div class="col-6">
                        <div class="padTop8">
                           <div class="form-control total" id="left_div<?php echo e($i); ?>" value=""></div>
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="padTop8">
                           <div class="form-control total" id="right_div<?php echo e($i); ?>" value=""></div>
                        </div>
                     </div>
                  </div>
               </div>   
            </div>
            <?php endif; ?>
         <?php endfor; ?>
      </div>
      
      <div class="row">
         <div class="col-12 padTop35">
            <div class="table-responsive bid-result-table">
               <a class="btn btn-warning   form-control" href="<?php echo e(route('playbackGamePage')); ?>">Playback Game</a>
               <!-- <table class="table">
                  <thead>
                     <tr>
                        <th>Name</th>
                        <th class="text-center">Games won</th>
                        <th class="text-center">Highest bid</th>
                        <th class="text-center">Money won/lost</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td class="user_1">Name</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                     </tr>
                     <tr>
                        <td class="user_2">Name</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td></td>
                        <td class="text-center"><b>Total</b></td>
                        <td class="text-center"><b></b></td>
                     </tr>
                  </tbody>
               </table> -->
            </div>
         </div>
      </div>
   </div>
</section>
<?php echo $__env->make('pages.js.bid_game', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner_main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/pages/bid_game.blade.php ENDPATH**/ ?>
<div class="table-responsive">
  <table class="table min-w-600" >
   <thead>
      <tr>
         <th class="text-center">#</th>
         <th>Name</th>
         <th>Email</th>
         <th class="text-center">Actions</th>
      </tr>
   </thead>
   <tbody>
      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
         <td class="text-center"><?php echo e($index +1); ?></td>
         <td><?php echo e($user->name); ?></td>
         <td><?php echo e($user->email); ?></td>

         <?php if(in_array($user->id,$ids)): ?>
         <td class="td-actions text-center">
            <a rel="tooltip" class="btn btn-success btn-simple btn-icon btn-sm" 
               href="<?php echo e(route('detailReport',$user->id)); ?>" title="View Report">
            <i class="fa fa-file"></i>
            </a>
            <a rel="tooltip" class="btn btn-danger btn-simple btn-icon btn-sm" 
               href="<?php echo e(route('downloadReport',$user->id)); ?>" title="Download Report">
            <i class="fa fa-download"></i>
            </a>
            <a rel="tooltip" class="btn btn-warning btn-simple btn-icon btn-sm" 
               href="<?php echo e(route('sendReport',$user->id)); ?>" title="Send Report">
            <i class="fa fa-paper-plane"></i>
            </a>
           

              <!-- <input type="checkbox" <?php if($user->is_feedback_show==1): ?> ? checked : 0 <?php endif; ?>  class='checkbox' data-id=<?php echo e($user->id); ?>> -->
              <label class="switch" title="Deactivate feedback survey">
              <?php if($user->is_feedback_show==1): ?>
             
              <input type="checkbox" class='checkbox' checked="checked" data-id=<?php echo e($user->id); ?> >
              
               <span class="slider round"></span>
                </label>
              <?php else: ?>
              <label class="switch" title="Activate feedback survey">

              <input type="checkbox" class='checkbox' data-id=<?php echo e($user->id); ?>>
              
               <span class="slider round"></span>
                </label>
              <?php endif; ?>
             
           

          
            
         </td>
         <?php else: ?>
         <td>Feedback Pending</td>
         <?php endif; ?>


      </tr>
      <!-- Modal -->
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </tbody>
</table>
</div>

<script type="text/javascript">
   $(document).ready(function(){
      $(document).on('change', '.checkbox', function(){
      // $(".checkbox").on('change',function() {
           var user_id =  $(this).attr('data-id');
           //var is_feedback_show=0;
          if(this.checked) {
              is_feedback_show=1;
          }else{
            is_feedback_show=0;
          }
           $.ajax({
              type: "POST",
              url: "feedback_show",
              data: {
                  "_token": "<?php echo e(csrf_token()); ?>",
                  user_id: user_id,
                  is_feedback_show:is_feedback_show,
              },
              success: function(data) {
                      // alert(data.message);
                      // $('.table').html(data);

              }
          });
       });

   });
</script><?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/pages/report_table_ajax.blade.php ENDPATH**/ ?>
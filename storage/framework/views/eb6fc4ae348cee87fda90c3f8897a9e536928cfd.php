<?php $__env->startSection('content'); ?>
<div class="content px-0">
   <div class="container-fluid mt--7">
      <div class="row">
         <div class="col">
            <div class="card shadow px-2">
               <div class="card-header border-0">
                  <div class="row align-items-center">
                     <div class="col-8 pl-0">
                        <h3 class="mb-0"><?php echo e(__('Reports List')); ?></h3>
                     </div>
                     <!-- <div class="col-4 text-right">
                        <a href="<?php echo e(route('page.index', 'add_page')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Add Page')); ?></a>
                        </div> -->
                  </div>
               </div>
               <div class="col-12">
                  <?php if(session('status')): ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <?php echo e(session('status')); ?>

                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <?php endif; ?>
               </div>

                <div class="row">
                <div class="form-group col-md-4 offset-md-4">
                  <label for="selectBatch mb-2">Select Batch</label>
                  <select class="form-control" id="selectedBatch" name="selectedBatch" value="">
                        <option value="">Select Workshop</option>
                        <?php $__currentLoopData = $batches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($batch->id); ?>"><?php echo e($batch->batches); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
              </div>


               <div class="table">
                  
                    
               </div>
               <div class="card-footer py-4">
                  <nav class="d-flex justify-content-end" aria-label="...">
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
    $('#selectedBatch').change(function() {
    var selected_batch = $('#selectedBatch').val();
    $.ajax({
        type: "POST",
        url: "get-reports",
        dataType : 'text',
        data: {
            "_token": "<?php echo e(csrf_token()); ?>",
            selected_batch: selected_batch
        },
        success: function(data) {
                console.log(data);
                $('.table').html(data);

        }
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', [
'class' => '',
'elementActive' => 'list_reports'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/pages/list_report.blade.php ENDPATH**/ ?>
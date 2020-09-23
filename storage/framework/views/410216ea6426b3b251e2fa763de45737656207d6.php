<?php $__env->startSection('content'); ?>
<div class="content">
   <div class="container-fluid mt--7">
      <div class="row">
         <div class="col">
            <div class="card shadow">
               <div class="card-header border-0">
                  <div class="row align-items-center">
                     <div class="col-8">
                        <h3 class="mb-0"><?php echo e(__('Teams List')); ?></h3>
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
               <div class="table-responsive">
                  <table class="table" id="questionTable">
                     <thead>
                        <tr>
                           <th class="text-center">#</th>
                           <th>Teams</th>
                           <th>Workshop</th>
                           <th class="text-center">Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           <td class="text-center"><?php echo e(($teams->CurrentPage()*10-10)+$index +1); ?></td>
                           <td>Team <?php echo e($team->id); ?></td>
                           <td> Batch <?php echo e($team->batch_id); ?></td>
                           <td class="td-actions text-center">

                              <a rel="tooltip" class="btn btn-success btn-simple btn-icon btn-sm" 
                                 href="<?php echo e(route('teamDetails',$team->id)); ?>">
                              <i class="fa fa-file"></i>
                              </a>
                              <a  rel="tooltip" class="btn btn-danger btn-simple btn-icon btn-sm"
                                 href="<?php echo e(route('deleteTeam',$team->id)); ?>">
                              <i class="fa fa-times"></i>
                              </a>
                           </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                     <?php echo e($teams->links()); ?>

                  </table>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', [
'class' => '',
'elementActive' => 'list_teams'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/pages/list_teams.blade.php ENDPATH**/ ?>
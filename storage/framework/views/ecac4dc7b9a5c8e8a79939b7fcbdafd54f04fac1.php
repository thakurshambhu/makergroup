<?php $__env->startSection('content'); ?>
<div class="content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0"><?php echo e(__('Questions List')); ?></h3>
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

                        <div class="table">
                            <table class="table" >
                               
                                
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Name</th>
            <th>Question</th>
            <th>Survey</th>
            <th>Bucket</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
         <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="text-center"><?php echo e(($questions->CurrentPage()*10-10)+$index+1); ?></td>
            <td><?php echo e($question->name); ?></td>
            <td><?php echo e($question->question); ?></td>
            <td><?php echo e($question->survey); ?></td>
            <td><?php echo e($question->bucket_id); ?></td>
            <td><?php echo e($question->question_status); ?></td>

            <td class="td-actions text-center">
               
                <a rel="tooltip" class="btn btn-success btn-simple btn-icon btn-sm" 
                href="<?php echo e(route('editQuestion',$question->id)); ?>">
                    <i class="fa fa-edit"></i>
                </a>

                <a  rel="tooltip" class="btn btn-danger btn-simple btn-icon btn-sm"
                href="<?php echo e(route('deleteQuestion',$question->id)); ?>">
                    <i class="fa fa-times"></i>
                </a>
            </td>
        </tr>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong<?php echo e($question->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 style="float: left;" class="modal-title" id="exampleModalLongTitle"><?php echo e($question->name); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <div>
                        <b><?php echo e($question->title1); ?></b>
                    </div>
                    <div>
                        <?php echo e($question->description1); ?>

                    </div>

                    <div>
                        <b><?php echo e($question->title2); ?></b>
                    </div>
                    <div>
                        <?php echo e($question->description2); ?>

                    </div>

                    <div>
                        <b><?php echo e($question->title3); ?></b>
                    </div>
                    <div>
                        <?php echo e($question->description3); ?>

                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
<?php echo e($questions->links()); ?>

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
    'elementActive' => 'list_questions'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/pages/list_questions.blade.php ENDPATH**/ ?>
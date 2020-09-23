<?php $__env->startSection('content'); ?>
    <div class="content px-0">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow px-2">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0"><?php echo e(__('Users')); ?></h3>
                                </div>
                                <!-- <div class="col-4 text-right">
                                    <a href="<?php echo e(route('user.create')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Add user')); ?></a>
                                </div> -->
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <?php if(session()->has('message')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session()->get('message')); ?>

                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col"><?php echo e(__('Name')); ?></th>
                                        <th scope="col"><?php echo e(__('Email')); ?></th>
                                        <th scope="col"><?php echo e(__('Role')); ?></th>
                                        <th scope="col"><?php echo e(__('Creation Date')); ?></th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($user->name); ?></td>
                                            <td>
                                                <a href="mailto:<?php echo e($user->email); ?>"><?php echo e($user->email); ?></a>
                                            </td>
                                            <?php if($user->role_id == 1): ?>
                                            <td>Super Admin</td>
                                            <?php elseif($user->role_id == 2): ?>
                                            <td>Admin</td>
                                            <?php else: ?>
                                            <td>User</td>
                                           <?php endif; ?>
                                            <td data-sort="<?php echo e($user->created_at->format('Ymd')); ?>"><?php echo e($user->created_at->format('d/m/Y H:i')); ?></td>
                                            <td>
                                               <a title="Activate User" class="btn btn-success btn-simple btn-icon btn-sm btn-check" href="<?php echo e(route('activeuser',$user->id)); ?>/">
                              <i class="fa fa-check"></i>
                              </a> 
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
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

    <script type="text/javascript">
        $( document ).ready(function() {
        $('#datatable').DataTable();
        $('input').addClass("form-control");
        $('input').addClass("search-box");
        $(".search-box").attr("placeholder", "Type here to search");
        // $("#datatable_paginate").fadeOut();
        $("#datatable_length").fadeOut();

    } );

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', [
    'class' => '',
    'elementActive' => 'user'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/users/newusers.blade.php ENDPATH**/ ?>
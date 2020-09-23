<?php $__env->startSection('content'); ?>
<?php echo '<pre>';print_r($user);die;?>
    <div class="content">
       
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0"><?php echo e(__('User Management')); ?></h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="<?php echo e(route('user.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo e(route('user.update', $user)); ?>" autocomplete="off">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>

                                <h6 class="heading-small text-muted mb-4"><?php echo e(__('User information')); ?></h6>
                                <?php if($user->role_id == 3): ?>
                                <div class="pl-lg-4">
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                        
                                    </div>


                                    <div class="col-md-4">
                                    <div class="form-control-label ">
                                    <span style="color: black"> Turn On feedback Section</span>
                                    </div>
                                    
                                    <label class="switch"> 

                                          <input type="checkbox" id="toggle" value="<?php echo e(old('id',$user->show_feedback)); ?>" <?php echo e($user->show_feedback ? 'checked' : ''); ?> >
                                          <span class="slider round"></span>

                                    </label>
                                    </div>
                                    </div>
                                    

                                    
                                     <?php endif; ?>

                                    <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                        <label class="form-control-label" for="input-name"><?php echo e(__('Name')); ?></label>
                                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e(old('name', $user->name)); ?>" required autofocus>

                                        <?php if($errors->has('name')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('email') ? ' has-danger' : ''); ?>">
                                        <label class="form-control-label" for="input-email"><?php echo e(__('Email')); ?></label>
                                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Email')); ?>" value="<?php echo e(old('email', $user->email)); ?>" required>

                                        <?php if($errors->has('email')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('password') ? ' has-danger' : ''); ?>">
                                        <label class="form-control-label" for="input-password"><?php echo e(__('Password')); ?></label>
                                        <input type="password" name="password" id="input-password" class="form-control form-control-alternative<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Password')); ?>" value="">
                                        
                                        <?php if($errors->has('password')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-password-confirmation"><?php echo e(__('Confirm Password')); ?></label>
                                        <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="<?php echo e(__('Confirm Password')); ?>" value="">
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $('#toggle').change(function(){
        var mode= $(this).prop('checked');
        var user_id = $('#toggle').val();
        // // submit the form 
        // $(#myForm).ajaxSubmit(); 
        // // return false to prevent normal browser submit and page navigation 
        // return false; 
        $.ajax({
          type:'POST',
          dataType:'JSON',
          url:"<?php echo e(url('/')); ?>/toggle-feedback-section",
          data:{
            "_token": "<?php echo e(csrf_token()); ?>",
            "mode" : mode,
            "user" : "<?php echo e($user->id); ?>",

          },
          success:function(data)
          {
            console.log(data)
            
          }
        });
      });


       
        

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', [
    'class' => '',
    'elementActive' => 'user',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/users/edit.blade.php ENDPATH**/ ?>
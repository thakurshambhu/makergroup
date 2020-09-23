<style>
    .msg {
    position: relative;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}
</style>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <?php if(auth()->user()->complete_profile == '0'): ?>
            <div class="msg alert-danger">
                Account activation pending
            </div>
        <?php endif; ?>
        <?php if(session('status')): ?>
            <div class="alert alert-success">
                <button type="button" aria-hidden="true" class="close">×</button>
                <span><b> Success - <?php echo e(session('status')); ?> </b> </span>
            </div>
        <?php endif; ?>
        <?php if(session('password_status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('password_status')); ?>

            </div>
        <?php endif; ?>
        <div class="row">
            <!-- <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="<?php echo e(asset('paper/img/blank.jpg')); ?>" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="<?php echo e(asset('uploads/images/profile_picture')); ?>/<?php echo e(auth()->user()->photo_url); ?>" alt="">

                                <h5 class="title"><?php echo e(__(auth()->user()->name)); ?></h5>
                            </a>
                            <p class="description">
                            <?php echo e(__(auth()->user()->email)); ?>

                            </p>
                        </div>
                        <p class="description text-center">
                            <?php echo e(__('Date of Birth : ')); ?> <?php echo e(__(auth()->user()->dob)); ?>

                            <br><?php echo e(__('Gender : ')); ?> <?php echo e(__(auth()->user()->gender)); ?>

                            <br> <?php echo e(__('Address : ')); ?> <?php echo e(__(auth()->user()->address)); ?>

                        </p>
                    </div> -->
                   <!--  <div class="card-footer">
                        <hr>
                        <div class="button-container">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-6 ml-auto">
                                    <h5><?php echo e(__('12')); ?>

                                        <br>
                                        <small><?php echo e(__('Total Won')); ?></small>
                                    </h5>
                                </div>
                                <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                    <h5><?php echo e(__('$1.20')); ?>

                                        <br>
                                        <small><?php echo e(__('Highest Bid')); ?></small>
                                    </h5>
                                </div>
                                <div class="col-lg-4 mr-auto">
                                    <h5><?php echo e(__('$24.6')); ?>

                                        <br>
                                        <small><?php echo e(__('Total Spent')); ?></small>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div> -->
                <!-- </div> -->
             <!--    <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo e(__('Team Members')); ?></h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled team-members">
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="<?php echo e(asset('paper/img/faces/ayo-ogunseinde-2.jpg')); ?>" alt="Circle Image"
                                                class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <?php echo e(__('Jon Snow')); ?>

                                        <br />
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                                class="fa fa-envelope"></i></button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="<?php echo e(asset('paper/img/faces/joe-gardner-2.jpg')); ?>" alt="Circle Image"
                                                class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-7">
                                            <?php echo e(__('Tom Cruise')); ?>

                                        <br />
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                                class="fa fa-envelope"></i></button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="<?php echo e(asset('paper/img/faces/clem-onojeghuo-2.jpg')); ?>" alt="Circle Image"
                                                class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-ms-7 col-7">
                                        <?php echo e(__('Flume')); ?>

                                        <br />
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                                class="fa fa-envelope"></i></button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> -->
            <!-- </div> -->
            <div class="col-md-12 text-center">
                <form class="col-md-12" action="<?php echo e(route('profile.update')); ?>" method="POST" enctype="multipart/form-data" id="edit_profile">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title"><?php echo e(__('Edit Profile')); ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">Full Name</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo e(auth()->user()->name); ?>" required>
                                    </div>
                                   <!--  <?php if($errors->has('name')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?> -->
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Work Email</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo e(auth()->user()->email); ?>" required <?php if(auth()->user()->id == 1){ echo "readonly"; } ?>>
                                    </div>
                                    <!-- <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?> -->
                                </div>
                            </div>

                            <!-- <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('Date Of Birth')); ?></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="date" name="dob" class="form-control" placeholder="Date Of Birth" value="<?php echo e(auth()->user()->dob); ?>" required>
                                    </div>
                                    <?php if($errors->has('dob')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('dob')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div> -->

                           <!--  <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('Address')); ?></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="address" class="form-control" placeholder="E.g: Park Avenue, Baker Street, NY" value="<?php echo e(auth()->user()->address); ?>" max="250">
                                    </div>
                                    <?php if($errors->has('address')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('address')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div> -->

                            <!-- <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('Gender')); ?></label>
                                <div class="col-md-4">
                                    <div class="dropdown">
                                      <select class="form-control" name="gender" value="">
                                        <option <?php //echo (auth()->user()->gender == '')?"selected":"" ?> value="">Select Gender</option>
                                        <option <?php //echo (auth()->user()->gender == 'male')?"selected":"" ?>>Male</option>
                                        <option <?php //echo (auth()->user()->gender == 'female')?"selected":"" ?>>Female</option>
                                        <option <?php //echo (auth()->user()->gender == 'Other')?"selected":"" ?>>Other</option>

                                    </select>
                                    
                                </div>
                            </div>
                            </div> -->
                           <!--  <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('Profile Picture')); ?></label>
                                <div class="col-md-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Upload Profile Picture
                            </button>
                        </div>
                    </div> -->

                        <div class="row">
                                <label class="col-md-3 col-form-label">Company</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="company" class="form-control" placeholder="Company" value="<?php echo e(auth()->user()->company); ?>">
                                    </div>
                                    <?php if($errors->has('company')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('company')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-3 col-form-label">Division</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="division" class="form-control" placeholder="Division" value="<?php echo e(auth()->user()->division); ?>">
                                    </div>
                                    <?php if($errors->has('division')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('division')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-3 col-form-label">Title</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo e(auth()->user()->title); ?>">
                                    </div>
                                    <?php if($errors->has('title')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('title')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-3 col-form-label">Manager's Name</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="manager_name" class="form-control" placeholder="Manager's Name" value="<?php echo e(auth()->user()->manager_name); ?>">
                                    </div>
                                    <?php if($errors->has('manger')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('manager')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-3 col-form-label">Have you had negotiation training in the past?</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <select class="form-control training" name="training">
                                        <option value="">Select</option>
                                        <option value="yes" <?php if(auth()->user()->training == "yes") { echo "selected"; } ?>>Yes</option>
                                        <option value="no" <?php if(auth()->user()->training == "no") { echo "selected"; } ?>>No</option>

                                    </select>
                                    </div>
                                    <?php if($errors->has('training')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('training')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row traing_details" <?php if(auth()->user()->training == "no" || auth()->user()->training == NULL) { ?> style="display:none;" <?php } ?>>
                                <label class="col-md-3 col-form-label">With Who?</label>
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <input type="text" name="with_who" class="form-control" placeholder="With Who?" value="<?php echo e(auth()->user()->with_who); ?>">
                                    </div>
                                    <?php if($errors->has('who')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('who')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <label class="col-md-1 col-form-label">When?</label>
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <input type="text" name="when_training" class="form-control" placeholder="when?" value="<?php echo e(auth()->user()->when_training); ?>">
                                    </div>
                                    <?php if($errors->has('when')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('when')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-3 col-form-label">Is negotiation a regular part of your job?</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <select class="form-control negotiation" name="negotiation">
                                            <option value="">Select</option>
                                            <option value="yes" <?php if(auth()->user()->negotiation == "yes") { echo "selected"; } ?>>Yes</option>
                                            <option value="no" <?php if(auth()->user()->negotiation == "no") { echo "selected"; } ?>>No</option>

                                        </select>
                                    </div>
                                    <?php if($errors->has('negotiation')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('negotiation')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="row negotiation_details" <?php if(auth()->user()->negotiation == "no" || auth()->user()->negotiation == NULL) { ?> style="display:none;" <?php } ?>>
                                <label class="col-md-3 col-form-label">What companies do you negotiate with?</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                         
                                        <input type="text" name="negotiate_with" class="form-control" placeholder="Companies?" value="<?php echo e(auth()->user()->negotiate_with); ?>">
                                    </div>
                                    <?php if($errors->has('negotiate_with')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('negotiate_with')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <label class="col-md-3 col-form-label">What are the typical variables/items that you negotiate over?</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                         <input type="text" name="variables" class="form-control" placeholder="variables/items" value="<?php echo e(auth()->user()->variables); ?>">
                                    </div>
                                    <?php if($errors->has('variables')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('variables')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-md-3 col-form-label">Do you consider yourself a good negotiator?</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <select class="form-control negotiator" name="negotiator">
                                            <option value="">Select</option>
                                            <option value="yes" <?php if(auth()->user()->negotiator == "yes") { echo "selected"; } ?>>Yes</option>
                                            <option value="no" <?php if(auth()->user()->negotiator == "no") { echo "selected"; } ?>>No</option>

                                        </select>
                                    </div>
                                    <?php if($errors->has('negotiator')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('negotiator')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="negotiator_reason">
                                <div class="row why" <?php if(auth()->user()->negotiator == "no" || auth()->user()->negotiator == NULL) { ?> style="display: none;" <?php  } ?>>
                                <label class="col-md-3 col-form-label">Why?</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                         <input type="text" name="why" class="form-control" placeholder="Why?" value="<?php echo e(auth()->user()->why); ?>">                                        
                                    </div>
                                    <?php if($errors->has('why')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('why')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row why_not" <?php if(auth()->user()->negotiator == "yes" || auth()->user()->negotiator == NULL) { ?> style="display:none;" <?php } ?>>
                                <label class="col-md-3 col-form-label">Why Not?</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                         <input type="text" name="why_not" class="form-control" placeholder="Why Not?" value="<?php echo e(auth()->user()->why_not); ?>">
                                    </div>
                                    <?php if($errors->has('why_not')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('why_not')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            </div>

                            <div class="row">
                                <label class="col-md-3 col-form-label">Do you enjoy negotiating?</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <select class="form-control enjoy_negotiation" name="enjoy_negotiation">
                                            <option value="">Select</option>
                                            <option value="yes" <?php if(auth()->user()->enjoy_negotiation == "yes") { echo "selected"; } ?>>Yes</option>
                                            <option value="no" <?php if(auth()->user()->enjoy_negotiation == "no") { echo "selected"; } ?>>No</option>

                                        </select>
                                    </div>
                                    <?php if($errors->has('enjoy_negotiation')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('enjoy_negotiation')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="enjoy_reason">
                                <div class="row why_enjoy" <?php if(auth()->user()->enjoy_negotiation == "no" || auth()->user()->enjoy_negotiation == NULL) { ?> style="display: none;" <?php } ?>>
                                <label class="col-md-3 col-form-label">Why?</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                         <input type="text" name="why_enjoy" class="form-control" placeholder="Why?" value="<?php echo e(auth()->user()->why_enjoy); ?>">

                                        
                                    </div>
                                    <?php if($errors->has('why_enjoy')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('why_enjoy')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="why_not_enjoy row" <?php if(auth()->user()->enjoy_negotiation == "yes" || auth()->user()->enjoy_negotiation == NULL) { ?> style="display:none;" <?php } ?>>
                                <label class="col-md-3 col-form-label">Why Not?</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                         <input type="text" name="why_not_enjoy" class="form-control" placeholder="Why Not?" value="<?php echo e(auth()->user()->why_not_enjoy); ?>">
                                    </div>
                                    <?php if($errors->has('why_not')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('why_not')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            </div>
                        
                            <div class="row">
                                <label class="col-md-3 col-form-label">Name one thing you wish you could do better in order to become a more effective negotiator?</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <textarea name="effective_negotiator" class="form-control" placeholder="Type here.."><?php echo e(auth()->user()->effective_negotiator); ?></textarea> 
                                    </div>
                                    <?php if($errors->has('effective_negotiator')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('effective_negotiator')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>                            

                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round"><?php echo e(__('Save Changes')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>

                <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h5 class="modal-title" id="exampleModalLabel">Upload Profile Picture</h5>
                              </div>
                              <div class="modal-body">
                                <form method="POST" action="<?php echo e(route('updateProfileImage')); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                                   <input type="file" class="form-control" name="profile_pic" id="profile_pic" >
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                               </form> 
                              </div>
                            </div>
                          </div>
                        </div>

                <form id="change_password" class="col-md-12" action="<?php echo e(route('profile.password')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title"><?php echo e(__('Change Password')); ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('Old Password')); ?></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="old_password" class="form-control" placeholder="Old password" required>
                                    </div>
                                    <?php if($errors->has('old_password')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('old_password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('New Password')); ?></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
                                    </div>
                                    <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label"><?php echo e(__('Password Confirmation')); ?></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
                                    </div>
                                    <?php if($errors->has('password_confirmation')): ?>
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round"><?php echo e(__('Save Changes')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
   
$(document).ready(function() { 
      $.validator.addMethod("pwcheckallowedchars", function (value) {
        return /^[a-zA-Z0-9!@#$%^&*()_=\[\]{};':"\\|,.<>\/?+-]+$/.test(value) // has only allowed chars letter
    }, "The password contains non-admitted characters");

   $.validator.addMethod("pwcheckuppercase", function (value) {
        return /[A-Z]/.test(value) // has an uppercase letter
    }, "The password must contain at least one uppercase letter");

   $.validator.addMethod("pwchecklowercase", function (value) {
        return /[a-z]/.test(value) // has a lowercase letter
    }, "The password must contain at least one lowercase letter");

   $.validator.addMethod("pwchecknumber", function (value) {
        return /\d/.test(value) // has a digit
    }, "The password must contain at least one number");
    
    $.validator.addMethod("pwcheckspechars", function (value) {
        return /[!@#$%^&*()_=\[\]{};':"\\|,.<>\/?+-]/.test(value)
    }, "The password must contain at least one special character");  
    
  
  $("#change_password").validate({   
    rules: { 
      old_password: {
        required: true,        
      },
      password: {
        required: true,
        pwcheckallowedchars: true,
        pwcheckuppercase: true,
        pwchecklowercase: true,            
        pwchecknumber: true,            
       pwcheckspechars: true,
                    
      },
      password_confirmation: {
        required: true,  
        equalTo : "#password",      
      }
    },
    // Specify validation error messages
    messages: {
      
      old_password: {
        required: "Please enter old pasword.",
        //minlength: "Your password must be at least 8 characters long."
      },  
      password: {
        required: "Please enter new pasword.",
        //minlength: "Your password must be at least 8 characters long."
      },  
      password_confirmation: {
        required: "Please confirm new password.",
        equalTo : "Password and confirm password should be same."
        //minlength: "Your password must be at least 8 characters long."
      },      
    },
   
    submitHandler: function(form) {
      form.submit();
    }
  });

$('.training').change(function(){
    var val = $(this).val();
    if(val!="" & val=='yes')
    {
        $('.traing_details').show();
    }else
    {
        $('.traing_details').hide();
    }
});

$('.negotiation').change(function(){
    var val = $(this).val();
    if(val!="" & val=='yes')
    {
        $('.negotiation_details').show();
    }else
    {
        $('.negotiation_details').hide();
    }
});

$('.negotiator').change(function(){
    var val = $(this).val();
    if(val!="" & val=='yes')
    {
        $('.why').show();
    }else
    {
        $('.why').hide();
    }

    if(val!="" & val=='no')
    {
        $('.why_not').show();
    }else
    {
        $('.why_not').hide();
    }
});

$('.enjoy_negotiation').change(function(){
    var val = $(this).val();
    if(val!="" & val=='yes')
    {
        $('.why_enjoy').show();
    }else
    {
        $('.why_enjoy').hide();
    }

    if(val!="" & val=='no')
    {
        $('.why_not_enjoy').show();
    }else
    {
        $('.why_not_enjoy').hide();
    }
});
});

$(document).ready(function(){
$("#edit_profile").validate({ 
    rules: { 
      name: {
        required: true,        
      },
      email: {
        required: true,
        email:true                    
      },
      company: {
        required: true,     
      },
      division: {
        required: true,     
      },
      title: {
        required: true,     
      },
      manager_name: {
        required: true,     
      },
      training: {
        required: true,     
      },
      negotiation: {
        required: true,     
      },
      negotiator: {
        required: true,     
      },
      enjoy_negotiation: {
        required: true,     
      },
      effective_negotiator: {
        required: true,     
      },
    },
    //Specify validation error messages
    messages: {
      
      name: {
        required: "Please enter full name.",
        //minlength: "Your password must be at least 8 characters long."
      },  
      email: {
        required: "Please enter email id.",
        email: "Invalid email id."
        //minlength: "Your password must be at least 8 characters long."
      },  
      company: {
        required: "Please enter Company Name.",
      },
      division: {
        required: "Please enter division.",
      }, 

      title: {
        required: "Please enter title.",
      },     
      manager_name: {
        required: "Please enter Manager Name.",
      },  
      training: {
        required: "Please select an answer.",
      }, 
      negotiation: {
        required: "Please select an answer.",
      }, 
      negotiator: {
        required: "Please select an answer.",
      }, 
      enjoy_negotiation: {
        required: "Please select an answer.",
      }, 
      effective_negotiator: {
        required: "Please enter your answer.",
      }, 
    },
   
    submitHandler: function(form) {
      form.submit();
    }
  });
});

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', [
    'class' => '',
    'elementActive' => 'profile'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/profile/edit.blade.php ENDPATH**/ ?>
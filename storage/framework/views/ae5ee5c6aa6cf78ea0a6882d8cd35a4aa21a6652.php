<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="<?php echo e(route('home')); ?>" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="<?php echo e(asset('paper')); ?>/img/brand_logo.jpg">
            </div>
        </a>
        <a href="<?php echo e(route('home')); ?>" class="simple-text logo-normal">
            <?php echo e(__('The Maker Group')); ?>

        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <?php if(auth()->user()->complete_profile == "1"): ?>
            <li class="<?php echo e($elementActive == 'dashboard' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('page.index', 'dashboard')); ?>">
                    <i class="nc-icon nc-bank"></i>
                    <p><?php echo e(__('Dashboard')); ?> </p>
                </a>
            </li>
            <?php endif; ?>

            <!-- Admin Section -->
            <?php if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 ): ?>
            <li class="<?php echo e($elementActive == 'user' || $elementActive == 'admin' || $elementActive == 'profile' ? 'active' : ''); ?>">
                <a data-toggle="collapse" aria-expanded="true" href="#user_nav">
                    <i class="fa fa-users"></i>
                    <p>
                            <?php echo e(__('Users')); ?>

                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="user_nav">
                    <ul class="nav">
                        <li class="<?php echo e($elementActive == 'profile' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('profile.edit')); ?>">
                                <!-- <span class="sidebar-mini-icon"><?php echo e(__('UP')); ?></span> -->
                                <span class="sidebar-normal"><?php echo e(__(' User Profile ')); ?></span>
                            </a>
                        </li>
                        <?php if(auth()->user()->complete_profile == "1"): ?>
                        <li class="<?php echo e($elementActive == 'user' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('page.index', 'user')); ?>">
                                <!-- <span class="sidebar-mini-icon"><?php echo e(__('U')); ?></span> -->
                                <span class="sidebar-normal"><?php echo e(__(' User Management ')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(auth()->user()->complete_profile == "1"): ?>
                        <li class="<?php echo e($elementActive == 'user' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('newaccounts')); ?>">
                                <!-- <span class="sidebar-mini-icon"><?php echo e(__('U')); ?></span> -->
                                <span class="sidebar-normal">New Accounts</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(auth()->user()->complete_profile == "1"): ?>
                        <li class="<?php echo e($elementActive == 'admin' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('addAdmin')); ?>">
                                <!-- <span class="sidebar-mini-icon"><?php echo e(__('U')); ?></span> -->
                                <span class="sidebar-normal"><?php echo e(__(' Admin Management ')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(auth()->user()->role_id == 1): ?>
                         <li class="<?php echo e($elementActive == 'admin' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('masterpassword')); ?>">
                                <!-- <span class="sidebar-mini-icon"><?php echo e(__('U')); ?></span> -->
                                <span class="sidebar-normal">Master Password</span>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </li>


            <?php if(auth()->user()->complete_profile == "1"): ?>
            <li class="<?php echo e($elementActive == 'add_batch' || $elementActive == 'list_batches' ? 'active' : ''); ?>">
                <a data-toggle="collapse" aria-expanded="true" href="#batch_nav">
                    <i class="fa fa-user-plus"></i>
                    <p>
                            <?php echo e(__('Workshops')); ?>

                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="batch_nav">
                    <ul class="nav">
                        <li class="<?php echo e($elementActive == 'add_batch' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('getBatchForm')); ?>">
                                <!-- <span class="sidebar-mini-icon"><?php echo e(__('AB')); ?></span> -->
                                <span class="sidebar-normal"><?php echo e(__(' Add Workshop')); ?></span>
                            </a>
                        </li>
                        <li class="<?php echo e($elementActive == 'list_batches' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('showBatch')); ?>">
                                <!-- <span class="sidebar-mini-icon"><?php echo e(__('LB')); ?></span> -->
                                <span class="sidebar-normal"><?php echo e(__(' List Workshop')); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <?php endif; ?>
            <?php if(auth()->user()->complete_profile == "1"): ?>
            <li class="<?php echo e($elementActive == 'add_question' || $elementActive == 'list_questions' ?
            'active' : ''); ?>">
                <a data-toggle="collapse" aria-expanded="true" href="#question_nav">
                    <i class="fa fa-question"></i>
                    <p>
                            <?php echo e(__('Questionnaire')); ?>

                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="question_nav">
                    <ul class="nav">
                        <li class="<?php echo e($elementActive == 'list_questions' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('showQuestions')); ?>">
                               <!--  <span class="sidebar-mini-icon"><?php echo e(__('LQ')); ?></span> -->
                                <span class="sidebar-normal"><?php echo e(__(' List Questions ')); ?></span>
                            </a>
                        </li>
                        <li class="<?php echo e($elementActive == 'add_question' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('getAddQuestionForm')); ?>">
                                <!-- <span class="sidebar-mini-icon"><?php echo e(__('AQ')); ?></span> -->
                                <span class="sidebar-normal"><?php echo e(__(' Add Questions ')); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <?php endif; ?>
            <?php if(auth()->user()->complete_profile == "1"): ?>
            <li class="<?php echo e($elementActive == 'add_team' || $elementActive == 'list_teams' ? 'active' : ''); ?>">
                <a data-toggle="collapse" aria-expanded="true" href="#team_nav">
                    <i class="fa fa-handshake-o"></i>
                    <p>
                            <?php echo e(__('Teams')); ?>

                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="team_nav">
                    <ul class="nav">
                        <li class="<?php echo e($elementActive == 'add_team' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('addTeamForm')); ?>">
                                <!-- <span class="sidebar-mini-icon"><?php echo e(__('AT')); ?></span> -->
                                <span class="sidebar-normal"><?php echo e(__(' Add Team')); ?></span>
                            </a>
                        </li>
                        <li class="<?php echo e($elementActive == 'list_teams' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('listTeams')); ?>">
                                <!-- <span class="sidebar-mini-icon"><?php echo e(__('LT')); ?></span> -->
                                <span class="sidebar-normal"><?php echo e(__(' List Teams')); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <?php endif; ?>
            <?php if(auth()->user()->complete_profile == "1"): ?>
              <li class="<?php echo e($elementActive == 'contactform' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('getGamePage')); ?>">
                    <i class="nc-icon nc-tile-56"></i>
                    <p><?php echo e(__('Bidding Game')); ?></p>
                </a>
            </li>

            <li class="<?php echo e($elementActive == 'contactform' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('playbackGamePage')); ?>">
                    <i class="nc-icon nc-tile-56"></i>
                    <p><?php echo e(__('Playback Bidding Game')); ?></p>
                </a>
            </li>

            <li class="<?php echo e($elementActive == 'list_details_page' || $elementActive == 'list_pages' ? 'active' : ''); ?>">
                <a data-toggle="collapse" aria-expanded="true" href="#pages_nav">
                    <i class="fa fa-file"></i>
                    <p>
                            <?php echo e(__('Pages')); ?>

                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="pages_nav">
                    <ul class="nav">
                        <li class="<?php echo e($elementActive == 'list_pages' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('showPages')); ?>">
                                <!-- <span class="sidebar-mini-icon"><?php echo e(__('HPC')); ?></span> -->
                                <span class="sidebar-normal"><?php echo e(__(' Home Page Content ')); ?></span>
                            </a>
                        </li>
                        <li class="<?php echo e($elementActive == 'list_details_page' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('detailPageList')); ?>">
                                <!-- <span class="sidebar-mini-icon"><?php echo e(__('LDP')); ?></span> -->
                                <span class="sidebar-normal"><?php echo e(__(' List Details Page')); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="<?php echo e($elementActive == 'list_reports' ? 'active' : ''); ?>">
                <a data-toggle="collapse" aria-expanded="true" href="#report_nav">
                    <i class="fa fa-file"></i>
                    <p>
                            <?php echo e(__('Reports')); ?>

                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="report_nav">
                    <ul class="nav">
                        <li class="<?php echo e($elementActive == 'list_reports' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('getReportPage')); ?>">
                                <!-- <span class="sidebar-mini-icon"><?php echo e(__('LR')); ?></span> -->
                                <span class="sidebar-normal"><?php echo e(__(' List Reports ')); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <?php endif; ?>
            <?php endif; ?>

            <!-- User's Section -->
             <?php if(auth()->user()->role_id == 3): ?>

             <li class="<?php echo e($elementActive == 'user' || $elementActive == 'profile' ? 'active' : ''); ?>">
                <a data-toggle="collapse" aria-expanded="true" href="#user_nav">
                    <i class="fa fa-users"></i>
                    <p>
                            <?php echo e(__('Profile')); ?>

                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="user_nav">
                    <ul class="nav">
                        <li class="<?php echo e($elementActive == 'profile' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('profile.edit')); ?>">
                                <!-- <span class="sidebar-mini-icon"><?php echo e(__('UP')); ?></span> -->
                                <span class="sidebar-normal"><?php echo e(__('Profile ')); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!--  <div class="collapse show" id="user_nav">
                    <ul class="nav">
                        <li class="<?php echo e($elementActive == 'complete_profile' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('profile.edit')); ?>">
                                <span class="sidebar-mini-icon"><?php echo e(__('CP')); ?></span>
                                <span class="sidebar-normal"><?php echo e(__('Complete Profile ')); ?></span>
                            </a>
                        </li>
                    </ul>
                </div> -->
            </li>
            <?php if(auth()->user()->complete_profile == "1"): ?>
            <li class="<?php echo e($elementActive == 'contactform' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('page.index', 'contactform')); ?>">
                    <i class="nc-icon nc-tile-56"></i>
                    <p><?php echo e(__('Contact Us')); ?></p>
                </a>
            </li>
            <?php endif; ?>
            <?php endif; ?>
        </ul>
    </div>
</div><?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/layouts/navbars/auth.blade.php ENDPATH**/ ?>
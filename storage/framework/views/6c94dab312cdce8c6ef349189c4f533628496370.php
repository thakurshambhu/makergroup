<?php $__env->startSection('content'); ?>
<style>
  .navbar{display:none;} .sidebar{display:none;}
   @font-face {
        font-family: 'fontawesome3';
        src: url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.ttf?v=4.7.0') format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    .fa3 {
        display: inline-block;
        font: normal normal normal 14px/1 fontawesome3;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        
    }

    .fa3{width: auto;}
    .table-communication tbody tr td.name .btn.show_graph{width: auto;}

    .addObjective:before{display: inline-block;
        font: normal normal normal 14px/1 fontawesome3;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        content: "\f055"; margin-right: 5px; vertical-align: middle;}
    .addObjective .fa3{display: none;}
    .stepContainer{background: #fff;}

</style>

<section id="allplans">
   





     <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                     <div class="stepHeader">
                <h3>Objectives</h3>
            </div>
                </div>
                  <div class="col-lg-1 col-md-2 col-sm-3">
                           <label >Background</label>
                       </div>
                       <div class="col-lg-11 col-md-10 col-sm-8  pl-sm-2">
                           <div  name="background"  class="form-control background_input"><?php echo e(isset($your_Objectives[0]->background) ? $your_Objectives[0]->background : ''); ?></div>
                          <span class="error"></span>
                       </div> 
                    <div class="col-md-6" >
                 <div class="objectiveBlock">
                        <h3>your objectives</h3>
                        <div class="your_objective">
                            <?php $i=0; ?>
                            <?php if(!$your_Objectives->isEmpty()): ?>
                            <?php $__currentLoopData = $your_Objectives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objective): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="your_obj_id[]" class="your_obj_id" value="<?php if(!empty($your_Objectives)): ?> <?php echo e($objective->id); ?> <?php endif; ?>">
                            <div id="accordion_<?php echo e($i); ?>" class="accordion your_accordion radius-1">
                                <div class="card mb-0">
                                    <div class="card-header collapsed" data-toggle="collapse" href="#yourexample<?php echo e($i); ?>">
                                        <a class="card-title"> objective <?php echo e($i+1); ?> </a>
                                    </div>
                                    <div id="yourexample<?php echo e($i); ?>" class="card-body collapse show" data-parent="#youraccordion">
                                        <div class="form-group form-inline justify-content-between">
                                            <label >specific</label> 
                                            <div class="auto-height form-control specific_input"><span><?php if(!empty($your_Objectives)): ?> <?php echo e($objective->your_specific); ?> <?php endif; ?></span></div>
                                            <span class="error specific_error"></span>
                                            <!--   <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                        </div>
                                        <div class="form-group form-inline justify-content-between">
                                            <label >measurable</label> 
                                            <div class="form-control mesaurable_input auto-height"><span><?php if(!empty($your_Objectives)): ?> <?php echo e($objective->your_measurable); ?> <?php endif; ?></span></div>
                                            <span class="error"></span>
                                            <!-- <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                        </div>
                                        <div class="form-group form-inline justify-content-between">
                                            <label >achievable</label> 
                                            <div class="form-control achievable_input auto-height"><span><?php if(!empty($your_Objectives)): ?> <?php echo e($objective->your_achievable); ?> <?php endif; ?></span></div>
                                            <span class="error"></span>
                                            <!-- <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                           
                                        </div>
                                        <div class="form-group form-inline justify-content-between">
                                            <label >relevant</label> 
                                            <div class="form-control relevant_input auto-height"><span><?php if(!empty($your_Objectives)): ?> <?php echo e($objective->your_relevant); ?> <?php endif; ?></span></div>
                                            <span class="error"></span>
                                            <!-- <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                        </div>
                                      
                                        <div class="form-group form-inline justify-content-between">
                                            <label >time bound</label> 
                                            <div class="auto-height form-control time_bond_input"><span><?php if(!empty($your_Objectives)): ?> <?php echo e($objective->your_time_bound); ?> <?php endif; ?></span></div>
                                            <span class="error"></span>
                                            <!-- <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                             <a  class="remove_objective" href="<?php echo e(url('objectives/your_delete')); ?>/<?php echo e($objective->id); ?>"><i class="fa fa-times-circle"></i></a>    
                                        </div>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <div id="accordion_0" class="accordion your_accordion radius-1">
                                <div class="card mb-0">
                                    <div class="card-header collapsed" data-toggle="collapse" href="#yourexample0">
                                        <a class="card-title"> objective 1 </a>
                                    </div>
                                    <div id="yourexample0" class="card-body collapse show" data-parent="#youraccordion">
                                        <div class="form-group form-inline justify-content-between">
                                            <label >specific</label> <input type="text" name="your_specific[]" id="your_specific_0" class="form-control specific_input">
                                            <span class="error specific_error"></span>
                                            <!--  <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                        </div>
                                        <div class="form-group form-inline justify-content-between">
                                            <label >measurable</label> <input type="text" name="your_measurable[]" id="your_measurable_0" class="form-control mesaurable_input">
                                            <span class="error"></span>
                                            <!--  <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                        </div>
                                        <div class="form-group form-inline justify-content-between">
                                            <label >achievable</label> <input type="text" name="your_achievable[]" id="your_achievable_0" class="form-control achievable_input"><span class="error"></span>
                                            <!-- <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                        </div>
                                        <div class="form-group form-inline justify-content-between">
                                            <label >relevant</label> <input type="text" name="your_relevant[]" id="your_relevant_0" class="form-control relevant_input"><span class="error"></span>
                                            <!-- <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                        </div>
                                        <div class="form-group form-inline justify-content-between">
                                            <label >time bound</label> <input type="text" name="your_time_bound[]" id="your_time_bound_0" class="form-control time_bond_input"><span class="error"></span>
                                            <!-- <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                        </div>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                   
                      
                             <a href="javascript:void(0);" class="addObjective" data-obj-type="your"><i class="fa3 fa-plus-circle"></i> Add Objective</a>
                        <div class="divider"></div>
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="objectiveBlock stepBlock">
                        <h3>their objectives</h3>
                        <div class="their_objective">
                            <?php $i=0; ?>
                            <?php if(!$their_Objectives->isEmpty()): ?>
                            <?php $__currentLoopData = $their_Objectives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objective): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div id="their_accordion_<?php echo e($i); ?>" class="accordion their_accordion
                                radius-1">
                                <div class="card mb-0">
                                    <div class="card-header collapsed OrangeBg" data-toggle="collapse" href="#theirexample<?php echo e($i); ?>">
                                        <a class="card-title"> objective <?php echo e($i+1); ?> </a>
                                    </div>
                                    <div id="theirexample<?php echo e($i); ?>" class="card-body collapse show" data-parent="#theiraccordion">
                                        <div class="form-group form-inline justify-content-between">
                                            <label >specific</label> 
                                            <div class="auto-height form-control specific_input" ><span><?php if(!empty($their_Objectives)): ?> <?php echo e($objective->their_specific); ?> <?php endif; ?></span></div>
                                            <span class="error"></span>
                                            <!-- <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                        </div>
                                        <input type="hidden" name="obj_id[]" class="obj_id" value="<?php if(!empty($their_Objectives)): ?> <?php echo e($objective->id); ?> <?php endif; ?>">
                                        <div class="form-group form-inline justify-content-between">
                                            <label >measurable</label> 
                                            <div class="form-control mesaurable_input auto-height"><span><?php if(!empty($their_Objectives)): ?> <?php echo e($objective->their_measurable); ?> <?php endif; ?></span></div>
                                            <span class="error"></span>
                                            <!-- <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                        </div>
                                        <div class="form-group form-inline justify-content-between">
                                            <label >achievable</label> 
                                            <div class="form-control achievable_input auto-height"><span><?php if(!empty($their_Objectives)): ?> <?php echo e($objective->their_achievable); ?> <?php endif; ?></span></div>
                                            <span class="error"></span>
                                            <!-- <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                           
                                        </div>
                                        <div class="form-group form-inline justify-content-between">
                                            <label >relevant</label> 
                                            <div class="form-control relevant_input auto-height"><span><?php if(!empty($their_Objectives)): ?> <?php echo e($objective->their_relevant); ?> <?php endif; ?></span></div>
                                            <span class="error"></span>
                                            <!-- <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                        </div>
                                       
                                        <div class="form-group form-inline justify-content-between">
                                            <label >time bound</label> 
                                            <div  class="form-control time_bond_input auto-height"><span><?php if(!empty($their_Objectives)): ?> <?php echo e($objective->their_time_bound); ?> <?php endif; ?></span></div>
                                            <span class="error"></span>
                                            <!-- <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                            <a class="remove_objective" href="<?php echo e(url('objectives/their_delete')); ?>/<?php echo e($objective->id); ?>"><i class="fa fa-times-circle"></i></a>    
                                        </div>

                                       
                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <div id="their_accordion_0" class="accordion their_accordion
                                radius-1">
                                <div class="card mb-0">
                                    <div class="card-header collapsed OrangeBg" data-toggle="collapse" href="#theirexample0">
                                        <a class="card-title"> objective 1 </a>
                                    </div>
                                    <div id="theirexample0" class="card-body collapse show" data-parent="#theiraccordion">
                                        <div class="form-group form-inline justify-content-between">
                                            <label >specific</label> <input type="text" name="their_specific[]" id="their_specific_0" class="form-control specific_input"><span class="error"></span>
                                            <!-- <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                        </div>
                                        <input type="hidden" name="obj_id[]" class="first_obj" value="">
                                        <div class="form-group form-inline justify-content-between">
                                            <label >measurable</label> <input type="text" name="their_measurable[]" id="their_measurable_0" class="form-control mesaurable_input"><span class="error"></span>
                                            <!-- <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                        </div>
                                        <div class="form-group form-inline justify-content-between">
                                            <label >achievable</label> <input type="text" name="their_achievable[]" id="their_achievable_0" class="form-control achievable_input"><span class="error"></span>
                                            <!-- <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                        </div>
                                        <div class="form-group form-inline justify-content-between">
                                            <label >relevant</label> <input type="text" name="their_relevant[]" id="their_relevant_0" class="form-control relevant_input"><span class="error"></span>
                                            <!-- <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                        </div>
                                        <div class="form-group form-inline justify-content-between">
                                            <label >time bound</label> <input type="text" name="their_time_bound[]" id="their_time_bound_0"  class="form-control time_bond_input"><span class="error"></span>
                                            <!-- <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                                ?
                                                </button> -->
                                        </div>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                          <a href="javascript:void(0);" class="addObjective" data-obj-type="there"><i class="fa3 fa-plus-circle" ></i> Add Objective</a>
                    <div class="divider"></div>
                    </div>
                  
                </div>

           



             </div>


   </div>
   
      <div class="row">     <div class="col-md-6">
                      <div class="restrictions">
                            <div class="form-group">
                                <label>Internal restrictions</label>
                                <textarea id="my-input" class="internal_rest_input" rows="3" type="text" name="your_internal_rest[]" value="<?php if(!$your_Objectives->isEmpty()): ?> <?php echo e($your_Objectives[0]->your_internal_restrictions); ?> <?php endif; ?>"><?php if(!$your_Objectives->isEmpty()): ?> <?php echo e($your_Objectives[0]->your_internal_restrictions); ?> <?php endif; ?></textarea><span class="error"></span>
                            </div>
                            <div class="form-group">
                                <label>external restrictions</label>
                                <textarea id="my-input" class="external_rest_input" rows="3" type="text" name="your_external_rest[]" value="<?php if(!$your_Objectives->isEmpty()): ?> <?php echo e($your_Objectives[0]->your_external_restrictions); ?> <?php endif; ?>"> <?php if(!$your_Objectives->isEmpty()): ?> <?php echo e($your_Objectives[0]->your_external_restrictions); ?> <?php endif; ?> </textarea><span class="error"></span>
                            </div>
                        </div>
                </div> </div>
  
   
            <div class="row pow-pdf pdf_down">
                <div class="logo-hidden col-md-12 col-lg-12 col-sm-12" style="display: none;">
                    <img src="<?php echo e(asset('/paper/img/')); ?>/brand_logo.jpg">
                </div>
                <div class="col-md-6">
                    <div class="stepBlock">
                        <div class="d-flex powerStep justify-content-between align-items-center">
                            <h3>power director</h3>
                            <div class="headerPoints">
                                <ul>
                                    <li><span>2</span>Strongly agree</li>
                                    <li><span>1</span>agree</li>
                                    <li><span>-1</span>Disagree</li>
                                    <li><span>-2</span>Strongly Disagree</li>
                                </ul>
                            </div>
                        </div>
                        <div class="questions">
                            <div class="questionhdr">
                                <h4>Answer the following statements regarding your negotiation, thinking from <b>Your</b> point of view
                                </h4>
                                <h5>You</h5>
                                <div class="questionblk d-flex justify-content-between align-items-center">
                                    <p><strong>1.</strong> Our alternatives outside of this negotiation are stronger than theirs.</p>
                                    <div class="select">
                                        <img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/arrow-down.svg" class="icon-select" alt="">
                                        <select name="your_question1" id="your_question1" class="your_onchange">
                                            <option value="">----</option>
                                            <option value="2" <?php if(!$Power->isEmpty() && $Power[0]->your_answer1 == '2') { echo "selected"; } ?>>2</option>
                                            <option value="1" <?php if(!$Power->isEmpty() && $Power[0]->your_answer1 == '1') { echo "selected"; } ?>>1</option>
                                            <option value="-1" <?php if(!$Power->isEmpty() && $Power[0]->your_answer1 == '-1') { echo "selected"; } ?>>-1</option>
                                            <option value="-2" <?php if(!$Power->isEmpty() && $Power[0]->your_answer1 == '-2') { echo "selected"; } ?>>-2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="questionblk d-flex justify-content-between align-items-center">
                                    <p><strong>2.</strong>We have less time pressure to agree than they do.</p>
                                    <div class="select">
                                        <img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/arrow-down.svg" class="icon-select" alt="">
                                        <select name="your_question2" id="your_question2" class="your_onchange">
                                            <option value="">----</option>
                                            <option value="2" <?php if(!$Power->isEmpty() && $Power[0]->your_answer2 == '2') { echo "selected"; } ?>>2</option>
                                            <option value="1" <?php if(!$Power->isEmpty() && $Power[0]->your_answer2 == '1') { echo "selected"; } ?>>1</option>
                                            <option value="-1" <?php if(!$Power->isEmpty() && $Power[0]->your_answer2 == '-1') { echo "selected"; } ?>>-1</option>
                                            <option value="-2" <?php if(!$Power->isEmpty() && $Power[0]->your_answer2 == '-2') { echo "selected"; } ?>>-2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="questionblk d-flex justify-content-between align-items-center">
                                    <p><strong>3.</strong>We have other options and little dependency on them.</p>
                                    <div class="select">
                                        <img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/arrow-down.svg" class="icon-select" alt="">
                                        <select name="your_question3" id="your_question3" class="your_onchange">
                                            <option value="">----</option>
                                            <option value="2" <?php if(!$Power->isEmpty() && $Power[0]->your_answer3 == '2') { echo "selected"; } ?>>2</option>
                                            <option value="1" <?php if(!$Power->isEmpty() && $Power[0]->your_answer3 == '1') { echo "selected"; } ?>>1</option>
                                            <option value="-1" <?php if(!$Power->isEmpty() && $Power[0]->your_answer3 == '-1') { echo "selected"; } ?>>-1</option>
                                            <option value="-2" <?php if(!$Power->isEmpty() && $Power[0]->your_answer3 == '-2') { echo "selected"; } ?>>-2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="questionblk d-flex justify-content-between align-items-center">
                                    <p><strong>4.</strong>We have more information about their circumstances than they do of ours.</p>
                                    <div class="select">
                                        <img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/arrow-down.svg" class="icon-select" alt="">
                                        <select name="your_question4" id="your_question4" class="your_onchange">
                                            <option value="">----</option>
                                            <option value="2" <?php if(!$Power->isEmpty() && $Power[0]->your_answer4 == '2') { echo "selected"; } ?>>2</option>
                                            <option value="1" <?php if(!$Power->isEmpty() && $Power[0]->your_answer4 == '1') { echo "selected"; } ?>>1</option>
                                            <option value="-1" <?php if(!$Power->isEmpty() && $Power[0]->your_answer4 == '-1') { echo "selected"; } ?>>-1</option>
                                            <option value="-2" <?php if(!$Power->isEmpty() && $Power[0]->your_answer4 == '-2') { echo "selected"; } ?>>-2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="questionblk d-flex justify-content-between align-items-center">
                                    <p><strong>5.</strong>The consequences of deadlock are greater to them.</p>
                                    <div class="select">
                                        <img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/arrow-down.svg" class="icon-select" alt="">
                                        <select name="your_question5" id="your_question5" class="your_onchange">
                                            <option value="">----</option>
                                            <option value="2" <?php if(!$Power->isEmpty() && $Power[0]->your_answer5 == '2') { echo "selected"; } ?>>2</option>
                                            <option value="1" <?php if(!$Power->isEmpty() && $Power[0]->your_answer5 == '1') { echo "selected"; } ?>>1</option>
                                            <option value="-1" <?php if(!$Power->isEmpty() && $Power[0]->your_answer5 == '-1') { echo "selected"; } ?>>-1</option>
                                            <option value="-2" <?php if(!$Power->isEmpty() && $Power[0]->your_answer5 == '-2') { echo "selected"; } ?>>-2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="questionscore d-flex justify-content-between align-items-center">
                                    <span>total score</span>
                                    <span class="your_total"><?php if(!$Power->isEmpty()) { echo $Power[0]->your_answer1 + $Power[0]->your_answer2 + $Power[0]->your_answer3 + $Power[0]->your_answer4 + $Power[0]->your_answer5; } ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="questions">
                            <div class="questionhdr">
                                <h4>Answer the following statements regarding your negotiation, thinking from <b>Their</b> point of view
                                </h4>
                                <h5 class="OrangeBg">Your Counterparty:</h5>
                                <div class="questionblk d-flex justify-content-between align-items-center">
                                    <p><strong>1.</strong>They think their alternatives outside of this negotiation are stronger than ours.</p>
                                    <div class="select">
                                        <img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/arrow-down.svg" class="icon-select" alt="">
                                        <select name="counter_question1" id="counter_question1" class="counter_onchange">
                                            <option value="">----</option>
                                            <option value="2" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer1 == '2') { echo "selected"; } ?>>2</option>
                                            <option value="1" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer1 == '1') { echo "selected"; } ?>>1</option>
                                            <option value="1" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer1 == '-1') { echo "selected"; } ?>>-1</option>
                                            <option value="-2" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer1 == '-2') { echo "selected"; } ?>>-2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="questionblk d-flex justify-content-between align-items-center">
                                    <p><strong>2.</strong>They have more information about our options and circumstances.</p>
                                    <div class="select">
                                        <img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/arrow-down.svg" class="icon-select" alt="">
                                        <select name="counter_question2" id="counter_question2" class="counter_onchange">
                                            <option value="">----</option>
                                            <option value="2" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer2 == '2') { echo "selected"; } ?>>2</option>
                                            <option value="1" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer2 == '1') { echo "selected"; } ?>>1</option>
                                            <option value="-1" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer2 == '-1') { echo "selected"; } ?>>-1</option>
                                            <option value="-2" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer2 == '-2') { echo "selected"; } ?>>-2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="questionblk d-flex justify-content-between align-items-center">
                                    <p><strong>3.</strong>They believe that they are our only option.</p>
                                    <div class="select">
                                        <img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/arrow-down.svg" class="icon-select" alt="">
                                        <select name="counter_question3" id="counter_question3" class="counter_onchange">
                                            <option value="">----</option>
                                            <option value="2" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer3 == '2') { echo "selected"; } ?>>2</option>
                                            <option value="1" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer3 == '1') { echo "selected"; } ?>>1</option>
                                            <option value="-1" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer3 == '-1') { echo "selected"; } ?>>-1</option>
                                            <option value="-2" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer3 == '-2') { echo "selected"; } ?>>-2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="questionblk d-flex justify-content-between align-items-center">
                                    <p><strong>4.</strong>They have less time pressure to agree than we do.</p>
                                    <div class="select">
                                        <img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/arrow-down.svg" class="icon-select" alt="">
                                        <select name="counter_question4" id="counter_question4" class="counter_onchange">
                                            <option value="">----</option>
                                            <option value="2" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer4 == '2') { echo "selected"; } ?>>2</option>
                                            <option value="1" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer4 == '1') { echo "selected"; } ?>>1</option>
                                            <option value="-1" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer4 == '-1') { echo "selected"; } ?>>-1</option>
                                            <option value="-2" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer4 == '-2') { echo "selected"; } ?>>-2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="questionblk d-flex justify-content-between align-items-center">
                                    <p><strong>5.</strong> They perceive deadlock as having greater consequence to them than to us.</p>
                                    <div class="select">
                                        <img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/arrow-down.svg" class="icon-select" alt="">
                                        <select name="counter_question5" id="counter_question5" class="counter_onchange">
                                            <option value="">----</option>
                                            <option value="2" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer5 == '2') { echo "selected"; } ?>>2</option>
                                            <option value="1" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer5 == '1') { echo "selected"; } ?>>1</option>
                                            <option value="-1" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer5 == '-1') { echo "selected"; } ?>>-1</option>
                                            <option value="-2" <?php if(!$Power->isEmpty() && $Power[0]->counter_answer5 == '-2') { echo "selected"; } ?>>-2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="questionscore d-flex justify-content-between align-items-center">
                                    <span>total score</span>
                                    <span class="counter_total"><?php if(!$Power->isEmpty()) { echo $Power[0]->counter_answer1 + $Power[0]->counter_answer2 + $Power[0]->counter_answer3 + $Power[0]->counter_answer4 + $Power[0]->counter_answer5; } ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="powerDscore d-flex justify-content-between">
                            <span>POWER DIFFERENTIAL (Total Both Scores)</span>
                            <span class="positive diffrence"><?php $total_power = ""; if(!$Power->isEmpty()) { $total_power = $Power[0]->your_answer1 + $Power[0]->your_answer2 + $Power[0]->your_answer3 + $Power[0]->your_answer4 + $Power[0]->your_answer5 + $Power[0]->counter_answer1 + $Power[0]->counter_answer2 + $Power[0]->counter_answer3 + $Power[0]->counter_answer4 + $Power[0]->counter_answer5; echo $total_power; } ?></span>
                        </div>
                        <div class="scoreInfo">
                            <p class="more_power active" <?php if($total_power >= 7 ): ?> style="background: #68a2ff;" <?php endif; ?>><strong>7 to 20 :</strong> You may have more power than they do</p>
                            <p class="power_shared active" <?php if($total_power >= -6  && $total_power <= 6): ?> style="background: #F9CA5F;" <?php endif; ?>><strong>-6 to 6 : </strong>  Power is shared. Seek collaborative solutions.</p>
                            <p class="less_power active" <?php if($total_power <= -7 ): ?> style="background: red;" <?php endif; ?>><strong>-7 to -20 :</strong> You may have less power than they do</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="stepBlock">
                      <h3>power perception shifter</h3>
                      <div class="perceptionBlock row">
                        <div class="form-group box col-md-5">
                          <label ><strong>1.</strong> Where do they think we have power?</label>
                          <div name="inhence_think" id="inhence_think"  class="auto-height textareaClass form-control" value="<?php if(!$Power->isEmpty()) { echo $Power[0]->enhence_think; } ?>"><?php if(!$Power->isEmpty()) { echo $Power[0]->enhence_think; } ?></div>
                        </div>
                        <div class="iconBlock box enhance col-md-2 d-flex flex-column align-items-center justify-content-center">
                          <img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/enhance.svg" alt="">
                          <h6>enhance</h6>
                        </div>
                        <div class="form-group box col-md-5">
                          <label >How ?</label>
                          <div name="inhence_how" id="inhence_how"  class="auto-height textareaClass form-control" value="<?php if(!$Power->isEmpty()) { echo $Power[0]->enhence_how; } ?>"><?php if(!$Power->isEmpty()) { echo $Power[0]->enhence_how; } ?></div>
                        </div>
                      </div>
                      <div class="perceptionBlock row">
                        <div class="form-group box col-md-5">
                          <label ><strong>1.</strong>  Where do they think we are weak?</label>
                          <div name="change_think" id="change_think"  class="auto-height textareaClass form-control" value="<?php if(!$Power->isEmpty()) { echo $Power[0]->change_think; } ?>"><?php if(!$Power->isEmpty()) { echo $Power[0]->change_think; } ?></div>
                        </div>
                        <div class="iconBlock box change col-md-2 d-flex flex-column align-items-center justify-content-center">
                          <img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/change.svg" alt="">
                          <h6>change</h6>
                        </div>
                        <div class="form-group box col-md-5">
                          <label >How ?</label>
                          <div name="change_how" id="change_how" class="auto-height textareaClass form-control" value="change_how"><?php if(!$Power->isEmpty()) { echo $Power[0]->change_how; } ?></div>
                        </div>
                      </div>
                      <div class="perceptionBlock row">
                        <div class="form-group box col-md-5">
                          <label ><strong>1.</strong> Where do they think they have power?</label>
                          <div name="downgrade_think" id="downgrade_think" class="auto-height textareaClass form-control" value="<?php if(!$Power->isEmpty()) { echo $Power[0]->downgrade_think; } ?>"><?php if(!$Power->isEmpty()) { echo $Power[0]->downgrade_think; } ?></div>
                        </div>
                        <div class="iconBlock box downgrade col-md-2 d-flex flex-column align-items-center justify-content-center">
                          <img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/downgrade.svg" alt="">
                          <h6>downgrade</h6>
                        </div>
                        <div class="form-group box col-md-5">
                          <label >How ?</label>
                          <div name="downgrade_how" id="downgrade_how" class="auto-height textareaClass form-control" value="<?php if(!$Power->isEmpty()) { echo $Power[0]->downgrade_how; } ?>"><?php if(!$Power->isEmpty()) { echo $Power[0]->downgrade_think; } ?></div>
                        </div>
                      </div>
                      <div class="perceptionBlock row">
                        <div class="form-group box col-md-5">
                          <label ><strong>1.</strong> Where do they think they are weak?</label>
                          <div name="explot_think" id="explot_think" class="auto-height textareaClass form-control" value="<?php if(!$Power->isEmpty()) { echo $Power[0]->explot_think; } ?>"><?php if(!$Power->isEmpty()) { echo $Power[0]->explot_think; } ?></div>
                        </div>
                        <div class="iconBlock box explot col-md-2 d-flex flex-column align-items-center justify-content-center">
                          <img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/explot.svg" alt="">
                          <h6>Exploit</h6>
                        </div>
                        <div class="form-group box col-md-5">
                          <label >How ?</label>
                          <div name="explot_how" id="explot_how"  class="auto-height textareaClass form-control" value="<?php if(!$Power->isEmpty()) { echo $Power[0]->explot_how; } ?>"><?php if(!$Power->isEmpty()) { echo $Power[0]->explot_how; } ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="les_power" <?php if(!$Power->isEmpty() && $total_power <= -7 ): ?> style="display:block;" <?php else: ?> style="display:none;" <?php endif; ?>>
                    <p><strong>Negative Power State (-7 to -20):</strong> If you recognize that you are in a power deficit, it may be worth considering what steps you can take to rebalance the power state before continuing with the negotiation. Sometimes going as far as delaying the negotiation until a more equilibrium state has been created. If not, below are the implications of operating in a negative power state to the following steps in the process:</p>
                    <ul>
                        <li><strong>Communication:</strong> Internal alignment becomes critical to ensure that senior leadership is aligned to overall strategy. Messaging to the other party can be constrained. May need to involve senior stakeholders to drive effective external messaging, however this can be dangerous, proceed with caution. </li>
                        <li><strong>Time:</strong> You are most likely under the other party's time pressure; it will be more difficult to force time pressures on them. Be sure to assess whether imposed time constraints are legitimate, realistic, enforceable and actionable. </li>
                        <li><strong>Risk:</strong> Is generally higher when operating in a power deficit, as threats are harder to defend and proactively counteract. Having a robust risk assessment plan, along with mitigation and avoidance strategies becomes very important in this circumstance.</li>
                    </ul>
                </div>
                <div class="les_power" <?php if(!$Power->isEmpty() && $total_power <= -7 ): ?> style="display:block;" <?php else: ?> style="display:none;" <?php endif; ?>>
                <p><strong>Negative Power State (-7 to -20):</strong> If you recognize that you are in a power deficit, it may be worth considering what steps you can take to rebalance the power state before continuing with the negotiation. Sometimes going as far as delaying the negotiation until a more equilibrium state has been created. If not, below are the implications of operating in a negative power state to the following steps in the process:</p>
                <ul>
                    <li><strong>Communication:</strong> Internal alignment becomes critical to ensure that senior leadership is aligned to overall strategy. Messaging to the other party can be constrained. May need to involve senior stakeholders to drive effective external messaging, however this can be dangerous, proceed with caution. </li>
                    <li><strong>Time:</strong> You are most likely under the other party's time pressure; it will be more difficult to force time pressures on them. Be sure to assess whether imposed time constraints are legitimate, realistic, enforceable and actionable. </li>
                    <li><strong>Risk:</strong> Is generally higher when operating in a power deficit, as threats are harder to defend and proactively counteract. Having a robust risk assessment plan, along with mitigation and avoidance strategies becomes very important in this circumstance.</li>
                </ul>
            </div>
            <div class="eql_power" <?php if(!$Power->isEmpty() && $total_power >= -6  && $total_power <= 6): ?> style="display:block;" <?php else: ?> style="display:none;" <?php endif; ?>>
            <p><strong>Equal Power State (-6 to 6):</strong>  When power is in an equal state, neither side has an advantage, but it is always worth considering what could be done to increase the perception of power in your favor. If not, below are some of the implications of operating in an equal power state to the following steps in the process:</p>
            <ul>
                <li><strong>Communication:</strong> Should be viewed in a collaborative approach. Too strong of a message and you risk overplaying your position. Should be performed by those with the relevant relationships, senior stakeholders should be protected and only used as a last resort.   </li>
                <li><strong>Time:</strong> Time constraints become relevant to both parties’ circumstances, with neither side being able to impose credible hard deadlines on the other. Timeline threats should be viewed with skepticism at this level and assessed for credibility. </li>
                <li><strong>Risk:</strong> Both parties bear equal potential for risk, and that risk is ideally mitigated through a joint strategy, protecting both parties’ interests. </li>
            </ul>
        </div>
        <div class="mor_power" <?php if(!$Power->isEmpty() && $total_power >= 7 ): ?> style="display:block;" <?php else: ?> style="display:none;" <?php endif; ?>>
        <p><strong>Positive Power State (7 to 20):</strong>  When you are in a positive power state, you can choose to negotiate and operate in any style you chose, imposing your position on the other party. Recognize however the potential downfalls of abusing one's power, especially for short term gain in a long-term relationship. Below are some of the implications of operating in a positive power state to the following steps in the process:</p>
        <ul>
            <li><strong>Communication:</strong> You control how you communicate with the other party and who communicates with the other party. The tone of your messaging can be firm and direct. Generally, when in a positive power state, it is advisable that you limit the other party’s access to your senior stakeholders. Ideally you want your front-line negotiators to be seen as having full authority to act on the company's behalf, when senior stakeholders step in, they risk undermining their people’s authority in the other party’s eyes. This can establish a bad precedent which is difficult to recover from.  </li>
            <li><strong>Time:</strong> Time restrictions are generally imposed on the other party, with clearly laid out consequences for failure to comply, that are both realistic, specific and actionable. If deadlines are not met, consequences must be enforced, if not, you risk eroding your credibility in the other party’s eyes, and thus losing power.</li>
            <li><strong>Risk:</strong>  Is generally lower when you are in a positive power state, and what risks do exist, you attempt to pass off to the other party. That said, a risk assessment is still needed to identify any possible risks, even as unlikely as they may be.</li>
        </ul>
    </div>
</div>
<input type="hidden" name="power_id" value="<?php if(!$Power->isEmpty()) { echo $Power[0]->id; } ?>" id="power_id">
</div>
<div class="vari-pdf pdf_down col-md-12">
    <div class="logo-hidden" style="display: none;">
        <img src="<?php echo e(asset('/paper/img/')); ?>/brand_logo.jpg">
    </div>
    
        <div class="stepContainer p-0">
            <div class="stepHeader">
                <h3>variables</h3>
            </div>
            <div class="stepTable">
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-variables" id="tb">
                        <thead class="thead-orange">
                            <tr>
                                <th scope="col" colspan="3"></th>
                                <th scope="col" colspan="2" class="text-center">Get</th>
                                <th scope="col" colspan="2" class="text-center">give</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" width="30" class="text-center pdfIcons"><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Variable"><span class="fa3 fa-plus-circle"></span></a></th>
                                <th scope="col">variables </th>
                                <th scope="col">Get/Give </th>
                                <th scope="col">value<span class="subText">your</span></th>
                                <th scope="col">cost<span class="subText">their</span></th>
                                <th scope="col">cost<span class="subText">your</span></th>
                                <th scope="col">value<span class="subText">their</span></th>
                                <th scope="col">your Walk Away Point</th>
                                <th scope="col">their Walk Away Point</th>
                                <th scope="col" width="30" class="text-center pdfIcons"></th>
                            </tr>
                        </thead>
                        <tbody id="VariableTable">
                            <?php if($variable_data->isEmpty()): ?> 
                            <tr class="row1" id="1">
                                <td>1</td>
                                <td><input type="text" id="variable1" class="form-control"> </td>
                                <td id="select1">
                                    <div class="select" style="background: #F1B91D;">
                                        <span class="select_icon"><img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/dropdownicon.svg" alt=""></span>
                                        <select name="" id="1" class="form-control give_take_drop">
                                            <option disabled selected value>Select Option</option>
                                            <option value="give">Give</option>
                                            <option value="take">Get</option>
                                            <option value="take-give">Get/Give</option>
                                        </select>
                                    </div>
                                </td>
                                <td id="take-value1" class="givedefault"><input type="text" disabled class="form-control"> </td>
                                <td id="take-cost1" class="givedefault"><input type="text" disabled class="form-control"> </td>
                                <td id="give-cost1" class="givedefault"><input type="text" disabled class="form-control"> </td>
                                <td id="give-value1" class="givedefault"><input type="text" disabled class="form-control"> </td>
                                <td ><input type="text" id="your-breakpoint1" class="form-control"> </td>
                                <td ><input type="text" id="their-breakpoint1" class="form-control"> </td>
                                <td class="text-center pdfIcons"><a href='javascript:void(0);' title="Remove Variable"  class='remove RemoveVariable'><span class="fa3 fa-times-circle"></span></a></td>
                            </tr>
                            <?php else: ?>
                            <?php $__currentLoopData = $variable_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="row<?php echo e($data->id); ?>" id="<?php echo e($data->id); ?>">
                                <td><?php echo e($data->id); ?></td>
                                <td><input type="text" id="variable<?php echo e($data->id); ?>" value="<?php echo e($data->variables); ?>" class="form-control"> </td>
                                <td id="select<?php echo e($data->id); ?>">
                                    <?php if($data->take_give_status == 'take'): ?> 
                                    <div class="select takedanger">
                                        <?php elseif($data->take_give_status == 'give'): ?> 
                                        <div class="select givesucess">
                                            <?php else: ?> 
                                            <div class="select takegive">
                                                <?php endif; ?>
                                                <span class="select_icon">
                                                <img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/dropdownicon.svg" alt="">
                                                </span>
                                                <select name="" id="<?php echo e($data->id); ?>" class="form-control give_take_drop">
                                                    <option disabled selected value>Select Option</option>
                                                    <option value="give" <?php if($data->take_give_status=='give'): ?> selected='selected' <?php endif; ?>>Give</option>
                                                    <option value="take" <?php if($data->take_give_status=='take'): ?> selected='selected' <?php endif; ?>>Take</option>
                                                    <option value="take-give" <?php if($data->take_give_status=='take-give'): ?> selected='selected' <?php endif; ?>>Take/Give</option> 
                                                </select>
                                                <?php if($data->take_give_status == 'take'): ?> 
                                            </div>
                                            <?php elseif($data->take_give_status == 'give'): ?> 
                                        </div>
                                        <?php else: ?> 
                                    </div>
                                    <?php endif; ?>
                                </td>
                                <?php if(!empty($data->take_value) && empty(!$data->take_cost) && empty(!$data->give_cost) && empty(!$data->give_value)): ?>
                                <td id="take-value<?php echo e($data->id); ?>" class="givedefault"><input type="text" value="<?php echo e($data->take_value); ?>"  class="form-control"> </td>
                                <td id="take-cost<?php echo e($data->id); ?>" class="givedefault"><input type="text" value="<?php echo e($data->take_cost); ?>" class="form-control"> </td>
                                <td id="give-cost<?php echo e($data->id); ?>" class="givedefault"><input type="text" value="<?php echo e($data->give_cost); ?>" class="form-control"> </td>
                                <td id="give-value<?php echo e($data->id); ?>" class="givedefault"><input type="text" value="<?php echo e($data->give_value); ?>" class="form-control"> </td>
                                <?php elseif(!empty($data->take_value) && !empty($data->take_cost)): ?>
                                <td id="take-value<?php echo e($data->id); ?>" class="takedanger"><input type="text" value="<?php echo e($data->take_value); ?>" class="form-control"> </td>
                                <td id="take-cost<?php echo e($data->id); ?>" class="takedanger"><input type="text" value="<?php echo e($data->take_cost); ?>" class="form-control"> </td>
                                <td id="give-value<?php echo e($data->id); ?>" class="givedefault"><input type="text" disabled  class="form-control"> </td>
                                <td id="give-cost<?php echo e($data->id); ?>" class="givedefault"><input type="text" disabled class="form-control"> </td>
                                <?php elseif(!empty($data->give_cost) && empty(!$data->give_value)): ?>
                                <td id="give-cost<?php echo e($data->id); ?>" class="givesucess"><input type="text" value="<?php echo e($data->give_cost); ?>" class="form-control"> </td>
                                <td id="give-value<?php echo e($data->id); ?>" class="givesucess"><input type="text" value="<?php echo e($data->give_value); ?>" class="form-control"> </td>
                                <td id="take-value<?php echo e($data->id); ?>" class="givedefault"><input type="text" disabled  class="form-control"> </td>
                                <td id="take-cost<?php echo e($data->id); ?>" class="givedefault"><input type="text" disabled class="form-control"> </td>
                                <?php endif; ?>
                                <td ><input type="text" id="your-breakpoint<?php echo e($data->id); ?>" value="<?php echo e($data->your_breakpoint); ?>"class="form-control"> </td>
                                <td ><input type="text" id="their-breakpoint<?php echo e($data->id); ?>" value="<?php echo e($data->their_breakpoint); ?>" class="form-control"> </td>
                                <td class="text-center pdfIcons"><a href='javascript:void(0);' title="Remove Variable"  class='remove RemoveVariable'><span class="fa3 fa-times-circle"></span></a></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
   
</div>
<div class="row comm-pdf pdf_down">
    <div class="logo-hidden col-md-12 col-lg-12 col-sm-12" style="display: none;">
        <img src="<?php echo e(asset('/paper/img/')); ?>/brand_logo.jpg">
    </div>
    <div class="col-md-12">
        <div class="stepContainer">
            <div class="stepHeader">
                <h3>Communications</h3>
            </div>
            <div class="stepTable">
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-communication" id="">
                        <thead class="thead-orange">
                            <tr>
                                <th scope="col" colspan="11">KEY PLAYERS ( Their side)</th>
                            </tr>
                        </thead>
                        <thead class="thead-light">
                            <tr>
                                <th width="30" class="text-center pdfIcons"><a href="javascript:void(0);" style="font-size:18px;" title="Add More communication"><span class="fa3 fa-plus-circle addComm"></span></a></th>
                                <th scope="col">Who</th>
                                <th scope="col">title </th>
                                <!-- <th scope="col">LinkedIn URL </th> -->
                                <th scope="col">personality type</th>
                                <th scope="col">key decision maker</th>
                                <th scope="col" class="decision-th">decision maker type <a href="#" data-toggle="tooltip" data-html="true"  data-placement="right" title='' data-original-title='<img src="<?php echo e(asset("uploads/images/detail_page_icons")); ?>/decision-graph.jpg" />'><i class="fa3 fa-question-circle"></i></a></th>
                                <th scope="col">Rank</th>
                                <th scope="col">influenced by</th>
                                <th scope="col">relationship status</th>
                                <th width="30"></th>
                            </tr>
                        </thead>
                        <tbody id="CommTable">
                            <?php if(!$communication->isEmpty()): ?>
                            <?php $x=1; ?>
                            <?php $__currentLoopData = $communication; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="row<?php echo e($data->id); ?>" id="<?php echo e($data->id); ?>">
                                <td><?php echo e($x); ?></td>
                                <td class="name"><input type="text" class="form-control addInfluenceBy" id="whoComm<?php echo e($data->id); ?>" value="<?php echo e($data->who); ?>">    
                                </td>
                                <td class="title"><input type="text" class="form-control" id="title<?php echo e($data->id); ?>" value="<?php echo e($data->title); ?>"> </td>
                                <!--  <td class="url"><input type="text" class="form-control get_personality" data-id="<?php echo e($data->id); ?>" id="linkedin<?php echo e($data->id); ?>" value="<?php echo e($data->linkedin_url); ?>"> </td> -->
                                <td class="personality name"><input type="text" class="form-control" id="personality<?php echo e($data->id); ?>" value="<?php echo e($data->personality_type); ?>"><button type="button" data-toggle="modal" graph-id="<?php echo e($data->id); ?>" class="btn btn-default show_graph" >
                                    <i class="fa3 fa-eye"></i>
                                    </button> 
                                </td>
                                <td class="key-decision">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="decisionCheck<?php echo e($data->id); ?>" class="chek" value="1" name="decisionmk[]" <?php if($data->decision_maker_check == 1): ?> checked <?php endif; ?>>
                                        <!-- <label class="custom-control-label" for="decisionCheck"></label> -->
                                    </div>
                                </td>
                                <td class="key-dec">
                                    <select name="decision_type" id="decisionType<?php echo e($data->id); ?>" class="form-control">
                                        <option disabled selected value>Select Option</option>
                                        <option value="bull" <?php if($data->decision_maker_type == 'bull'): ?>  selected <?php endif; ?>>Bull</option>
                                        <option value="fox" <?php if($data->decision_maker_type == 'fox'): ?>  selected <?php endif; ?>>Fox</option>
                                        <option value="owl" <?php if($data->decision_maker_type == 'owl'): ?>  selected <?php endif; ?>>Owl</option>
                                        <option value="mouse" <?php if($data->decision_maker_type == 'mouse'): ?>  selected <?php endif; ?>>Mouse</option>
                                    </select>
                                </td>
                                <td class="relation">
                                    <select name="rank" id="rank<?php echo e($data->id); ?>" class="form-control rank">
                                        <option disabled selected value>Select Option</option>
                                        <option value="1" <?php if($data->rank == 1): ?>  selected <?php endif; ?>>1</option>
                                        <option value="2" <?php if($data->rank == 2): ?>  selected <?php endif; ?>>2</option>
                                        <option value="3" <?php if($data->rank == 3): ?>  selected <?php endif; ?>>3</option>
                                        <option value="4" <?php if($data->rank == 4): ?>  selected <?php endif; ?>>4</option>
                                        <option value="5" <?php if($data->rank == 5): ?>  selected <?php endif; ?>>5</option>
                                    </select>
                                </td>
                                <td class="influenced">
                                    <select name="influence_by[]" id="influenceBy<?php echo e($data->id); ?>" onclick="makeDropDown(<?php echo e($data->id); ?>)" onchange="filterInfluenceByDropdown(<?php echo e($data->id); ?>)" class="form-control getUsers select2" multiple="multiple">
                                        <?php if(!empty($data->influence_by)): ?>
                                        <?php $sel = "selected"; $infarray = explode(",",$data->influence_by); ?>
                                        <?php $__currentLoopData = $infarray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($inf); ?>" selected="selected"><?php echo e($inf); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </td>
                                <td class="relation">
                                    <select name="relation_status" id="relationStatus<?php echo e($data->id); ?>" class="form-control">
                                        <option disabled selected value>Select Option</option>
                                        <option value="trust" <?php if($data->relation_status == 'trust'): ?>  selected <?php endif; ?>>Trust</option>
                                        <option value="cordial" <?php if($data->relation_status == 'cordial'): ?>  selected <?php endif; ?>>Cordail</option>
                                        <option value="unknown" <?php if($data->relation_status == 'unknown'): ?>  selected <?php endif; ?>>Unknown</option>
                                        <option value="skeptical" <?php if($data->relation_status == 'skeptical'): ?>  selected <?php endif; ?>>Skeptical</option>
                                        <option value="combative" <?php if($data->relation_status == 'combative'): ?>  selected <?php endif; ?>>Combative</option>
                                    </select>
                                </td>
                                <td class="text-center pdfIcons"><button class="removeButton RemoveComm"><i class="fa3 fa-times-circle"></i></button></td>
                            </tr>
                            <?php $x++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <tr class="row1" id="1">
                                <td>
                                    1<!-- <button class="addButton addComm"><i class="fa3 fa-plus-circle"></i></button> -->
                                </td>
                                <td class="name"><input type="text" class="form-control addInfluenceBy" id="whoComm1">    </td>
                                <td class="title"><input type="text" class="form-control" id="title1"> </td>
                                <!-- <td class="url"><input type="text" class="form-control get_personality" data-id="1" id="linkedin1"> </td> -->
                                <td class="personality name"><input type="text" class="form-control" id="personality1"> <button type="button" data-toggle="modal" graph-id="1" class="btn btn-default show_graph" >
                                    <i class="fa3 fa-eye"></i>
                                    </button>
                                </td>
                                <td class="key-decision">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class=" chek" id="decisionCheck1" value="1" name="decisionmk[]">
                                        <!--  <label class="custom-control-label" for="decisionCheck1"></label> -->
                                    </div>
                                </td>
                                <td class="key-dec">
                                    <select name="decision_type" id="decisionType1" class="form-control">
                                        <option disabled selected value>Select Option</option>
                                        <option value="bull">Bull</option>
                                        <option value="fox">Fox</option>
                                        <option value="owl">Owl</option>
                                        <option value="mouse">Mouse</option>
                                    </select>
                                </td>
                                <td class="relation">
                                    <select name="rank" id="rank1" class="form-control rank">
                                        <option disabled selected value>Select Option</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </td>
                                <td class="influenced">
                                    <select name="influence_by" id="influenceBy1" class="form-control getUsers select2" multiple="multiple">
                                        <option disabled selected value>Select Option</option>
                                    </select>
                                </td>
                                <td class="relation">
                                    <select name="relation_status" id="relationStatus1" class="form-control">
                                        <option disabled selected value>Select Option</option>
                                        <option value="trust">Trust</option>
                                        <option value="cordial">Cordail</option>
                                        <option value="unknown">Unknown</option>
                                        <option value="skeptical">Skeptical</option>
                                        <option value="combative">Combative</option>
                                    </select>
                                </td>
                                <td class="text-center pdfIcons"><button class="removeButton RemoveComm"><i class="fa3 fa-times-circle"></i></button></td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="messaging external">
                    <h4>external messaging</h4>
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-communication ">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" width="30" class="text-center pdfIcons"><a href="javascript:void(0);" style="font-size:18px;" title="Add More row"><span class="fa3 fa-plus-circle addExtMsg"></span></a></th>
                                    <th scope="col">message </th>
                                    <th scope="col">How to say it or do it </th>
                                    <th scope="col">Recipient</th>
                                    <th scope="col">By Whom</th>
                                    <th scope="col" >When</th>
                                    <th scope="col" width="30"></th>
                                </tr>
                            </thead>
                            <tbody id="extMsgTable">
                                <?php if(!$extMsg->isEmpty()): ?>
                                <?php $y=1; ?>
                                <?php $__currentLoopData = $extMsg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="row<?php echo e($data->id); ?>" id="<?php echo e($data->id); ?>">
                                    <td><?php echo e($y); ?></td>
                                    <td><input type="text" id="exMsg<?php echo e($data->id); ?>" class="form-control" value="<?php echo e($data->msg); ?>"></td>
                                    <td><input type="text" id="exHowSay<?php echo e($data->id); ?>" class="form-control" value="<?php echo e($data->how_to_say); ?>"></td>
                                    <td><input type="text" id="exrecpnt<?php echo e($data->id); ?>" class="form-control" value="<?php echo e($data->recipient); ?>"></td>
                                    <td><input type="text" id="exByWhom<?php echo e($data->id); ?>" class="form-control" value="<?php echo e($data->by_whom); ?>"></td>
                                    <td><input type="text" id="exWhen<?php echo e($data->id); ?>" class="form-control" value="<?php echo e($data->ext_when); ?>"></td>
                                    <td class="text-center pdfIcons"><button class="removeButton RemoveExtMsg"><i class="fa3 fa-times-circle"></i></button></td>
                                </tr>
                                <?php $y++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <tr class="row1" id="1">
                                    <td></td>
                                    <td><input type="text" id="exMsg1" class="form-control"></td>
                                    <td><input type="text" id="exHowSay1" class="form-control"></td>
                                    <td><input type="text" id="exrecpnt1" class="form-control"></td>
                                    <td><input type="text" id="exByWhom1" class="form-control"></td>
                                    <td><input type="text" id="exWhen1" class="form-control"></td>
                                    <td class="text-center pdfIcons"><button class="removeButton RemoveExtMsg"><i class="fa3 fa-times-circle"></i></button></td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="messaging external">
                    <h4>internal messaging</h4>
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-communication ">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" width="30" class="text-center pdfIcons"><a href="javascript:void(0);" style="font-size:18px;" title="Add More row"><span class="fa3 fa-plus-circle addIntMsg"></span></a></th>
                                    <th scope="col">message </th>
                                    <th scope="col">How to say it or do it </th>
                                    <th scope="col">Recipient</th>
                                    <th scope="col">By Whom</th>
                                    <th scope="col" >When</th>
                                    <th scope="col" width="30"></th>
                                </tr>
                            </thead>
                            <tbody id="intMsgTable">
                                <?php if(!$intMsg->isEmpty()): ?>
                                <?php $z=1; ?>
                                <?php $__currentLoopData = $intMsg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="row<?php echo e($data->id); ?>" id="<?php echo e($data->id); ?>">
                                    <td><?php echo e($z); ?></td>
                                    <td><input type="text" id="intMsg<?php echo e($data->id); ?>" class="form-control" value="<?php echo e($data->msg); ?>"></td>
                                    <td><input type="text" id="intHowSay<?php echo e($data->id); ?>" class="form-control" value="<?php echo e($data->how_to_say); ?>"></td>
                                    <td><input type="text" id="intrecpnt<?php echo e($data->id); ?>" class="form-control" value="<?php echo e($data->recipient); ?>"></td>
                                    <td><input type="text" id="intByWhom<?php echo e($data->id); ?>" class="form-control" value="<?php echo e($data->by_whom); ?>"></td>
                                    <td><input type="text" id="intWhen<?php echo e($data->id); ?>" class="form-control" value="<?php echo e($data->int_when); ?>"></td>
                                    <td class="text-center pdfIcons"><button class="removeButton RemoveIntMsg"><i class="fa3 fa-times-circle"></i></button></td>
                                </tr>
                                <?php $z++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <tr class="row1" id="1">
                                    <td class="text-center pdfIcons"><button class="addButton addIntMsg"><i class="fa3 fa-plus-circle"></i></button></td>
                                    <td><input type="text" id="intMsg1" class="form-control"></td>
                                    <td><input type="text" id="intHowSay1" class="form-control"></td>
                                    <td><input type="text" id="intrecpnt1" class="form-control"></td>
                                    <td><input type="text" id="intByWhom1" class="form-control"></td>
                                    <td><input type="text" id="intWhen1" class="form-control"></td>
                                    <td class="text-center pdfIcons"><button class="removeButton RemoveIntMsg"><i class="fa3 fa-times-circle"></i></button></td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="messaging external">
                      <h4>Questions</h4>
                      <div class="table-responsive-sm">
                        <table class="table table-bordered table-communication ">
                          <thead class="thead-light">
                            <tr>
                               <th scope="col" width="5%"><a href="javascript:void(0);" style="font-size:18px;" title="Add More row"><span class="fas fa-plus-circle ques"></span></a></th>
                                            <th scope="col" width="35%">Questions </th>
                                            <th scope="col" width="15%">Who To Ask</th>
                                            <th scope="col" width="45%">Why Are You Asking It</th>
                                            <th scope="col" ></th>
                            </tr>
                          </thead>
                          <tbody id="queTable">
                            <?php if(!$ques->isEmpty()): ?>
                            <?php $z=1; ?>
                            <?php $__currentLoopData = $ques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="row<?php echo e($data->id); ?>" id="<?php echo e($data->id); ?>">
                              <td><?php echo e($z); ?></td>
                              <td><div id="ques<?php echo e($data->id); ?>" class="form-control"><?php echo e($data->ques); ?></div></td>
                              <td><div id="who_to_ask<?php echo e($data->id); ?>" class="form-control"><?php echo e($data->who_to_ask); ?></div></td>
                              <td><div id="how_you_ask_it<?php echo e($data->id); ?>" class="form-control"><?php echo e($data->how_you_ask_it); ?></div></td>
                            
                              <td><button class="removeButton RemoveQues"><i class="fa3 fa-times-circle"></i></button></td>
                            </tr>
                            <?php $z++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <tr class="row1" id="1">
                              <td>1</td>
                              <td><div id="ques1" class="form-control"></div></td>
                              <td><div id="who_to_ask1" class="form-control"></div></td>
                              <td><div id="how_you_ask_it1" class="form-control"></div></td>
                              
                              <td><button class="removeButton RemoveQues"><i class="fa3 fa-times-circle"></i></button></td>
                            </tr>
                            <?php endif; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<div class="row time-pdf pdf_down" >
    <div class="logo-hidden col-md-12 col-lg-12 col-sm-12" style="display: none;">
        <img src="<?php echo e(asset('/paper/img/')); ?>/brand_logo.jpg">
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="stepContainer">
                <div class="stepHeader">
                    <h3>time</h3>
                </div>
                <div class="stepTable">
                    <div class="dateSelect d-flex justify-content-between align-items-center my-2">
                        <div id="start_end_date" class=" d-flex">
                            <div class="form-group mr-2">
                                <label for="">Start Date</label>
                                <input type="date" class="form-control"  value="<?php if(!empty($both_time)): ?><?php echo e($both_time[0]['start_date']); ?><?php endif; ?>" name="" id="start_date">
                            </div>
                            <div class="form-group ">
                                <label for="">End Date</label>
                                <input type="date" class="form-control" name="" value="<?php if(!empty($both_time)): ?><?php echo e($both_time[0]['end_date']); ?><?php endif; ?>" id="end_date">
                            </div>
                        </div>
                        <a href="#" class="btn btn-link showGraph" data-toggle="modal" data-target="#timeGraph">View Graph</a>
                    </div>
                    <table class="table table-bordered table-time table-responsive-sm" id="tb">
                        <thead style="background: #F1B91D">
                            <tr>
                                <th scope="col" colspan="2"><div class="positionedicons"><a href="javascript:void(0);" style="background-color:#F1B91D" class="addButton addTimeButton mr-1" title="Add More Event"><span class="fa3 fa-plus-circle" ></span></a> key event</div></th>
                                <th scope="col">date </th>
                                <th scope="col">who </th>
                                <th scope="col" colspan="2">what</th>
                            </tr>
                        </thead>
                        <tbody id="TimeTable">
                            <?php if($timeevent_data->isEmpty()): ?>
                            <tr class="row1" id="1">
                                <td>1</td>
                                <td id="select_event1" style="background: #F1B91D">
                                    <div class="select">
                                        <span class="select_icon"><img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/dropdownicon.svg" alt=""></span>
                                        <select name="" id="1"  class="form-control select_key_event">
                                            <option disabled selected value>Select Event</option>
                                            <option value="face_to_face">Face to Face</option>
                                            <option value="email">Email</option>
                                            <option value="phone_call">Phone Call</option>
                                            <option value="others">Other</option>
                                        </select>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="" id="date1"></td>
                                <td><input type="text" class="form-control" name="" id="who1"></td>
                                <td><input type="text" class="form-control" name="" id="what1"></td>
                                <td width="30" class="text-center pdfIcons"><a href='javascript:void(0);' title="Remove Event"  id='removeButton'><span class="fa3 fa-times-circle"></span></a></td>
                            </tr>
                            <?php else: ?>
                            <?php $m=1; ?>
                            <?php $__currentLoopData = $timeevent_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="<?php echo e($data->id); ?>" class="row<?php echo e($data->id); ?>">
                                <td><?php echo e($m); ?></td>
                                <?php if($data->event_type == 'face_to_face'): ?>
                                <td class="f2f" id="select_event<?php echo e($data->id); ?>">
                                    <?php elseif($data->event_type == 'email'): ?>
                                <td class="email-td" id="select_event<?php echo e($data->id); ?>">
                                    <?php elseif($data->event_type == 'phone_call'): ?>
                                <td class="phone-call" id="select_event<?php echo e($data->id); ?>">
                                    <?php else: ?>
                                <td class="others-event" id="select_event<?php echo e($data->id); ?>">
                                    <?php endif; ?>
                                    <div class="select">
                                        <span class="select_icon"><img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/dropdownicon.svg" alt=""></span>
                                        <select name="" id="<?php echo e($data->id); ?>"  class="form-control select_key_event">
                                            <option disabled selected value>Select Event</option>
                                            <option value="face_to_face" <?php if($data->event_type=='face_to_face'): ?> selected='selected' <?php endif; ?>>Face to Face</option>
                                            <option value="email" <?php if($data->event_type=='email'): ?> selected='selected' <?php endif; ?>>Email</option>
                                            <option value="phone_call" <?php if($data->event_type=='phone_call'): ?> selected='selected' <?php endif; ?>>Phone Call</option>
                                            <option value="others" <?php if($data->event_type=='others'): ?> selected='selected' <?php endif; ?>>Other</option>
                                        </select>
                                    </div>
                                </td>
                                <td><div class="form-control py-2"><?php echo e($data->date); ?></div>
                                  <!-- <input type="date" value="<?php echo e($data->date); ?>" class="form-control" name="" id="date<?php echo e($data->id); ?>"></td> -->
                                <td><div class="form-control py-2"><?php echo e($data->who); ?></div>
                                  <!-- <input type="text" value="<?php echo e($data->who); ?>" class="form-control" name="" id="who<?php echo e($data->id); ?>"> -->
                                </td>
                                <td><div class="form-control py-2"><?php echo e($data->what); ?></div>
                                  <!-- <input type="text" value="<?php echo e($data->what); ?>" class="form-control" name="" id="what<?php echo e($data->id); ?>"> -->
                                </td>
                                <td class="text-center pdfIcons"><a href='javascript:void(0);' title="Remove Event"  id='removeButton'><span class="fa3 fa-times-circle"></span></a></td>
                            </tr>
                            <?php $m++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <!-- The Modal -->
                <div class="modal fade" id="timeGraph">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Time Graph</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <section>
                                    <div class="timeline">
                                    </div>
                                </section>
                            </div>
                            <!-- Modal footer -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row risk-pdf pdf_down" >
    <div class="logo-hidden col-md-12 col-lg-12 col-sm-12" style="display: none;">
        <img src="<?php echo e(asset('/paper/img/')); ?>/brand_logo.jpg">
    </div>
    <div class="col-md-12">
        <div class="stepContainer">
            <div class="stepHeader">
                <h3>risk analysis</h3>
            </div>
            <div class="stepTable table-risk add_risk">
                <?php $j=1; ?>
                <?php if(!$Risks->isEmpty()): ?>
                <?php $__currentLoopData = $Risks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $risk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="tableContainer risk_table" id="risktable_<?php echo e($j); ?>">
                    <?php if($j==1): ?><button class="addButton"><i class="fa3 fa-plus-circle clone_risk"></i></button><?php endif; ?>
                    <?php if($j>1): ?>
                    <button class="removeButton removeRiskButton" div-id="<?php echo e($j); ?>"><i class="fa3 fa-times-circle"></i></button>
                    <?php endif; ?>
                    <table class="table table-bordered  table-responsive-sm">
                        <thead class="thead-orange">
                            <tr>
                                <th scope="col" >risk</th>
                                <th scope="col">probability % </th>
                                <th scope="col" class="text-center">impact on business </th>
                                <th scope="col" class="text-center">impact score</th>
                                <th scope="col" >risk level</th>
                            </tr>
                        </thead>
                        <thead >
                            <tr>
                                <th scope="col" >risk <?php echo e($j); ?></th>
                                <th scope="col"><input type="text" class="form-control riskprobability probablty_<?php echo e($j); ?>" name="riskprobability[]" data-id="1" value="<?php if(!empty($Risks)): ?><?php echo e($risk->riskprobability); ?><?php endif; ?>"> </th>
                                <th scope="col"><input type="text" class="form-control text-center riskbusinessimpact impact_<?php echo e($j); ?>" name="riskbusinessimpact[]" data-id="1" value="<?php if(!empty($Risks)): ?><?php echo e($risk->riskbusinessimpact); ?><?php endif; ?>"> </th>
                                <th scope="col" ><input type="text" class="form-control text-center riskimpactscore score_<?php echo e($j); ?>" name="riskimpactscore[]" data-id="1" value="<?php if(!empty($Risks)): ?><?php echo e($risk->riskimpactscore); ?><?php endif; ?>"></th>
                                <th class=" risk_lavel_<?php echo e($j); ?> <?php if(!empty($Risks) && $risk->riskimpactscore > '50'): ?> highImpact <?php else: ?> lowImpact <?php endif; ?>" ><?php if(!empty($Risks) && $risk->riskimpactscore > '50'): ?> High <?php else: ?> Low <?php endif; ?>
                                    <input type="hidden" name="risk_id[]" class="risk_id" value="<?php if(!empty($Risks)): ?> <?php echo e($risk->id); ?> <?php endif; ?>">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>  Risk Description</td>
                                <td colspan="4"><div class="form-control riskdescription py-2"><?php if(!empty($Risks)): ?> <?php echo e($risk->riskdescription); ?> <?php endif; ?></div>
                                  <!-- <input type="text" class="form-control riskdescription" name="riskdescription[]" value="<?php if(!empty($Risks)): ?> <?php echo e($risk->riskdescription); ?> <?php endif; ?>"> -->
                                </td>
                            </tr>
                            <tr>
                                <td>preventive Description</td>
                                <td colspan="4"><div class="form-control riskdescription py-2"><?php if(!empty($Risks)): ?> <?php echo e($risk->riskpreventive); ?> <?php endif; ?></div>
                                 <!--  <input type="text" class="form-control riskpreventive" name="riskpreventive[]" value="<?php if(!empty($Risks)): ?> <?php echo e($risk->riskpreventive); ?> <?php endif; ?>"> -->
                                </td>
                            </tr>
                            <tr>
                                <td>mitigation action</td>
                                <td colspan="4"><div class="form-control riskdescription py-2"><?php if(!empty($Risks)): ?> <?php echo e($risk->riskmitigation); ?> <?php endif; ?></div>
                                  <!-- <input type="text" class="form-control riskmitigation" name="riskmitigation[]" value="<?php if(!empty($Risks)): ?> <?php echo e($risk->riskmitigation); ?> <?php endif; ?>"> -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php $j++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <div class="tableContainer risk_table" id="risktable_1">
                    <button class="addButton"><i class="fa3 fa-plus-circle clone_risk"></i></button>
                    <table class="table table-bordered  table-responsive-sm">
                        <thead class="thead-orange">
                            <tr>
                                <th scope="col" >risk</th>
                                <th scope="col">probability % </th>
                                <th scope="col" class="text-center">impact on business </th>
                                <th scope="col" class="text-center">impact score</th>
                                <th scope="col" >risk level</th>
                            </tr>
                        </thead>
                        <thead >
                            <tr>
                                <th scope="col" >risk 1</th>
                                <th scope="col"><input type="text" class="form-control riskprobability probablty_1" name="riskprobability[]" data-id="1"> </th>
                                <th scope="col"><input type="text" class="form-control text-center riskbusinessimpact impact_1" name="riskbusinessimpact[]" data-id="1"> </th>
                                <th scope="col" ><input type="text" class="form-control text-center riskimpactscore score_1" name="riskimpactscore[]" data-id="1"></th>
                                <th class=" risk_lavel_1" > </th>
                                <input type="hidden" name="risk_id[]" class="first_rkid">
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>  Risk Description</td>
                                <td colspan="4"><input type="text" class="form-control riskdescription" name="riskdescription[]"></td>
                            </tr>
                            <tr>
                                <td>preventive Description</td>
                                <td colspan="4"><input type="text" class="form-control riskpreventive" name="riskpreventive[]"></td>
                            </tr>
                            <tr>
                                <td>mitigation action</td>
                                <td colspan="4"><input type="text" class="form-control riskmitigation" name="riskmitigation[]"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <span class="risk_error error"></span>
        </div>
    </div>
</div>
<div class="row nego-pdf pdf_down">
    <div class="logo-hidden col-md-12 col-lg-12 col-sm-12" style="display: none;">
        <img src="<?php echo e(asset('/paper/img/')); ?>/brand_logo.jpg">
    </div>
    <div class="col-md-12">
        <div class="stepContainer">
            <div class="stepHeader ">
                <h3>Negotiate</h3>
                <!--  <a href="#" class="viewSummary showGraph" data-toggle="modal" data-target="#summaryDialog"> <img src="<?php echo e(asset('uploads/images/detail_page_icons')); ?>/dashboard.svg" alt=""> View Summary</a> -->
            </div>
            <?php if(!$Negotiates->isEmpty()): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="stepTable  table-negotiation clone_negotiate_left">
                        <?php $k=1; ?>
                        <?php $__currentLoopData = $Negotiates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $negotiate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($k%2===1): ?>
                        <div class="tableContainer negotiate_count" id="negotiation_<?php echo e($k); ?>">
                            <?php if($k==1): ?>
                            <button class="addButton text-center pdfIcons"><i class="fa3 fa-plus-circle add_negotiate"></i></button>
                            <?php endif; ?>
                            <?php if($k>1): ?>
                            <button class="removeButton"><i class="fa3 fa-times-circle remove_negotiate" div-id="<?php echo e($k); ?>"></i></button>
                            <?php endif; ?>
                            <table class="table table-bordered  table-responsive-sm">
                                <thead class="thead-orange">
                                    <th colspan="2">offer <?php echo e($k); ?></th>
                                </thead>
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" >On The Condition That (Get)</th>
                                        <th scope="col" >We Could Agree To (Give)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control take_negotiate" name="take_negotiate1[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->take1); ?><?php endif; ?>"></td>
                                        <td><input type="text" class="form-control give_negotiate" name="give_negotiate1[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->give1); ?><?php endif; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control take_negotiate" name="take_negotiate2[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->take2); ?><?php endif; ?>"></td>
                                        <td><input type="text" class="form-control give_negotiate" name="give_negotiate2[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->give2); ?><?php endif; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control take_negotiate" name="take_negotiate3[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->take3); ?><?php endif; ?>"></td>
                                        <td><input type="text" class="form-control give_negotiate" name="give_negotiate3[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->give3); ?><?php endif; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control take_negotiate" name="take_negotiate4[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->take4); ?><?php endif; ?>"></td>
                                        <td><input type="text" class="form-control give_negotiate" name="give_negotiate4[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->give4); ?><?php endif; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control take_negotiate" name="take_negotiate5[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->take5); ?><?php endif; ?>"></td>
                                        <td><input type="text" class="form-control give_negotiate" name="give_negotiate5[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->take5); ?><?php endif; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control take_negotiate" name="take_negotiate6[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->take6); ?><?php endif; ?>"></td>
                                        <td><input type="text" class="form-control give_negotiate" name="give_negotiate6[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->give6); ?><?php endif; ?>"></td>
                                        <input type="hidden" name="negotiate_id[]" class="negotiate_id" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->id); ?><?php endif; ?>">
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php endif; ?> 
                        <?php $k++; ?>   
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                  
                    </div>
                    <span class="negotiation_error error"></span>
                </div>
                <div class="col-md-6">
                    <div class="stepTable  table-negotiation clone_negotiate_right">
                        <?php $l=1; ?>
                        <?php $__currentLoopData = $Negotiates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $negotiate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($l%2===0): ?>
                        <div class="tableContainer negotiate_count" id="negotiation_<?php echo e($l); ?>">
                            <!-- <button class="addButton"><i class="fa3 fa-plus-circle add_negotiate"></i></button> -->
                            <button class="removeButton"><i class="fa3 fa-times-circle remove_negotiate" div-id="<?php echo e($l); ?>"></i></button>
                            <table class="table table-bordered  table-responsive-sm">
                                <thead class="thead-orange">
                                    <th colspan="2">offer <?php echo e($l); ?></th>
                                </thead>
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" >On The Condition That (Get)</th>
                                        <th scope="col" >We Could Agree To (Give)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control take_negotiate" name="take_negotiate1[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->take1); ?><?php endif; ?>"></td>
                                        <td><input type="text" class="form-control give_negotiate" name="give_negotiate1[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->give1); ?><?php endif; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control take_negotiate" name="take_negotiate2[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->take2); ?><?php endif; ?>"></td>
                                        <td><input type="text" class="form-control give_negotiate" name="give_negotiate2[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->give2); ?><?php endif; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control take_negotiate" name="take_negotiate3[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->take3); ?><?php endif; ?>"></td>
                                        <td><input type="text" class="form-control give_negotiate" name="give_negotiate3[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->give3); ?><?php endif; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control take_negotiate" name="take_negotiate4[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->take4); ?><?php endif; ?>"></td>
                                        <td><input type="text" class="form-control give_negotiate" name="give_negotiate4[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->give4); ?><?php endif; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control take_negotiate" name="take_negotiate5[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->take5); ?><?php endif; ?>"></td>
                                        <td><input type="text" class="form-control give_negotiate" name="give_negotiate5[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->take5); ?><?php endif; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control take_negotiate" name="take_negotiate6[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->take6); ?><?php endif; ?>"></td>
                                        <td><input type="text" class="form-control give_negotiate" name="give_negotiate6[]" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->give6); ?><?php endif; ?>"></td>
                                    </tr>
                                    <input type="hidden" name="negotiate_id[]" class="negotiate_id" value="<?php if(!$Negotiates->isEmpty()): ?><?php echo e($negotiate->id); ?><?php endif; ?>">
                                </tbody>
                            </table>
                        </div>
                        <?php endif; ?> 
                        <?php $l++; ?>   
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="stepTable  table-negotiation clone_negotiate_left">
                        <div class="tableContainer negotiate_count" id="negotiation_1">
                            <button class="addButton"><i class="fa3 fa-plus-circle add_negotiate"></i></button>
                            <button class="removeButton"><i class="fa3 fa-times-circle remove_negotiate"></i></button>
                            <table class="table table-bordered  table-responsive-sm">
                                <thead class="thead-orange">
                                    <th colspan="2">offer 1</th>
                                </thead>
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" >On The Condition That (Get)</th>
                                        <th scope="col" >We Could Agree To (Give)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control take_negotiate" name="take_negotiate1[]"></td>
                                        <td><input type="text" class="form-control give_negotiate" name="give_negotiate1[]"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control take_negotiate" name="take_negotiate2[]"></td>
                                        <td><input type="text" class="form-control give_negotiate" name="give_negotiate2[]"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control take_negotiate" name="take_negotiate3[]"></td>
                                        <td><input type="text" class="form-control give_negotiate" name="give_negotiate3[]"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control take_negotiate" name="take_negotiate4[]"></td>
                                        <td><input type="text" class="form-control give_negotiate" name="give_negotiate4[]"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control take_negotiate" name="take_negotiate5[]"></td>
                                        <td><input type="text" class="form-control give_negotiate" name="give_negotiate5[]"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control take_negotiate" name="take_negotiate6[]"></td>
                                        <td><input type="text" class="form-control give_negotiate" name="give_negotiate6[]"></td>
                                    </tr>
                                    <input type="hidden" name="negotiate_id[]" class="first_ngid">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <span class="negotiation_error error"></span>
                </div>
                <div class="col-md-6">
                    <div class="stepTable  table-negotiation clone_negotiate_right">
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="stepHeader ">
                <h3>offer tracker</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="stepTable  table-execute">
                        <div class="tableContainer mb-4">
                            <div class="table-responsive" id="removeTableRes">
                                <table class="table table-bordered" id="yourDataTable">
                                    <thead class="thead-orange" id="yourTableHeaderOuter">
                                        <?php if($your_offer->isNotEmpty()): ?>
                                        <th colspan="<?php echo e($your_offer_show['offer_length']+2); ?>">Yours</th>
                                        <?php else: ?>
                                        <th colspan="3">yours</th>
                                        <?php endif; ?>
                                    </thead>
                                    <thead class="thead-light" id="yourTableHeaderInner">
                                        <tr id="yourTableHeader">
                                            <th scope="col" >Variable</th>
                                            <?php if($your_offer->isEmpty()): ?>
                                            <th scope="col" class="text-center text-nowrap offer-td"><a class="addYourMoreOffer"><span class="fa3 fa-plus-circle f12 mr-1"></span></a>Offer 1<a class="removeYourMoreOffer"><span class="fa3 fa-times-circle f12 ml-1"></span></a></th>
                                            <?php else: ?>
                                            <?php for($num=1;$num<=$your_offer_show['offer_length'];$num++): ?>
                                            <th scope="col" class="text-center text-nowrap offer-td"><a class="addYourMoreOffer"><span class="fa3 fa-plus-circle f12 mr-1"></span></a>Offer <?php echo e($num); ?><a class="removeYourMoreOffer"><span class="fa3 fa-times-circle f12 ml-1"></span></a></th>
                                            <?php endfor; ?>
                                            <?php endif; ?>
                                            <th>aligned</th>
                                        </tr>
                                    </thead>
                                    <tbody id="yourTableBody">
                                        <?php if($your_offer->isEmpty()): ?>
                                        <tr class="firstRow1" id="">
                                            <td><a href="javascript:void(0);" class="btn addOfferRow" title="Add More Offer"><span class="fa3 fa-plus-circle f12 mr-1"></span></a><a href='javascript:void(0);' class="btn removeOfferRow" title="Remove Offer"><span class="fa3 fa-times-circle f12"></span></a><input type="text" class="form-control form-control-sm" id="your_variable1"></td>
                                            <td><input type="text" id="your_offer1" class="form-control your_offer"></td>
                                            <td><input type="text" id="your_aligned1" class="form-control"></td>
                                        </tr>
                                        <?php else: ?>
                                        <?php $__currentLoopData = $your_offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $my_offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="firstRow<?php echo e($my_offer->id); ?>" id="<?php echo e($my_offer->id); ?>">
                                            <td><a href="javascript:void(0);" class="btn addOfferRow" title="Add More Offer"><span class="fa3 fa-plus-circle f12 mr-1"></span></a><a href='javascript:void(0);' class="btn removeOfferRow" title="Remove Offer"><span class="fa3 fa-times-circle f12"></span></a><input type="text" class="form-control form-control-sm" id="your_variable<?php echo e($my_offer->id); ?>" value="<?php echo e($my_offer->variables); ?>"></td>
                                            <?php $__currentLoopData = json_decode($my_offer->offer); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td><input type="text" id="your_offer<?php echo e($my_offer->id); ?>" class="form-control your_offer" value="<?php echo e($data); ?>"></td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <td><input type="text" id="your_aligned<?php echo e($my_offer->id); ?>" class="form-control" value="<?php echo e($my_offer->aligned); ?>"></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="stepTable  table-execute">
                        <!-- table-execute-next -->
                        <div class="tableContainer mb-4">
                            <div class="tableContainer mb-4">
                                <div class="table-responsive" id="removeTheirTableRes">
                                    <table class="table table-bordered" id="theirDataTable">
                                        <thead class="thead-orange" id="theirTableHeaderOuter">
                                            <?php if($their_offer->isEmpty()): ?>
                                            <th colspan="3">Theirs</th>
                                            <?php else: ?>
                                            <th class="text-nowrap" colspan="<?php echo e($their_offer_show['offer_length']+2); ?>">Theirs</th>
                                            <?php endif; ?>
                                        </thead>
                                        <thead class="thead-light" id="theirTableHeaderInner">
                                            <tr id="theirTableHeader">
                                                <th scope="col" >Variable</th>
                                                <?php if($their_offer->isEmpty()): ?>
                                                <th scope="col" class="text-center text-nowrap offer-td"><a class="addTheirMoreOffer"><span class="fa3 fa-plus-circle f12 mr-1"></span></a>Offer 1<a class="removeTheirMoreOffer"><span class="fa3 fa-times-circle f12 ml-1"></span></a></th>
                                                <?php else: ?>
                                                <?php for($num=1;$num<=$their_offer_show['offer_length'];$num++): ?>
                                                <th scope="col" class="text-center text-nowrap offer-td"><a class="addTheirMoreOffer"><span class="fa3 fa-plus-circle f12 mr-1"></span></a>Offer <?php echo e($num); ?><a class="removeTheirMoreOffer"><span class="fa3 fa-times-circle f12 ml-1"></span></a></th>
                                                <?php endfor; ?>
                                                <?php endif; ?>
                                                <th>aligned</th>
                                            </tr>
                                        </thead>
                                        <tbody id="theirTableBody">
                                            <?php if($their_offer->isEmpty()): ?>
                                            <tr class="firstTheirRow1"id="">
                                                <td><a href="javascript:void(0);" class="btn addTheirOfferRow" title="Add More Offer"><span class="fa3 fa-plus-circle f12 mr-1"></span></a><a href='javascript:void(0);' class="btn removeTheirOfferRow" title="Remove Offer"><span class="fa3 fa-times-circle f12"></span></a><input id="their_variable1" type="text" class="form-control form-control-sm"></td>
                                                <td><input type="text" id="their_offer1" class="form-control their_offer"></td>
                                                <td><input type="text" id="their_aligned1" class="form-control"></td>
                                            </tr>
                                            <?php else: ?>
                                            <?php $__currentLoopData = $their_offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="firstTheirRow<?php echo e($offer_data->id); ?>"id="<?php echo e($offer_data->id); ?>">
                                                <td><a href="javascript:void(0);" class="btn addTheirOfferRow" title="Add More Offer"><span class="fa3 fa-plus-circle f12 mr-1"></span></a><a href='javascript:void(0);' class="btn removeTheirOfferRow" title="Remove Offer"><span class="fa3 fa-times-circle f12"></span></a><input id="their_variable<?php echo e($offer_data->id); ?>" value="<?php echo e($offer_data->variables); ?>" type="text" class="form-control form-control-sm"></td>
                                                <?php $__currentLoopData = json_decode($offer_data->offer); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <td><input type="text" id="their_offer<?php echo e($offer_data->id); ?>" class="form-control their_offer" value="<?php echo e($data); ?>"></td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <td><input type="text" id="their_aligned<?php echo e($offer_data->id); ?>" class="form-control" value="<?php echo e($offer_data->aligned); ?>"></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row exe-pdf pdf_down" >
    <div class="logo-hidden col-md-12 col-lg-12 col-sm-12" style="display: none;">
        <img src="<?php echo e(asset('/paper/img/')); ?>/brand_logo.jpg">
    </div>
    <div class="col-md-12">
        <div class="stepContainer">
            <div class="row">
                <div class="col-md-6">
                    <div class="stepTable  table-execute">
                        <h3 class="mb-3">Execute</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered  ">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" >Who</th>
                                        <th scope="col" >What</th>
                                        <th>When</th>
                                    </tr>
                                </thead>
                                <tbody id="stepsTableBody">
                                    <?php if($steps_offer->isEmpty()): ?>
                                    <tr id="" class="step1">
                                        <td><a href="javascript:void(0);" class="btn addStepsRow" title="Add More Step"><span class="fa3 fa-plus-circle f12 mr-1"></span></a><a href='javascript:void(0);' class="btn removeStepsRow" title="Remove Step"><span class="fa3 fa-times-circle f12"></span></a><input type="text" class="form-control who1"></td>
                                        <td><input type="text" class="form-control what1"></td>
                                        <td><input type="text" class="form-control when1"></td>
                                    </tr>
                                    <?php else: ?>
                                    <?php $__currentLoopData = $steps_offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="<?php echo e($data->id); ?>" class="step<?php echo e($data->id); ?>">
                                        <td><a href="javascript:void(0);" class="btn addStepsRow" title="Add More Step"><span class="fa3 fa-plus-circle f12 mr-1"></span></a><a href='javascript:void(0);' class="btn removeStepsRow" title="Remove Step"><span class="fa3 fa-times-circle f12"></span></a><input type="text" class="form-control who<?php echo e($data->id); ?>" value="<?php echo e($data->who); ?>"></td>
                                        <td><input type="text" class="form-control what<?php echo e($data->id); ?>" value="<?php echo e($data->what); ?>"></td>
                                        <td><input type="text" class="form-control when<?php echo e($data->id); ?>" value="<?php echo e($data->when); ?>"></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>

</section>
 


            <?php echo $__env->make('pages.js.planning_tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>

  $(document).ready(function() {

// var HTML_Width = $(".pdf_down").width();
//  var HTML_Height = $(".pdf_down").height();
//  var top_left_margin = 15;
//  var PDF_Width = HTML_Width+(top_left_margin*2);
//  var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
//  var canvas_image_width = HTML_Width;
//  var canvas_image_height = HTML_Height;
 
//  var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
 
//  setTimeout(function(){
//  html2canvas($(".pdf_down")[0],{allowTaint:true}).then(function(canvas) {
//  canvas.getContext('2d');
 
//  console.log(canvas.height+"  "+canvas.width);
 
 
//  var imgData = canvas.toDataURL("image/jpeg", 1.0);
//  var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
//      pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
 
 
//  for (var i = 1; i <= totalPDFPages; i++) { 
//  pdf.addPage(PDF_Width, PDF_Height);
//  pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
//  }
      
//       pdf.save("Entire-plan.pdf");
//     });
//       }, 1500);
//  setTimeout(function(){
//       window.location.replace("<?php echo e(route('objectives')); ?>/<?php echo e($workflow_id); ?>");

//   }, 3000);

  

   kendo.drawing.drawDOM("#allplans", {
          forcePageBreak: ".pdf_down",
          paperSize: "A3",
          margin: "0cm",
          scale: 0.6,
          height:500,
          multiPage: true
        }).then(function(group){
          kendo.drawing.pdf.saveAs(group, "Entire-plan.pdf");
        });

  setTimeout(function(){
       window.location.replace("<?php echo e(route('objectives')); ?>/<?php echo e($workflow_id); ?>");

   }, 3000);
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', [
'class' => '',
'elementActive' => 'dashboard'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/pages/all_plans.blade.php ENDPATH**/ ?>
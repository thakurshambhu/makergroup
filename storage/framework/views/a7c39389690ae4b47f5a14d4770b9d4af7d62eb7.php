  <?php //echo $id;die;?> 


<script src="<?php echo e(asset('js/highcharts.js')); ?>"></script>
<script src="<?php echo e(asset('js/exporting.js')); ?>"></script>
<script src="<?php echo e(asset('js/series-label.js')); ?>"></script>
<script src="<?php echo e(asset('js/offline-exporting.js')); ?>"></script>
<script src="<?php echo e(asset('js/export-data.js')); ?>"></script>
<script src="<?php echo e(asset('js/drilldown.js')); ?>"></script>

   <style>
       .card.card-stats.clickable:hover {
     box-shadow: -10px 11px 15px 10px rgba(74, 74, 74, 0.41);

}
   </style>  
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
<?php if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 ): ?>
    <div class="content">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-single-02 text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Total Users</p>
                                    <p class="card-title"><?php echo e($user_count); ?>

                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-money-coins text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Toatl Revenue</p>
                                    <p class="card-title">$ 1,345
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-vector text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Rounds Played</p>
                                    <p class="card-title"><?php echo e($rounds); ?><p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
             <?php if(auth()->user()->planning_tools == "1"): ?>
            <a href="<?php echo e(route('editworkflow')); ?>" style="text-decoration: none;">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats clickable">
                    <div class="card-body ">
                        <div class="row">
                         
                            <div class="col-6 col-md-12 text-center">
                                <div class="numbers">
                                    <p class="card-category">Tools</p>
                                    <p class="card-title">
                                        <p>
                                </div>
                            </div>
                          
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-vector text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo e(route('editworkflow')); ?>" style="text-decoration:none;">
                    <div class="card-footer ">
                        <hr>
                        <div class="stats"> 
                            <i class="fa fa-clock-o"></i> The Maker Framework
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            </a>
            <?php else: ?>
            <a href="#" style="text-decoration: none;">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats grayout">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-2 col-md-2"></div>
                            <div class="col-6 col-md-6">
                                <div class="numbers">
                                    <p class="card-category">Tools</p>
                                    <p class="card-title">
                                        <p>
                                </div>
                            </div>
                            <div class="col-4 col-md-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-vector text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" style="text-decoration:none;">
                    <div class="card-footer ">
                        <hr>
                        <div class="stats"> 
                            <i class="fa fa-clock-o"></i> The Maker Framework
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            </a>
        <?php endif; ?>
        </div>
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Users Behavior</h5>
                        <p class="card-category">Workshop performance</p>
                    </div>
                    <div class="card-body ">
                        <canvas id=chartHours width="400" height="100" style="position: relative;"></canvas>

                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> Updated 3 minutes ago
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <?php endif; ?>

    <?php if(auth()->user()->role_id == 3): ?>
         <div class="content">
        <div class="row">
            <?php if(Auth::user()->is_profile_complete == 1 || auth()->user()->preworkshop_survey == "0"): ?>
            <a href="#" style="text-decoration:none">
             <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats grayout">
                    <div class="card-body">
                              <div class="row">
             
                            <div class="col-8 col-md-12 text-center">
                                <div class="numbers">
                                    <p class="card-category">Pre Workshop Survey</p>
                                    <p class="card-title">
                                        <p>
                                </div>
                            </div>
                          
                        </div>
                    <!-- <div class="card-body "> -->
                        <div class="row justify-content-center">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-chart-bar-32 text-warning"></i>
                                </div>
                            </div>
                        </div>
                        
                    <!-- </div> -->
                    <a href="#" style="text-decoration:none">
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="#" style="text-decoration: none; color: gray"> <i class="fa fa-refresh"></i> Complete Survey</a>
                        </div>
                    </div>
                </a>
                    </div>
              
                </div>
            </div>
            </a>
            <?php else: ?>
            <!-- <?php if(auth()->user()->preworkshop_survey == "1"): ?> -->
            <a href="<?php echo e(route('getPreWorkshopSurvey')); ?>" style="text-decoration:none">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats clickable">
                    <div class="card-body ">
                         <div class="row">
                            
                            <div class="col-8 col-md-12 text-center">
                                <div class="numbers">
                                    <p class="card-category">Pre Workshop Survey</p>
                                    <p class="card-title">
                                        <p>
                                </div>
                            </div>
                          
                        </div>
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-chart-bar-32 text-warning"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                <a href="<?php echo e(route('getPreWorkshopSurvey')); ?>" style="text-decoration:none">
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                             <i class="fa fa-refresh" ></i> Complete Survey
                        </div>
                    </div>
                </a>
                </div>
            </div>
            </a>
            <!-- <?php endif; ?> -->
            <?php endif; ?>
            <?php if(Auth::user()->show_feedback == 1 || auth()->user()->feedback_survey == "1"): ?>
            <a href="<?php echo e(route('feedbackDashboard')); ?>" style="text-decoration: none;">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats clickable">
                    <div class="card-body ">
                        <div class="row">
                   
                            <div class="col-8 col-md-12 text-center">
                                <div class="numbers">
                                    <p class="card-category">Feedback Survey</p>
                                    <p class="card-title"> 
                                        <p>
                                </div>
                            </div>
                           
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-bullet-list-67 text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo e(route('feedbackDashboard')); ?>" style="text-decoration: none;">
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                             <i class="fa fa-calendar-o"></i> Submit
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            </a>
            <?php else: ?>
            <a href="#" style="text-decoration: none;">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats grayout">
                    <div class="card-body ">
                        <div class="row">
                 
                            <div class="col-7 col-md-12 text-center">
                                <div class="numbers">
                                    <p class="card-category">Feedback Survey</p>
                                    <p class="card-title">
                                        <p>
                                </div>
                            </div>
                   
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-bullet-list-67 text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" style="text-decoration: none;">
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                             <i class="fa fa-calendar-o"></i> Complete Workshop to submit
                        </div>
                    </div>
                </a>
                </div>
            </div>
            </a>
            <?php endif; ?>
            <?php if(auth()->user()->planning_tools == "1"): ?>
            <a href="<?php echo e(route('editworkflow')); ?>" style="text-decoration: none;">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats clickable">
                    <div class="card-body ">
                        <div class="row">
                         
                            <div class="col-6 col-md-12 text-center">
                                <div class="numbers">
                                    <p class="card-category">Tools</p>
                                    <p class="card-title">
                                        <p>
                                </div>
                            </div>
                          
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-vector text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo e(route('editworkflow')); ?>" style="text-decoration:none;">
                    <div class="card-footer ">
                        <hr>
                        <div class="stats"> 
                            <i class="fa fa-clock-o"></i> The Maker Framework
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            </a>
            <?php else: ?>
            <a href="#" style="text-decoration: none;">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats grayout">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-2 col-md-2"></div>
                            <div class="col-6 col-md-6">
                                <div class="numbers">
                                    <p class="card-category">Tools</p>
                                    <p class="card-title">
                                        <p>
                                </div>
                            </div>
                            <div class="col-4 col-md-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-vector text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" style="text-decoration:none;">
                    <div class="card-footer ">
                        <hr>
                        <div class="stats"> 
                            <i class="fa fa-clock-o"></i> The Maker Framework
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            </a>
        <?php endif; ?>
    <?php if(Auth()->user()->is_profile_complete == 1): ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Pre Workshop Report</h5>
                        <p class="card-category">Workshop performance</p>
                    </div>
                    <div class="card-body ">
                        <div>

                        <!-- <button type="button" class="btn btn-primary" id="download-pdf" >
                          Download PDF
                        </button> -->


                        <button type="button" class="btn btn-primary" id="save_img" >
                          Download PDF
                        </button>
                        <!-- highcharts  -->
                        <div id="container1" style="height: 400px"></div>
                        <?php if($is_feedback_show==1): ?>
                            <div id="container2" style="height: 400px"></div>
                        <textarea name="message" class="HC" id='2' style="width:600px; height:50px;display:none;"></textarea>
                        <?php endif; ?>
                        <textarea name="message" class="HC" id='2' style="width:600px; height:50px; display: none">
                            <p style="text-align:left;margin-left:50px;"><b>1.Conflict</b></p>
                            <p style="text-align:left;margin-left:30px;font-size:10px;">Negotiation is uncomfortable, and much of that discomfort is derived from the perceived level of conflict that exists between you and the other party. In many negotiations, what you gain comes at the expense of the other party, and vice versa. Where both parties have conflicting objectives, tension is bound to arise. Recognizing this, and developing strategies to mitigate its potential impact on your deal is imperative. Too often, when people are in uncomfortable, tense situations, their natural human tendency is to do whatever possible to ease the tension, or lessen the discomfort. In negotiation terms, this means not opening with an effective first offer, making unnecessary concessions, and not pushing the other party as hard as you can, to name a few. Understand that one’s ability to handle conflict and keep a clear and logical thought process is critical to one's ability to negotiate.</p>
                            <p style="text-align:left;margin-left:50px;"><b>2.Fairness</b></p>
                            <p style="text-align:left;margin-left:30px;font-size:10px;">Fairness is a tricky subject in negotiation, but not for the reason you might think. Not because there is not enough of it, but because there is too much of it. Many people bring in their personal set of morals, values and beliefs into their deals, front and center for most, is their personal belief in <b>FAIRNESS</b>. Let’s face it, most people are fair by nature, we’re taught from a young age to be fair in all aspects of our life. However, in negotiation, it is precisely this internal sense of fairness that can cause people to sub optimize their deals. They leave money on the table, they don’t think they can make demands of the other party out of fear that the other party will perceive them as “unfair”. Even more dangerous, is when that internal sense of fairness is actively exploited by another party who doesn’t value fairness in the same way as you. They’re able to park their sense of fairness at the door, but continue to exploit you with yours. </p>
                            <p style="text-align:left;margin-left:50px;"><b>3.Competitiveness</b></p>
                            <p style="text-align:left;margin-left:30px;font-size:10px;">Competitiveness can be good up to a point, but it can also be dangerous and even disastrous if not kept in check. Sometimes the desire to win and our competitiveness gets in the way of a successful negotiation because we lose track of the real objective and what we are trying to accomplish. Winning, or said another way, beating the other party, becomes singularly important. Win at all costs! Effective negotiators never lose sight of their true objective and develop strategies and game plans for maximizing value in their deals. They park their egos at the door and are objective with their actions and behaviors. </p>
                            <p style="text-align:left;margin-left:50px;"><b>4.Questioning & Listening </b></p>
                            <p style="text-align:left;margin-left:30px;font-size:10px;">Are you truly listening, or are you just waiting to speak? Of all the characteristics that define successful negotiators, listening might seem like one of the simpler ones, however nothing could be further from the truth. Active listening is a skill many lack. Many people don’t ask questions or listen with the intent to understand; they ask and listen with the intent to reply. We often listen to confirm preconceived assumptions, or we are busy formulating what we want to say next as the other person is speaking. In either case, we are not absorbing the information and in turn, unable to use it to our advantage. Wrapped up in listening is our ability to ask effective questions. Often, we ask questions we presume to know the answers to, therefore we don’t even listen to what the other party says. Always ask questions to further knowledge and challenge assumptions, rather than reinforce commonly held beliefs.</p><br><br>
                            <p style="text-align:left;margin-left:50px;"><b>5.Planning</b></p>
                            <p style="text-align:left;margin-left:30px;font-size:10px;">How do you know where you are going, if you don’t have a map to get there? Make no mistake about it, negotiation is 90% planning and preparing. It is the single most important and effective thing you can do to increase the likelihood of achieving your desired outcome. The time invested in planning and preparing will pay itself back ten fold in the results you achieve. In negotiation, people often spend a lot of time thinking about what their desired end state is, but they don’t spend a lot of time, if any, thinking about all the things they need to do along the way to get there. A negotiation is not an isolated interaction between two parties sitting down at the negotiation table. It is the culmination of all interactions between both parties leading up to and throughout the deal. Real planning takes into consideration all possible scenarios, questions, objections, meetings, phone calls, emails, offers, counter offers and everything else that might occur during the deal. In negotiation, planning only for your desired end state is like taking a road trip where all you know is that you want to end up in LA from New York, but have no map or knowledge of roads, highways, gas stations, hotels, or rest stops along the way. Sure you might get there eventually if you just start heading west, but how much more difficult is your journey going to be compared to if you had everything mapped out from the start.</p>
                            <p style="text-align:left;margin-left:50px;"><b>6.Trust</b></p>
                            <p style="text-align:left;margin-left:30px;font-size:10px;">It is important to understand the impact that trust (or the lack thereof) can have on any deal. To effectively create value between two or more parties, one must first establish trust. As it is only once trust has been established that the sharing of information will occur, which in turn allows parties to negotiate effectively against value discrepancies in the deal. In the absence of trust, both parties remain guarded, and it is very difficult for two negotiating partners to share important information without thinking the other will use it against them, or for their benefit exclusively. That said, depending on the type of negotiation in question, the requirement for trust changes. In auction and bargaining negotiations, trust is not critical as these are typically transactional, arms length deals. Whereas in concession and integrative negotiations, the need for trust grows exponentially as these are typically much more complex deals, executed with strategic partners over longer periods of time, all lending to the need for increased trust. Remember, in the end, people negotiate with people, as such, you’re more likely to get the deal you want when the other party trusts you. </p>
                            <p style="text-align:left;margin-left:50px;"><b>7.Creativity</b></p>
                            <p style="text-align:left;margin-left:30px;font-size:10px;">In many negotiations, a significant amount of value is left on the table due to a lack of creative
                            solutions and problem solving. The creativity we’re referring to here is not in reference to artistic talent, but rather, one’s ability to see beyond the normal operating parameters and find solutions to problems that may be less obvious. In integrative negotiations to create value, often times you have to think “outside of the box” to drive deal complexity, because that is where the hidden value is found in deals. Most people shy away from complexity, they are intimidated by it, they don’t know how to handle it, but successful negotiators thrive on it. As it’s only through creative, complex solutions that you can realize untapped potential in a deal.</p>
                            <p style="text-align:left;margin-left:50px;"><b>8.Perspective</b></p>
                            <p style="text-align:left;margin-left:30px;font-size:10px;">The ability to see things from the from the other party's perspective is paramount in a negotiation. Too often we’re caught up in our own head, worrying about all the things that we need in order to hit our objectives and meet our timelines (while working within our own internal constraints) that we fail to consider what the other party might be dealing with on their end. Understanding their circumstances, problems, opportunities, abilities, and constraints afords you two advantages: First, an opportunity to shift the perceived balance of power in your favor by emphasizing their weaknesses and down playing their strengths. And second, the ability to create proposals that better appeal to their unique situation, circumstances and requirements, while still driving your agenda forward.  </p>

  
                        </textarea>

                        <div style="page-break-before:  always;"></div>
                        <!-- end of high charts -->



                        <!-- <canvas id=chartHours width="600" height="300"></canvas> -->

                    </div>
                    
                </div>
            <!--     <?php if($is_feedback_show==1): ?>
                <div class="feedbackWidget users_feedback" style="padding:20px;">
                <h4 style="font-size:1.25rem; margin-bottom: 20px;">Feedback</h4>
                <div class="allFeedbacks" style="padding-left: 30px;">
                    <h5 style="font-size: 16px; margin-bottom: 10px;">Positive Feedback</h5>
                    <ul class="feedbackpoints" style="list-style: disc; margin: 0 0 20px 20px;">
                        <?php if(!empty($comments)): ?>
                            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($comment)): ?>
                                    <li style="margin-top:10px;"><?php echo e($comment->liked_comment); ?></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>

                    <h5>Negative Feedback</h5>
                    <ul class="feedbackpoints" style="list-style: disc; margin: 0 0 20px 20px;">
                        <?php if(!empty($comments)): ?>
                            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <?php if(!empty($comment)): ?>
                                <li style="margin-top:10px;"><?php echo e($comment->disliked_comment); ?></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
               
            </div>
            <?php endif; ?> -->
            </div>
        </div>
           <?php endif; ?>
         </div>
    </div>
    <?php endif; ?>

<!--     <?php echo $__env->make('pages.js.preworkshop_chart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
<?php if($is_feedback_show==1): ?>
<input type="hidden" id="feedback_chart_data">
<script type="text/javascript">
    var chart1;
    var chart2;
   $(function () {
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo e(url('/')); ?>/get-chart",
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "id" : "<?php echo e($id); ?>"
            },
            success: function (data) {
                if (data.status == "success") { // if true (1)
                    chart_data = data.chart_values;
                    var words = chart_data.split(",");
                    var options = {
                        colors: ["#f1b91c", "#f1b91c", "#FF9A00", "#00B8F1"],
                        chart: {
                            renderTo: 'container1',
                            type: 'column',
                            panning: true,
                            backgroundColor: 'white',
                            borderColor: 'black',
                            borderWidth: 0,
                            className: 'dark-container',
                            plotBackgroundColor: 'white',
                            plotBorderColor: 'black',
                            plotBorderWidth: 0,
                        },
                        credits: {
                            enabled: false
                        },
                        title: {
                            text: 'Pre Workshop Survey',
                            style: {
                                color: '#252422',
                                font: 'normal 1.57em "Montserrat"'
                            },
                            align: 'left'
                        },
                        tooltip: {
                            formatter: function () {
                                return 'Average Rating for <b>' + this.x.replace(/_/g, ' ') +
                                    '</b> is <b>' + this.y + '</b>';
                            },
                            backgroundColor: 'rgba(0, 0, 0, 0.75)',
                            style: {
                                color: '#F0F0F0'
                            }
                        },
                        categories: {
                            enabled: 'true'
                        },
                        legend: {
                            // enabled: false,
                            layout: 'vertical',
                            align: 'center',
                            verticalAlign: 'top',
                            borderWidth: 0,
                            itemStyle: {
                                font: '9pt Segoe UI',
                                color: 'black'
                            },
                            itemHoverStyle: {
                                color: 'grey'
                            },
    
    
                            labelFormatter: function() 
                                {
                                    if(this.name!='Series 1')
                                    {
                                        return 'Ratings';
                                    }
                                    else
                                    {
                                        return 'Ratings';
                                    }
                                }
                                                         
                        },
                        xAxis: {
                            gridLineWidth: 0,
                            categories: [
                                'Conflict',
                                'Fairness',
                                'Competitiveness',
                                'Questioning and Listening',
                                'Planning',
                                'Trust',
                                'Creativity',
                                'Perspective'
                            ],
                            tickInterval: 1,
                            overflow: 'justify',
                             labels: { useHTML: true,
                                style: {
                            whiteSpace: 'nowrap'
                          }, formatter: function() { return '<div class="graph-survey">'+this.value+'</div>';},rotation: -45,
                            },
                            title: {
                                enabled: true
                            },
    
    
                        },
                        yAxis: {
                            gridLineWidth: 0,
                            tickInterval: 1,
                            min: 0,
                            max: 5,
                            title: {
                                enabled: true,
                                text: "Ratings",
                                style: {
                                    fontWeight: 'normal',
                                    color: 'black'
                                }
                            },
                            labels: {
                                style: {
                                    color: 'black'
                                }
                            },
    
    
    
                        },
                        exporting: {
                            enabled: true,
                            buttons: {
                                contextButton: {
                                    menuItems: Highcharts.defaultOptions.exporting.buttons.contextButton.menuItems.slice(0,11)
                                },
                            },
    
    
                            chartOptions: {
                                  chart: {
                                    height: 600,
                                    marginBottom: 300,
                                    events: {
                                      load: function() {
                                        var renderer = this.renderer;
    
                                        // renderer.path(['M', 30, 450, 'L', 570, 450, 'Z']).attr({
                                        //   stroke: 'black',
                                        //   'stroke-width': 1
                                        // }).add();
    
    
                                        // renderer.text("Fairness is a tricky subject in negotiation, but not for the reason you might think. Not because there is not enough of it, but because there is too much of it. Many people bring in their personal set of morals, values and beliefs into their deals, front and center for most, is their personal belief in FAIRNESS. Let’s face it, most people are fair by nature, we’re taught from a young age to be fair in all aspects of our life. However, in negotiation, it is precisely this internal sense of fairness that can cause people to sub optimize their deals. They leave money on the table, they don’t think they can make demands of the other party out of fear that the other party will perceive them as “unfair”.<b class='gridMap'> Even more dangerous, is when that internal sense of fairness is actively exploited by another party who doesn’t value fairness in the same way as you. They’re able to park their sense of fairness at the door, but continue to exploit you with yours", 30, 450).add();
                                       
                                      }
                                    }
                                  },
                                  legend: {
                                    y: -220
                                  },
                                  // credits: {
                                  //   position: {
                                  //     y: -220
                                  //   }
                                  // }
                                }
                            },
                        plotOptions: {
                             column: { dataLabels: { enabled: true,  overflow: 'none', crop: false, inside: false, }},
                            series: {
                                stacking: 'normal',
                                cursor: 'pointer'
                            }
                        },
                        series: []
                    };
                    options.series = [{
                        data: chart_data.split(',').map(Number)
                    }];
                    // options.series = [{
                    //     data:  [1,2,3,4,2,4,3,1]    // chart_data.split(',').map(Number)
                    // }];
                    chart1 = new Highcharts.Chart(options);
                    chart1.series[0].name = "Ratings";
                    chart1.redraw();
                    
                }
    
                   
        $("#Conflict").tooltip({placement: 'bottom', title:'Conflict : "Your ability to handle conflict, think clearly and make sound decisions in the face of adversity."'});
    
        $("#Fairness").tooltip({placement: 'bottom', title:'Fairness : "Your ability to not be influenced by your internal sense of fairness."'});
    
        $("#Competitiveness").tooltip({placement: 'bottom', title:'Competitiveness : "Your ability to operate objectively and without ego."'});
    
        $("#Questioning_and_Listening").tooltip({placement: 'bottom', title:'Questioning & Listening : "Your ability to ask effective questions and process incoming information."'});
    
        $("#Planning").tooltip({placement: 'bottom', title:'Planning : "Your ability effectively strategize and map out an entire negotiation from start to end."'});
    
        $("#Trust").tooltip({placement: 'bottom', title:'Trust : "Your ability to create the appropriate climate to complement your strategy."'});
    
        $("#Creativity").tooltip({placement: 'bottom', title:'Creativity : "Your ability to generate solutions previously not considered."'});
    
        $("#Perspective").tooltip({placement: 'bottom', title:'Perspective : "Your ability to view the negotiation from the other party’s point of view."'});
            },
        });
    });
    });
    
    
    $(function () {
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo e(url('/')); ?>/feedback-report",
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "id" : "<?php echo e($id); ?>"
            },
            success: function (data) {
                if (data.status == "success") { // if true (1)
                    chart_data = data.chart_values;
    
                    $('#feedback_chart_data').val(chart_data);
                    var words = chart_data.split(",");
                     //alert(st);
                    var total = 0;
                    for (var i = 0; i < words.length; i++) {
                     // var st = (parseFloat(words) + 0.01).toFixed(2);
                        totalAvg = parseFloat(total) + parseFloat(words[i]);
    
                        total = totalAvg.toFixed(2);
    
                    }
                    $(".avrg_rating").html(" Average Ratings : "+total/8+"");
                    $(".ffe").html('');
                    $(".ffe").html($('.users_feedback').html());
                    $(".ffe").append(" Average Ratings : "+total/8+"");
                    var options = {
                        colors: ["#f1b91c", "#f1b91c", "#FF9A00", "#00B8F1"],
                        chart: {
                            renderTo: 'container2',
                            type: 'column',
                            panning: true,
                            backgroundColor: 'white',
                            borderColor: 'black',
                            borderWidth: 0,
                            className: 'dark-container',
                            plotBackgroundColor: 'white',
                            plotBorderColor: 'black',
                            plotBorderWidth: 0,
                        },
                        credits: {
                            enabled: false
                        },
                        title: {
                            text: 'Feedback Survey',
                            style: {
                                color: '#252422',
                                font: 'normal 1.57em "Montserrat"'
                            },
                            align: 'left'
                        },
                        tooltip: {
                            formatter: function () {
                                return 'Average Rating for <b>' + this.x.replace(/_/g, ' ') +
                                    '</b> is <b>' + this.y + '</b>';
                            },
                            backgroundColor: 'rgba(0, 0, 0, 0.75)',
                            style: {
                                color: '#F0F0F0'
                            }
                        },
                        categories: {
                            enabled: 'true'
                        },
                        legend: {
                            // enabled: false,
                            layout: 'vertical',
                            align: 'center',
                            verticalAlign: 'top',
                            borderWidth: 0,
                            itemStyle: {
                                font: '9pt Segoe UI',
                                color: 'black'
                            },
                            itemHoverStyle: {
                                color: 'grey'
                            },
    
    
                            labelFormatter: function() 
                                {
                                    if(this.name!='Series 1')
                                    {
                                        return 'Ratings';
                                    }
                                    else
                                    {
                                        return 'Ratings';
                                    }
                                }
                                                         
                        },
                        xAxis: {
                            gridLineWidth: 0,
                            categories: [
                                'Conflict',
                                'Fairness',
                                'Competitiveness',
                                'Questioning and Listening',
                                'Planning',
                                'Trust',
                                'Creativity',
                                'Perspective'
                            ] ,
                            tickInterval: 1,
                            overflow: 'justify',
                            labels: { useHTML: true,
                                style: {
                            whiteSpace: 'nowrap'
                          }, formatter: function() { return '<div class="graph-survey">'+this.value+'</div>';},rotation: -45,
                            },
                            title: {
                                enabled: true
                            },
    
    
                        },
                        yAxis: {
                            gridLineWidth: 0,
                            tickInterval: 1,
                            min: 0,
                            max: 5,
                            title: {
                                enabled: true,
                                text: "Ratings",
                                style: {
                                    fontWeight: 'normal',
                                    color: 'black',
    
                                }
                            },
                            labels: {
                                style: {
                                    color: 'black'
                                }
                            },
    
    
    
                        },
                        exporting: {
                            enabled: true,
                            buttons: {
                                contextButton: {
                                    menuItems: Highcharts.defaultOptions.exporting.buttons.contextButton.menuItems.slice(0,11)
                                },
                            },
    
    
                            chartOptions: {
                                  chart: {
                                    height: 600,
                                    marginBottom: 300,
                                    events: {
                                      load: function() {
                                        var renderer = this.renderer;
    
                                        // renderer.path(['M', 30, 450, 'L', 570, 450, 'Z']).attr({
                                        //   stroke: 'black',
                                        //   'stroke-width': 1
                                        // }).add();
    
    
                                        renderer.text("Fairness is a tricky subject in negotiation, but not for the reason you might think. Not because there is not enough of it, but because there is too much of it. Many people bring in their personal set of morals, values and beliefs into their deals, front and center for most, is their personal belief in FAIRNESS. Let’s face it, most people are fair by nature, we’re taught from a young age to be fair in all aspects of our life. However, in negotiation, it is precisely this internal sense of fairness that can cause people to sub optimize their deals. They leave money on the table, they don’t think they can make demands of the other party out of fear that the other party will perceive them as “unfair”.<b class='gridMap'> Even more dangerous, is when that internal sense of fairness is actively exploited by another party who doesn’t value fairness in the same way as you. They’re able to park their sense of fairness at the door, but continue to exploit you with yours", 30, 450).add();
                                       
                                      }
                                    }
                                  },
                                  legend: {
                                    y: -220
                                  },
                                  // credits: {
                                  //   position: {
                                  //     y: -220
                                  //   }
                                  // }
                                }
                            },
                        plotOptions: {
                             column: { dataLabels: { enabled: true,  overflow: 'none', crop: false, inside: false, }},
                            series: {
                                stacking: 'normal',
                                cursor: 'pointer'
                            }
                        },
                        series: []
                    };
                    options.series = [{
                        data: chart_data.split(',').map(Number)
                    }];
                    chart2 = new Highcharts.Chart(options);
                    chart2.series[0].name = "Ratings";
                    chart2.redraw();
                    
                }
    
                   
        $("#Conflict").tooltip({placement: 'bottom', title:'Conflict : "Your ability to handle conflict, think clearly and make sound decisions in the face of adversity."'});
    
        $("#Fairness").tooltip({placement: 'bottom', title:'Fairness : "Your ability to not be influenced by your internal sense of fairness."'});
    
        $("#Competitiveness").tooltip({placement: 'bottom', title:'Competitiveness : "Your ability to operate objectively and without ego."'});
    
        $("#Questioning_and_Listening").tooltip({placement: 'bottom', title:'Questioning & Listening : "Your ability to ask effective questions and process incoming information."'});
    
        $("#Planning").tooltip({placement: 'bottom', title:'Planning : "Your ability effectively strategize and map out an entire negotiation from start to end."'});
    
        $("#Trust").tooltip({placement: 'bottom', title:'Trust : "Your ability to create the appropriate climate to complement your strategy."'});
    
        $("#Creativity").tooltip({placement: 'bottom', title:'Creativity : "Your ability to generate solutions previously not considered."'});
    
        $("#Perspective").tooltip({placement: 'bottom', title:'Perspective : "Your ability to view the negotiation from the other party’s point of view."'});
            },
        });
    });
    });
    
    
    /**
    * Create a global getSVG method that takes an array of charts as an
    * argument
    */
    
    $(function() {
    
    Highcharts.getSVG = function(charts, texts) {
    var svgArr = [],
      top = 0,
      width = 0,
      txt;
    Highcharts.each(charts, function(chart, i) {
      var svg = chart.getSVG();
      svg = svg.replace('<svg', '<g transform="translate(0,' + top + ')" ');
      svg = svg.replace('</svg>', '</g>');
      top += chart.chartHeight;
      width = Math.max(width, chart.chartWidth);
      svgArr.push(svg);
      txt = texts[i];
      txt = '<text x= "' + 0 + '" y = "' + (top + 20) + '" styles = "' + txt.attributes.style.value + '">' + $(txt).val() + '</text>';
      top += 60;
      svgArr.push(txt);
    });
    return '<svg height="' + top + '" width="' + width + '" version="1.1" xmlns="http://www.w3.org/2000/svg">' + svgArr.join('') + '</svg>';
    };
    
    
    Highcharts.exportChartWithText = function(charts, texts, options) {
    
    // Merge the options
    options = Highcharts.merge(Highcharts.getOptions().exporting, options);
    
    // Post to export server
    Highcharts.post(options.url, {
      filename: options.filename || 'chart',
      type: options.type,
      width: options.width,
      svg: Highcharts.getSVG(charts, texts)
    });
    };
    
    
    
    
    var texts = $('.HC');
    
    $("#save_img").click(function() {
    Highcharts.exportChartWithText([chart1, chart2], texts, {
      type: 'application/pdf',
      filename: '<?php echo e(Auth()->user()->name); ?>_report'
    });
    });
    });
    
</script>

<?php else: ?>
<script type="text/javascript">
     var chart1;
$(function () {
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo e(url('/')); ?>/get-chart",
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "id" : "<?php echo e($id); ?>"
            },
            success: function (data) {
                if (data.status == "success") { // if true (1)
                    chart_data = data.chart_values;
                    var words = chart_data.split(",");
                    var options = {
                        colors: ["#f1b91c", "#f1b91c", "#FF9A00", "#00B8F1"],
                        chart: {
                            renderTo: 'container1',
                            type: 'column',
                            panning: true,
                            backgroundColor: 'white',
                            borderColor: 'black',
                            borderWidth: 0,
                            className: 'dark-container',
                            plotBackgroundColor: 'white',
                            plotBorderColor: 'black',
                            plotBorderWidth: 0,
                        },
                        credits: {
                            enabled: false
                        },
                        title: {
                            text: 'Pre Workshop Survey',
                            style: {
                                color: '#252422',
                                font: 'normal 1.57em "Montserrat"'
                            },
                            align: 'left'
                        },
                        tooltip: {
                            formatter: function () {
                                return 'Average Rating for <b>' + this.x.replace(/_/g, ' ') +
                                    '</b> is <b>' + this.y + '</b>';
                            },
                            backgroundColor: 'rgba(0, 0, 0, 0.75)',
                            style: {
                                color: '#F0F0F0'
                            }
                        },
                        categories: {
                            enabled: 'true'
                        },
                        legend: {
                            // enabled: false,
                            layout: 'vertical',
                            align: 'center',
                            verticalAlign: 'top',
                            borderWidth: 0,
                            itemStyle: {
                                font: '9pt Segoe UI',
                                color: 'black'
                            },
                            itemHoverStyle: {
                                color: 'grey'
                            },
    
    
                            labelFormatter: function() 
                                {
                                    if(this.name!='Series 1')
                                    {
                                        return 'Ratings';
                                    }
                                    else
                                    {
                                        return 'Ratings';
                                    }
                                }
                                                         
                        },
                        xAxis: {
                            gridLineWidth: 0,
                            categories: [
                                'Conflict',
                                'Fairness',
                                'Competitiveness',
                                'Questioning and Listening',
                                'Planning',
                                'Trust',
                                'Creativity',
                                'Perspective'
                            ],
                            tickInterval: 1,
                            overflow: 'justify',
                             labels: { useHTML: true,
                                style: {
                            whiteSpace: 'nowrap'
                          }, formatter: function() { return '<div class="graph-survey">'+this.value+'</div>';},rotation: -45,
                            },
                            title: {
                                enabled: true
                            },
    
    
                        },
                        yAxis: {
                            gridLineWidth: 0,
                            tickInterval: 1,
                            min: 0,
                            max: 5,
                            title: {
                                enabled: true,
                                text: "Ratings",
                                style: {
                                    fontWeight: 'normal',
                                    color: 'black'
                                }
                            },
                            labels: {
                                style: {
                                    color: 'black'
                                }
                            },
    
    
    
                        },
                        exporting: {
                            enabled: true,
                            buttons: {
                                contextButton: {
                                    menuItems: Highcharts.defaultOptions.exporting.buttons.contextButton.menuItems.slice(0,11)
                                },
                            },
    
    
                            chartOptions: {
                                  chart: {
                                    height: 600,
                                    marginBottom: 300,
                                    events: {
                                      load: function() {
                                        var renderer = this.renderer;
    
                                        // renderer.path(['M', 30, 450, 'L', 570, 450, 'Z']).attr({
                                        //   stroke: 'black',
                                        //   'stroke-width': 1
                                        // }).add();
    
    
                                        // renderer.text("Fairness is a tricky subject in negotiation, but not for the reason you might think. Not because there is not enough of it, but because there is too much of it. Many people bring in their personal set of morals, values and beliefs into their deals, front and center for most, is their personal belief in FAIRNESS. Let’s face it, most people are fair by nature, we’re taught from a young age to be fair in all aspects of our life. However, in negotiation, it is precisely this internal sense of fairness that can cause people to sub optimize their deals. They leave money on the table, they don’t think they can make demands of the other party out of fear that the other party will perceive them as “unfair”.<b class='gridMap'> Even more dangerous, is when that internal sense of fairness is actively exploited by another party who doesn’t value fairness in the same way as you. They’re able to park their sense of fairness at the door, but continue to exploit you with yours", 30, 450).add();
                                       
                                      }
                                    }
                                  },
                                  legend: {
                                    y: -220
                                  },
                                  // credits: {
                                  //   position: {
                                  //     y: -220
                                  //   }
                                  // }
                                }
                            },
                        plotOptions: {
                             column: { dataLabels: { enabled: true,  overflow: 'none', crop: false, inside: false, }},
                            series: {
                                stacking: 'normal',
                                cursor: 'pointer'
                            }
                        },
                        series: []
                    };
                    options.series = [{
                        data: chart_data.split(',').map(Number)
                    }];
                    // options.series = [{
                    //     data:  [1,2,3,4,2,4,3,1]    // chart_data.split(',').map(Number)
                    // }];
                    chart1 = new Highcharts.Chart(options);
                    chart1.series[0].name = "Ratings";
                    chart1.redraw();
                    
                }
    
                   
        $("#Conflict").tooltip({placement: 'bottom', title:'Conflict : "Your ability to handle conflict, think clearly and make sound decisions in the face of adversity."'});
    
        $("#Fairness").tooltip({placement: 'bottom', title:'Fairness : "Your ability to not be influenced by your internal sense of fairness."'});
    
        $("#Competitiveness").tooltip({placement: 'bottom', title:'Competitiveness : "Your ability to operate objectively and without ego."'});
    
        $("#Questioning_and_Listening").tooltip({placement: 'bottom', title:'Questioning & Listening : "Your ability to ask effective questions and process incoming information."'});
    
        $("#Planning").tooltip({placement: 'bottom', title:'Planning : "Your ability effectively strategize and map out an entire negotiation from start to end."'});
    
        $("#Trust").tooltip({placement: 'bottom', title:'Trust : "Your ability to create the appropriate climate to complement your strategy."'});
    
        $("#Creativity").tooltip({placement: 'bottom', title:'Creativity : "Your ability to generate solutions previously not considered."'});
    
        $("#Perspective").tooltip({placement: 'bottom', title:'Perspective : "Your ability to view the negotiation from the other party’s point of view."'});
            },
        });
    });
    });

// document.getElementById('download-pdf').addEventListener("click", downloadPDF);
// function downloadPDF() {
//   var canvas = document.querySelector('#container');
//     console.log(canvas)
//     var canvasImg = canvas.toDataURL({
//         'quality':  1.9,
//         'format': 'jpeg'
//     });
  
//     //creates PDF from img
//     var doc = new jsPDF('2','mm','a4');
//     doc.setFontSize(10);
//     doc.text(15, 15, "Survey Report");
//     doc.addImage(canvasImg, 'PNG', 10, 10, 200, 100 );
//     doc.text(10,120,"1. Conflict - Your ability to handle conflict, think clearly and make sound decisions in the face of adversity");
//     doc.text(10,140,"2. Fairness - Your ability to not be influenced by your internal sense of fairness");
//     doc.text(10,160,"3. Competitiveness - Your ability to operate objectively and without ego");
//     doc.text(10,180,"4. Questioning & Listening - Your ability to ask effective questions and process incoming information");
//     doc.text(10,200,"5. Planning - Your ability effectively strategize and map out an entire negotiation from start to end");
//     doc.text(10,220,"6. Trust - Your ability to create the appropriate climate to complement your strategy");
//     doc.text(10,240,"7. Creativity - Your ability to generate solutions previously not considered");
//     doc.text(10,260,"8. Perspective - Your ability to view the negotiation from the other party’s point of view");
//     doc.save('canvas.pdf');
// }


$(function() {
  Highcharts.getSVG = function(charts, texts) {
    var svgArr = [],
      top = 0,
      width = 0,
      txt;
    Highcharts.each(charts, function(chart, i) {
      var svg = chart.getSVG();
      svg = svg.replace('<svg', '<g transform="translate(0,' + top + ')" ');
      svg = svg.replace('</svg>', '</g>');
      top += 650;
      //top += chart.chartHeight;
      //width = Math.max(width, chart.chartWidth);
      width = 600;
      svgArr.push(svg);
      txt = texts[i];
      txt = '<text x= "' + 0 + '" y = "' + (top + 20) + '" styles = "' + txt.attributes.style.value + '">' + $(txt).val() + '</text>';
      top += 60;
      svgArr.push(txt);
    });
    return '<svg height="' + top + '" width="' + width + '" version="1.1" xmlns="http://www.w3.org/2000/svg">' + svgArr.join('') + '</svg>';
  };


  Highcharts.exportChartWithText = function(charts, texts, options) {

    // Merge the options
    options = Highcharts.merge(Highcharts.getOptions().exporting, options);

    // Post to export server
    Highcharts.post(options.url, {
      filename: options.filename || 'chart',
      type: options.type,
      width: options.width,
      svg: Highcharts.getSVG(charts, texts)
    });
  };


  

  var texts = $('.HC');

  $("#save_img").click(function() {
    Highcharts.exportChartWithText([chart1], texts, {
      type: 'application/pdf',
      filename: '<?php echo e(Auth()->user()->name); ?>_report'
    });
  });
});
</script>
<?php endif; ?>
 

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
        
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/pages/dashboard.blade.php ENDPATH**/ ?>
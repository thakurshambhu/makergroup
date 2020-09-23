<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('js/highcharts.js')); ?>"></script>
<script src="<?php echo e(asset('js/exporting.js')); ?>"></script>
<script src="<?php echo e(asset('js/series-label.js')); ?>"></script>
<script src="<?php echo e(asset('js/offline-exporting.js')); ?>"></script>
<script src="<?php echo e(asset('js/export-data.js')); ?>"></script>
<script src="<?php echo e(asset('js/drilldown.js')); ?>"></script>
<div class="content">
<?php if(session('status')): ?>
<div class="alert alert-success" role="alert">
    <?php echo e(session('status')); ?>

</div>
<?php endif; ?>
<?php if(session('error')): ?>
<div class="alert alert-danger" role="alert">
    <?php echo e(session('error')); ?>

</div>
<?php endif; ?>
<div class="row">
<div class="col-md-12">
<div class="card">
    <div class="row">
        <div class="col-md-9">
            <div class="card-header">
                <h4 class="card-title"> feedback Reports</h4>
            </div>
        </div>
    </div>
    <!-- <?php $total_weightage=0; $toatl_users=0;  ?> -->
    <!-- <?php $__currentLoopData = $report_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $toatl_users++;  ?>
        <div class="card-body">
           <div class="card card-nav-tabs">
              <div class="card-header card-header-warning">
                 BY : <?php echo e($data->name); ?>

              </div>
              <div class="card-body">
                 <?php $__currentLoopData = $data->feedbackResponses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php $total_weightage+= $feedback->weightage;?>
                 <h6 class="card-title">Q : <?php echo e($feedback->question); ?></h6>
                 <h6 class="card-title">feedback ratings : <?php echo e($feedback->weightage); ?></h6>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <h6 class="card-title">Good Things : </h6>
                 <p class="card-text"><?php echo e($data->comments[0]['liked_comment']); ?></p>
                 <h6 class="card-title">Improvement Scope : </h6>
                 <p class="card-text"><?php echo e($data->comments[0]['disliked_comment']); ?></p>
              </div>
           </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
    <div class="card ">
        <div class="card-header ">
            <h5 class="card-title">Feedback Survey Report</h5>
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
                <div id="container1"></div>
                <textarea name="message" class="HC" id='2' style="width:600px; height:50px; display: none"></textarea>
                <div id="container2"></div>
                <textarea name="message" class="HC ffe" id='2' style="width:600px; height:50px;display:none;">Custom text for my charts 2</textarea>
                <div style="page-break-before:  always;"></div>
                <!-- end of high charts -->
                <!-- <canvas id=chartHours width="600" height="300"></canvas> -->
            </div>
        </div>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
           
        <div class="feedbackWidget users_feedback" style="padding:20px 20px 20px 40px; font-family:'Montserrat'; font-weight: 300;">
            <h4 style="font-size:1.25rem; margin-bottom: 20px; font-weight: 400;">Feedback</h4>
            <div class="allFeedbacks" style="padding-left: 30px; font-weight: 400;">
                <h5 style="font-size: 16px; margin-bottom: 10px; font-weight: 300;">Positive Feedback</h5>
                <ul class="feedbackpoints" style="list-style: disc; margin: 0 0 20px 20px; padding-left: 20px;  font-size: 14px">
                    <?php if(!empty($comments)): ?>
                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($comment)): ?>
                                <li style="margin-top:10px;"><?php echo e($comment->liked_comment); ?></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>

                <h5 style="font-size: 16px; margin-bottom: 10px; font-weight: 300;">Negative Feedback</h5>
                <ul class="feedbackpoints" style="list-style: disc; margin: 0 0 20px 20px; padding-left: 20px; font-size: 14px">
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
    </div>
    <!--  <div class="card-body">
        <div class="card card-nav-tabs">
           <div class="card-header card-header-warning">
             <h6 class="card-title avrg_rating"> Average Ratings : </h6> 
           <p class="card-text"><?php echo e($total_weightage/$toatl_users); ?></p>
           </div>
        </div>
        </div> -->
</div>
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
            url: "<?php echo e(url('/')); ?>/admin/feedback-report",
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', [
'class' => '',
'elementActive' => 'list_reports'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Makergroup\resources\views/pages/detail_report.blade.php ENDPATH**/ ?>
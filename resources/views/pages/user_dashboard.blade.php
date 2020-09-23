@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
@if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 )
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
                                    <p class="card-title">{{$user_count}}
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
                                    <p class="card-title">{{$rounds}}<p>
                                   
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
    @endif

    @if(auth()->user()->role_id == 3)
         <div class="content">
        <div class="row">
            @if(Auth::user()->is_profile_complete == 1)
             <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats grayout">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-chart-bar-32 text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Pre Workshop Survey</p>
                                    <p class="card-title">
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="#" style="text-decoration: none; color: gray"> <i class="fa fa-refresh"></i> Submit Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @else

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-chart-bar-32 text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Pre Workshop Survey</p>
                                    <p class="card-title">
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{route('getPreWorkshopSurvey')}}" style="text-decoration: none;"> <i class="fa fa-refresh"></i> Submit Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(Auth::user()->show_feedback == 1)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-bullet-list-67 text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Feedback Survey</p>
                                    <p class="card-title">
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{route('feedbackDashboard')}}" style="text-decoration: none;"> <i class="fa fa-calendar-o"></i> Submit</a> 
                        </div>
                    </div>
                </div>
            </div>

            @else

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats grayout">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-bullet-list-67 text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Feedback Survey</p>
                                    <p class="card-title">
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="#" style="text-decoration: none;color: gray"> <i class="fa fa-calendar-o"></i> Complete Workshop to submit</a> 
                        </div>
                    </div>
                </div>
            </div>
            @endif


            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats grayout">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-vector text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Tools</p>
                                    <p class="card-title">
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> Coming Soon
                        </div>
                    </div>
                </div>
            </div>
       
    @if(Auth()->user()->is_profile_complete == 1)
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

                        <button type="button" class="btn btn-primary" id="download-pdf" >
                          Download PDF
                        </button>
                        <canvas id=chartHours width="600" height="300"></canvas>

                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> Updated 3 minutes ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
           @endif
         </div>
    </div>
    @endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script type="text/javascript">
    var ctx = document.getElementById('chartHours').getContext('2d');


$.ajax({
    type: "POST",
    url: "{{url('/')}}/get-chart",
    data: {
        "_token": "{{ csrf_token() }}",
    },
    success: function (data) {
        if (data.status == "success") { // if true (1)
            chart_data = data.chart_values;
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',

                // The data for our dataset
                data: {
                    labels: ["Conflict", "Fairness", "Competitiveness", "Questioning & Listening ", "Planning", "Trust", "Creativity", "Perspective"],
                    datasets: [{
                        label: 'Ratings in Avg',
                        backgroundColor: '#f1b91c',
                        borderColor: '#f1b91c',
                        scaleStepWidth: 1,
                        data: chart_data,
                    }]
                },

                // Configuration options go here
                options: {
                      legend: {
            labels: {
                fontColor: "black",
                fontSize: 14
            }
        },
        scales: {
            yAxes: [{
                ticks: {
                    fontColor: "black",
                    fontSize: 16,
                    stepSize: 1,
                    beginAtZero: true
                }
            }],
            xAxes: [{
                ticks: {
                    fontColor: "black",
                    fontSize: 16,
                    stepSize: 1,
                    beginAtZero: true,
                    display: true,
                }
            }]
        }
                }
            });
        }
    }
});

document.getElementById('download-pdf').addEventListener("click", downloadPDF);

//donwload pdf from original canvas
function downloadPDF() {
  var canvas = document.querySelector('#chartHours');
    //creates image
    var canvasImg = canvas.toDataURL({
        'quality':  1.9,
        'format': PNG
    });
  
    //creates PDF from img
    var doc = new jsPDF('2','mm','a4');
    doc.setFontSize(10);
    doc.text(15, 15, "Survey Report");
    doc.addImage(canvasImg, 'PNG', 10, 10, 200, 100 );
    doc.text(10,120,"1. Conflict - Your ability to handle conflict, think clearly and make sound decisions in the face of adversity");
    doc.text(10,140,"2. Fairness - Your ability to not be influenced by your internal sense of fairness");
    doc.text(10,160,"3. Competitiveness - Your ability to operate objectively and without ego");
    doc.text(10,180,"4. Questioning & Listening - Your ability to ask effective questions and process incoming information");
    doc.text(10,200,"5. Planning - Your ability effectively strategize and map out an entire negotiation from start to end");
    doc.text(10,220,"6. Trust - Your ability to create the appropriate climate to complement your strategy");
    doc.text(10,240,"7. Creativity - Your ability to generate solutions previously not considered");
    doc.text(10,260,"8. Perspective - Your ability to view the negotiation from the other party’s point of view");
    doc.save('canvas.pdf');
}

    </script>

@endsection

@push('scripts')
        
@endpush
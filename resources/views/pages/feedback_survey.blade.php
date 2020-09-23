@extends('layouts.inner_main')
@section('content')
<style >
  header .inner-site-header{
    display: none;
  }
</style>
<section class="fromation-style">
   <div class="container ">
      <section class="fromation-style">
         <div class="container ">
            <div class="row">
               <div class="col-12">
                <div class="content-style-frame spaceTB30 col-12 question-btn-frame "><a class="btn btn-warning float-left" id="show_feedback_dashbordss" href="{{route('dashboard')}}">Back To Dashboard</a></div>
                
                 @php 
                  $a = request()->id;
                  $arrayuser[] = "";
                  $arrayusername[] = "";
                  foreach($batch_users as $key=>$user)
                  {
                     $arrayuser[] = $user->id;
                     $arrayusername[] = $user->name;
                  } 
                  $key = array_search($a, $arrayuser); 
                  $submitted = Session::get('submittedUsers');  
                 $last_value= end($arrayuser);
                             
                   @endphp
                @if(session()->has('submittedUsers') && !in_array($userid, Session::get('submittedUsers')))
                  
                 @else   

                 <div class="content-style-frame spaceTB30 col-12 question-btn-frame"><a class="btn btn-warning float-right" id="move_next_user" href="@if($last_value == $userid){{route('feedbackDashboard')}}@else{{route('getFeedBackSurvey')}}/{{$batch_users[$key]->id}}@endif">Next User</a></div>

                 @endif
                 <div class="content-style-frame spaceTB30 col-12 question-btn-frame next_user_div" style="display:none;"><a class="btn btn-warning float-right" id="move_next_user" href="@if($last_value == $userid){{$batch_users[$key-1]->id}}@else{{route('getFeedBackSurvey')}}/{{$batch_users[$key]->id}}@endif">Next User</a></div>
                 
                  <div id="messages"></div>
                  <h2>Feedback Survey For {{ ucfirst($batch_users[$key-1]->name) }}</h2>
                  <div class="content-style-frame spaceTB30 padding-bottom35">
                   
                  </div>
               </div>
               @if(session()->has('submittedUsers') && !in_array($userid, Session::get('submittedUsers')))
               <form id="feedback_survey_Form">
                  <div id="question_section">
                    @php $i=1; @endphp
                     @foreach($feedbackQuestions as $index => $feedbackQuestion)
                     <article class="col-12 questionnaire-article">
                        <div class="question" id="question_{{$index}}" data-id = "{{$feedbackQuestion->id}}"><span>{{$i}}.</span> {{$feedbackQuestion->question}}</div>
                        <!-- <input type="hidden" name="question_id" value="{{$feedbackQuestion->id}}"> -->
                        <div class="question-option">
                           <div class="custom-control custom-radio">
                              <input type="radio" id="strongly_disagree{{$feedbackQuestion->id}}" name="question{{$feedbackQuestion->id}}" class="custom-control-input" value="strongly_disagree">
                              <label class="custom-control-label" for="strongly_disagree{{$feedbackQuestion->id}}" required >Strongly Disagree</label>
                           </div>
                           <div class="custom-control custom-radio">
                              <input type="radio" id="disagree{{$feedbackQuestion->id}}" name="question{{$feedbackQuestion->id}}" class="custom-control-input" value="disagree">
                              <label class="custom-control-label" for="disagree{{$feedbackQuestion->id}}">Disagree</label>
                           </div>
                           <div class="custom-control custom-radio">
                              <input type="radio" id="neutral{{$feedbackQuestion->id}}" name="question{{$feedbackQuestion->id}}" class="custom-control-input" value="neutral">
                              <label class="custom-control-label" for="neutral{{$feedbackQuestion->id}}">Neutral</label>
                           </div>
                           <div class="custom-control custom-radio">
                              <input type="radio" id="agree{{$feedbackQuestion->id}}" name="question{{$feedbackQuestion->id}}" class="custom-control-input" value="agree">
                              <label class="custom-control-label" for="agree{{$feedbackQuestion->id}}">Agree</label>
                           </div>
                           <div class="custom-control custom-radio">
                              <input type="radio" id="strongly_agree{{$feedbackQuestion->id}}" name="question{{$feedbackQuestion->id}}" class="custom-control-input" value="strongly_agree">
                              <label class="custom-control-label" for="strongly_agree{{$feedbackQuestion->id}}">Strongly Agree</label>
                           </div>
                        </div>
                     </article>
                     @php $i++; @endphp
                     @endforeach
                   
                  </div>
               </form>

               <div class="form-group col-md-12 hide_comments">
                        <label for="inputDescription"> Name one thing this person did well: <span style="color: red">*</span></label>
                        <textarea  class="form-control" name="comment_1" id="comment_1" placeholder="Name one thing this person did well this week" value="" required></textarea>
                     </div>
                     <div class="form-group col-md-12 hide_comments">
                        <label for="inputDescription">Name one thing this person needs to improve on: <span style="color: red">*</span></label>
                        <textarea  class="form-control" name="comment_2" id="comment_2" placeholder="Name one thing you feel this person should continue to work on" value="" required></textarea>
                     </div>

                       <div id="buttton section ">
                        <div class="col-12 question-btn-frame">
                           <button type="button" class="btn btn-warning float-left" id="submit_feedback_btn">Submit</button>
                        </div>
                     </div>
               @else

               
               
               @if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
               <div class=" col-12 content-style-frame spaceTB30" id="submitted_message" style="color: #2c680b;">Feedback submitted, proceed to next user.</div>
               <div class="content-style-frame spaceTB30 col-12 question-btn-frame"><a class="btn btn-warning float-right" id="show_feedback_dashbord" href="{{route('feedbackDashboard')}}">Back To Dashboard</a></div>
               @else
                <form id="feedback_survey_Form">
                  <div id="question_section">
                   <?php //echo $survey_responses[0]->response; exit; ?>
                    @php $i=1; @endphp

                     @foreach($survey_responses as $survey)
                     <article class="col-12 questionnaire-article">
                        <div class="question" id="question_" data-id = "{{$survey->question_id}}"><span>{{$i}}.</span> {{$survey->question}}</div>
                        

                        <div class="question-option">
                           <div class="custom-control custom-radio">
                              <input type="radio" id="strongly_disagree{{$survey->question_id}}" name="question{{$survey->question_id}}" class="custom-control-input" value="strongly_disagree" @if($survey->response == "strongly_disagree") checked @endif>
                              <label class="custom-control-label" for="strongly_disagree{{$survey->question_id}}" required >Strongly Disagree</label>
                           </div>
                           <div class="custom-control custom-radio">
                              <input type="radio" id="disagree{{$survey->question_id}}" name="question{{$survey->question_id}}" class="custom-control-input" value="disagree" @if($survey->response == "disagree") checked @endif>
                              <label class="custom-control-label" for="disagree{{$survey->question_id}}">Disagree</label>
                           </div>
                           <div class="custom-control custom-radio">
                              <input type="radio" id="neutral{{$survey->question_id}}" name="question{{$survey->question_id}}" class="custom-control-input" value="neutral" @if($survey->response == "neutral") checked @endif>
                              <label class="custom-control-label" for="neutral{{$survey->question_id}}">Neutral</label>
                           </div>
                           <div class="custom-control custom-radio">
                              <input type="radio" id="agree{{$survey->question_id}}" name="question{{$survey->question_id}}" class="custom-control-input" value="agree" @if($survey->response == "agree") checked @endif>
                              <label class="custom-control-label" for="agree{{$survey->question_id}}">Agree</label>
                           </div>
                           <div class="custom-control custom-radio">
                              <input type="radio" id="strongly_agree{{$survey->question_id}}" name="question{{$survey->question_id}}" class="custom-control-input" value="strongly_agree" @if($survey->response == "strongly_agree") checked @endif>
                              <label class="custom-control-label" for="strongly_agree{{$survey->question_id}}">Strongly Agree</label>
                           </div>
                        </div>
                     </article>
                     @php $i++; @endphp
                     @endforeach
                   
                  </div>
               </form>

               <div class="form-group col-md-12">
                        <label for="inputDescription">Name one thing this person did well: <span style="color: red">*</span></label>
                        <textarea  class="form-control" name="comment_1" id="comment_1" placeholder="Name one thing this person did well this week" value="@if(!empty($comments)) {{$comments[0]->liked_comment}} @endif" required>@if(!empty($comments)) {{$comments[0]->liked_comment}} @endif</textarea>
                     </div>
                     <div class="form-group col-md-12">
                        <label for="inputDescription">Name one thing this person needs to improve on: <span style="color: red">*</span></label>
                        <textarea  class="form-control" name="comment_2" id="comment_2" placeholder="Name one thing you feel this person should continue to work on" value="@if(!empty($comments)) {{$comments[0]->disliked_comment}} @endif" required>@if(!empty($comments)) {{$comments[0]->disliked_comment}} @endif</textarea>
                     </div>

                       <div id="buttton section">
                        <div class="col-12 question-btn-frame">
                           <button type="button" class="btn btn-warning float-left" id="update_feedback_btn">Submit</button>
                        </div>
                     </div>
               @endif
               @endif
                <div class=" col-12 content-style-frame spaceTB30" id="submitted_message" style="color: #2c680b; display: none;">Feedback submitted, proceed to next user.</div>
               <div class="content-style-frame spaceTB30 col-12 question-btn-frame back_dashboard_button" style="display:none;"><a class="btn btn-warning float-right" id="show_feedback_dashbordss" href="{{route('feedbackDashboard')}}">Back To Dashboard</a></div>
            </div>
         </div>
   </div>
   </section>
   </div>
</section>

  <script type="text/javascript">
  $("#submit_feedback_btn").click(function () {
  
  var count = "{{$count}}"
  var flag = false;

  if ($('input[type="radio"]:checked').length == count) {
    flag = true;
  }

  if (flag == true) {
      formSubmit();

  } else {
    $('html, body').animate({
      scrollTop: 0
    }, 0);
    $("#messages").addClass("alert alert-danger")
    $("#messages").html("Please Select your responses")
    return false;
  }
});

function formSubmit() {
  var comment_1 = $("#comment_1").val()
  var comment_2 = $("#comment_2").val()

  var formdata = $("#feedback_survey_Form").serializeArray();
  $.ajax({
    type: "POST",
    url: '{{url("/")}}/submit_feedback_form',
    data: {
      "_token": "{{ csrf_token() }}",
      "submitted_for": "{{$userid}}",
      "submitted_by": "{{$submitted_by}}",
      "comment_1" : comment_1,
       "comment_2" : comment_2,
      formdata
    },
    success: function (data) {
      if (data.status == "success") {
        $('html, body').animate({
          scrollTop: 0
        }, 0);
        $("#messages").addClass("alert alert-success")
        $("#messages").html(data.message)
        $("#submit_feedback_btn").hide();
        $("#show_feedback_dashbord").show();
        
        $("#feedback_survey_Form").hide();
        $(".hide_comments").hide();
        $("#submitted_message").show();
        $(".next_user_div").show();
        $(".back_dashboard_button").show();
        setInterval(function () {
          $("#messages").hide();
        }, 1000);
      } else {
        $('html, body').animate({
          scrollTop: 0
        }, 0);
        $("#messages").addClass("alert alert-danger")
        $("#messages").html(data.message)
      }

    }
  });
}


 $("#update_feedback_btn").click(function () {
  
  var count = "{{$count}}"
  var flag = false;

  if ($('input[type="radio"]:checked').length == count) {
    flag = true;
  }

  if (flag == true) {
    
      formUpdate();

  } else {
    $('html, body').animate({
      scrollTop: 0
    }, 0);
    $("#messages").addClass("alert alert-danger")
    $("#messages").html("Please Select your responses")
    return false;
  }
});


 function formUpdate() {
  var comment_1 = $("#comment_1").val()
  var comment_2 = $("#comment_2").val()
 
  var formdata = $("#feedback_survey_Form").serializeArray();
  $.ajax({
    type: "POST",
    url: '{{url("/")}}/update_feedback_form',
    data: {
      "_token": "{{ csrf_token() }}",
      "submitted_for": "{{$userid}}",
      "submitted_by": "{{$submitted_by}}",
      "comment_1" : comment_1,
       "comment_2" : comment_2,
      formdata
    },
    success: function (data) {
      if (data.status == "success") {
        $('html, body').animate({
          scrollTop: 0
        }, 0);
        $("#messages").addClass("alert alert-success")
        $("#messages").html(data.message)
        // $("#submit_feedback_btn").hide();
        // $("#show_feedback_dashbord").show();        
        // $("#feedback_survey_Form").hide();
        // $(".hide_comments").hide();
        // $("#submitted_message").show();
        // $(".next_user_div").show();
        // $(".back_dashboard_button").show();
        setInterval(function () {
          window.location.reload()
        }, 1000);
      } else {
        $('html, body').animate({
          scrollTop: 0
        }, 0);
        $("#messages").addClass("alert alert-danger")
        $("#messages").html(data.message)
      }

    }
  });
}
  </script>

@endsection
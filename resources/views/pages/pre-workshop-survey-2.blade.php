@extends('layouts.inner_main')
@section('content')
<style>
   .inner-site-header {
       display: none;
}
.question-option .custom-control-label::before,
.question-option .custom-control-label::after{
   top:-1px !important;
   width:20px !important;
   height:20px !important;
}

</style>
 <section class="fromation-style">
    <div class="container ">
      <section class="fromation-style">
    <div class="container ">
      <div class="row">
        <div class="content-style-frame spaceTB30 col-12 question-btn-frame"><a class="btn btn-warning float-left" href="{{route('dashboard')}}">Back To Dashboard</a></div>
        <div class="col-12">
          <div id="messages"></div>
          <h2>Pre Workshop Survey</h2>
          <div class="content-style-frame spaceTB30 padding-bottom35">
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum:</p> -->
          </div>
        </div>
        <form id="surveyForm" name="surveyForm">
          @csrf
        <div id="question_section">
          @php $q_count = ""; @endphp
          @if($nextPage < $lastPage || $q_count == "")
            @php $q_count = ($nextPage-1)*10 -9; @endphp
          @endif
          @if($currentPage == $lastPage)
            @php $q_count = ($nextPage)*10 -9; @endphp
          @endif

          @foreach($profileQuestions->shuffle() as $index => $profileQuestion)
            <article class="col-12 questionnaire-article">
              <div class="question" id="question_{{$index}}" data-id = "{{$profileQuestion->id}}"><span>{{ $q_count}}</span> {{$profileQuestion->question}}?</div>
              <div class="question-option">
                @if($profileQuestion['survey_response'])
                <div class="custom-control custom-radio">
                  @if($profileQuestion['survey_response']['response']=="strongly_disagree")
                  <input type="radio" id="strongly_disagree{{$profileQuestion->id}}" name="question{{$profileQuestion->id}}"  class="custom-control-input" checked="checked" value="strongly_disagree">
                  @else

                  <input type="radio" id="strongly_disagree{{$profileQuestion->id}}" name="question{{$profileQuestion->id}}"  class="custom-control-input" value="strongly_disagree">
                  @endif
                  <label class="custom-control-label" for="strongly_disagree{{$profileQuestion->id}}">Strongly Disagree</label>
                </div>
                <div class="custom-control custom-radio">
                  @if($profileQuestion['survey_response']['response']=="disagree")
                  <input type="radio" id="disagree{{$profileQuestion->id}}" name="question{{$profileQuestion->id}}" class="custom-control-input" checked="checked" value="disagree">
                  @else
                  <input type="radio" id="disagree{{$profileQuestion->id}}" name="question{{$profileQuestion->id}}" class="custom-control-input" value="disagree">
                  @endif
                  <label class="custom-control-label" for="disagree{{$profileQuestion->id}}">Disagree</label>
                </div>
                <div class="custom-control custom-radio">
                  @if($profileQuestion['survey_response']['response']=="neutral")
                  <input type="radio" id="neutral{{$profileQuestion->id}}" name="question{{$profileQuestion->id}}" class="custom-control-input" checked="checked" value="neutral">
                  @else
                  <input type="radio" id="neutral{{$profileQuestion->id}}" name="question{{$profileQuestion->id}}" class="custom-control-input" value="neutral">
                  @endif
                  <label class="custom-control-label" for="neutral{{$profileQuestion->id}}">Neutral</label>
                </div>
                <div class="custom-control custom-radio">
                  @if($profileQuestion['survey_response']['response']=="agree")
                  <input type="radio" id="agree{{$profileQuestion->id}}" name="question{{$profileQuestion->id}}" class="custom-control-input" checked="checked" value="agree">
                  @else
                  <input type="radio" id="agree{{$profileQuestion->id}}" name="question{{$profileQuestion->id}}" class="custom-control-input" value="agree">
                  @endif
                  <label class="custom-control-label" for="agree{{$profileQuestion->id}}">Agree</label>
                </div>
                <div class="custom-control custom-radio">
                  @if($profileQuestion['survey_response']['response']=="strongly_agree")
                  <input type="radio" id="strongly_agree{{$profileQuestion->id}}" name="question{{$profileQuestion->id}}" class="custom-control-input" checked="checked" value="strongly_agree">
                  @else
                  <input type="radio" id="strongly_agree{{$profileQuestion->id}}" name="question{{$profileQuestion->id}}" class="custom-control-input" value="strongly_agree">
                  @endif
                  <label class="custom-control-label" for="strongly_agree{{$profileQuestion->id}}">Strongly Agree</label>
                </div>
               @else
               <div class="custom-control custom-radio">
                  <input type="radio" id="strongly_disagree{{$profileQuestion->id}}" name="question{{$profileQuestion->id}}"  class="custom-control-input" value="strongly_disagree">
                  <label class="custom-control-label" for="strongly_disagree{{$profileQuestion->id}}">Strongly Disagree</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="disagree{{$profileQuestion->id}}" name="question{{$profileQuestion->id}}" class="custom-control-input" value="disagree">
                  <label class="custom-control-label" for="disagree{{$profileQuestion->id}}">Disagree</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="neutral{{$profileQuestion->id}}" name="question{{$profileQuestion->id}}" class="custom-control-input" value="neutral">
                  <label class="custom-control-label" for="neutral{{$profileQuestion->id}}">Neutral</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="agree{{$profileQuestion->id}}" name="question{{$profileQuestion->id}}" class="custom-control-input" value="agree">
                  <label class="custom-control-label" for="agree{{$profileQuestion->id}}">Agree</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="strongly_agree{{$profileQuestion->id}}" name="question{{$profileQuestion->id}}" class="custom-control-input" value="strongly_agree">
                  <label class="custom-control-label" for="strongly_agree{{$profileQuestion->id}}">Strongly Agree</label>
                </div>
               @endif
              </div>
            </article>
            @php $q_count++ @endphp
          @endforeach
             <div id="buttton section">
              <div class="col-12 question-btn-frame">
                      @if ($nextPage>=3)
                      <button type="button" data-page="10" class="btn btn-warning float-left" id="previousPage" onclick="prevPage('{{$previousPage}}')" >Previous</button>
                      @endif

                      @if ($nextPage==$lastPage && $currentPage>=$lastPage)
                      <button type="button" class="btn btn-warning float-right" id="submit">Submit</button>
                      @else
                      <button type="button" class="btn btn-warning float-right" id="nextPgae" onclick="nextPage('{{$nextPage}}')">Next</button>
                      @endif
                </div>
            </div>
       </div>
        </form>
        <a class="btn btn-warning float-right" id="back" href="{{route('dashboard')}}" style="display: none;" >Back</a>
        </div>
      </div>
    </div>
  </section>
    </div>
  </section>


  <div id="boxes">
  <div id="dialog" class="window">
    Please answer the following survey questions to the best of your ability. Answer them honestly. The results will not be shared with anyone but yourself. There are no right or wrong answers.
    <div id="popupfoot"> <div class="content-style-frame spaceTB30 col-12 question-btn-frame"><a class="btn btn-warning float-left" href="#">Close</a></div> </div>
  </div>
  <div id="mask"></div>
</div>

<script type="text/javascript">

function nextPage(page){
  setTimeout(function(){ 
    var flag = false;
  var inputs = $('#surveyForm :radio').length;
  var count = parseInt(inputs / 5);
  if ($('input[type="radio"]:checked').length == count) {
    flag = true;
  }

  if (flag == true) {
    var surveyForm = $('#surveyForm');
                var formData = surveyForm.serializeArray();

                $.ajax({
            type: "post",
            url: '{{url("/")}}/save-profile-survey',
            data: formData,
            success: function(data){
              $("#question_section").html(data);
            }
        });

   $.ajax({
            type: "get",
            // url: '{{url("/")}}/load-questions?page='+page+'&previous=0',
            url: '{{url("/")}}/load-questions?page='+page,
            success: function(data){
              console.log('hello');
              $("#question_section").html(data);
            }
        });
      

  } else {
    $('html, body').animate({
      scrollTop: 0
    }, 0);
    $("#messages").addClass("alert alert-danger")
    $("#messages").html("Please Select your responses")
    return false;
  }
}, 1500);
}



function prevPage(page){     

   $.ajax({
            type: "get",
            url: '{{url("/")}}/load-questions?page='+page,
            success: function(data){
              $("#question_section").html(data);
            }
        });

}

$(document).ready(function() {  

var id = '#dialog';
  
//Get the screen height and width
var maskHeight = $(document).height();
var maskWidth = $(window).width();
  
//Set heigth and width to mask to fill up the whole screen
$('#mask').css({'width':maskWidth,'height':maskHeight});

//transition effect
$('#mask').fadeIn(500); 
$('#mask').fadeTo("slow",0.9);   
//transition effect
$(id).fadeIn(2000);
//if mask is clicked
$('#popupfoot').click(function () {
$('#boxes').hide();
$('.window').hide();
});
  
});
  
</script>

@endsection
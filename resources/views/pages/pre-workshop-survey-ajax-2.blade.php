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

  <script type="text/javascript">
  $("#submit").click(function () {

  var flag = false;
  var inputs = $('#surveyForm :radio').length;
  var count = parseInt(inputs / 5);
  if ($('input[type="radio"]:checked').length == count) {
    flag = true;
  }

  if (flag == true) {
    var submit_status = "submitted"
    var surveyForm = $('#surveyForm');
    var formData = surveyForm.serializeArray();
    $.ajax({
      type: "post",
      url: '{{url("/")}}/submit-profile-survey',
      data: {
        "_token": "{{ csrf_token() }}",
        formData,
        submit_status
      },
      success: function (data) {
        if (data.status == "success")
          $('html, body').animate({
            scrollTop: 0
          }, 0);
        $("#messages").addClass("alert alert-success")
        $("#messages").html("Survey recorded succesfully")
        $("#surveyForm").hide();
        $("#submit").hide();
        $("#previousPage").hide();
        $("#back").show();
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
  
});

</script>
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'add_question'
])
@section('content')
    <div class="content">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-9">
                    <div class="card-header">
                        <h4 class="card-title"> Add Question</h4>
                    </div>
                </div>
                <div class="col-md-2">
                    <a type="button" class="btn btn-primary" href="{{ route('showQuestions') }}">Question's List</a>
                </div>
            </div>
                    <div class="card-body">
                        <form method="post" id="addQuestion" action="{{route('saveQuestions')}}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputName">Name <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="Name" id="questionName" placeholder="Name (E.g: Behaviour)" value="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputName">Question <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="question" id="question" placeholder="Question (E.g: What is your pet name?
)" value="">
                                </div>
                            </div>

                             <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputName">Answer Weightage <span style="color: red">*</span></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-2">
                                    Strongly Agree <span style="color: red">*</span>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="number" class="form-control" name="strongly_agree" id="strongly_agree" placeholder=" " value="{{isset($answer_ratings->strongly_agree) ?? $answer_ratings->strongly_agree}}" min="0" max="5" required>
                                    <span class="error" id="strErrorMsg" style="display:none;">you can give score 1 to +5 only</span>
                                </div>

                                <div class="form-group col-md-2">
                                    Agree <span style="color: red">*</span>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="number" class="form-control" name="agree" id="agree" placeholder="" value="{{isset($answer_ratings->agree) ?? $answer_ratings->agree}}" min="0" max="5" required>
                                    <span class="error" id="agreeErrorMsg" style="display:none;">you can give score 1 to +5 only</span>
                                </div>

                                <div class="form-group col-md-2">
                                    Neutral <span style="color: red">*</span>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="number" class="form-control" name="neutral" id="neutral" placeholder="" value="{{isset($answer_ratings->neutral) ?? $answer_ratings->neutral}}" min="0" max="5" required>
                                    <span class="error" id="neutralErrorMsg" style="display:none;">you can give score 1 to +5 only</span>
                                </div>

                                <div class="form-group col-md-2">
                                    Disagree <span style="color: red">*</span>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="number" class="form-control" name="disagree" id="disagree" placeholder="" value="{{isset($answer_ratings->disagree) ?? $answer_ratings->disagree}}" min="0" max="5"  required>
                                    <span class="error" id="disagreeErrorMsg" style="display:none;">you can give score 1 to +5 only</span>
                                </div>

                                <div class="form-group col-md-2">
                                    Strongly Disagree <span style="color: red">*</span>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="number" class="form-control" name="strongly_disagree" id="strongly_disagree" placeholder="" value="{{isset($answer_ratings->strongly_disagree) ?? $answer_ratings->strongly_disagree}}" min="0" max="5" required>
                                    <span class="error" id="strdisErrorMsg" style="display:none;">you can give score 1 to +5 only</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">

                                      <label for="inputDescription">Status <span style="color: red">*</span></label>
                                      <select class="form-control" id="questionStatus" name="questionStatus" value="">
                                            <option value="">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                </div>

                                <div class="form-group col-md-4">

                                      <label for="inputDescription">Survey <span style="color: red">*</span></label>
                                      <select class="form-control" id="survey" name="survey" value="">
                                            <option value="">Select Survey</option>
                                            <option value="Profile Survey">Profile Survey</option>
                                            <option value="Feedback Survey">Feedback Survey</option>
                                        </select>
                                </div>

                                <div class="form-group col-md-4">

                                      <label for="inputDescription">Bucket <span style="color: red">*</span></label>
                                      <select class="form-control" id="bucket" name="bucket" value="">
                                            <option value="">Select Bucket</option>
                                            @foreach($buckets as $bucket)
                                            {{$bucket->name}}
                                            <option value="{{$bucket->id}}">{{$bucket->buckets}}</option>
                                            @endforeach
                                        </select>
                                </div>
                        </div>
                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
<script type="text/javascript">

// $("#strongly_agree" ).blur(function() {
//   if($('#strongly_agree').val()<1 || $('#strongly_agree').val()>5 ){
//       $('#strErrorMsg').show();
//       return false;
//   }
//   else{
//     $('#strErrorMsg').hide();
//   }
// });


// $("#agree" ).blur(function() {
//   if($('#agree').val()<1 || $('#agree').val()>5 ){
//       $('#agreeErrorMsg').show();
//       return false;
//   }
//   else{
//     $('#agreeErrorMsg').hide();
//   }
// });

// $("#neutral" ).blur(function() {
//   if($('#neutral').val()<1 || $('#neutral').val()>5 ){
//       $('#neutralErrorMsg').show();
//       return false;
//   }
//   else{
//     $('#agreeErrorMsg').hide();
//   }
// });


// $("#disagree" ).blur(function() {
//   if($('#disagree').val()<1 || $('#disagree').val()>5 ){
//       $('#disagreeErrorMsg').show();
//       return false;
//   }
//   else{
//     $('#disagreeErrorMsg').hide();
//   }
// });

// $("#strongly_disagree" ).blur(function() {
//   if($('#strongly_disagree').val()<1 || $('#strongly_disagree').val()>5 ){
//       $('#strdisErrorMsg').show();
//       return false;
//   }
//   else{
//     $('#strdisErrorMsg').hide();
//   }
// });

$(document).ready(function(){
    $("#addQuestion").validate({
      rules: {
        Name: {
            required: true,
        },
          question: {
            required: true,
        },
          questionStatus: {
            required: true,
        },
        survey: {
            required: true,
        },
        bucket: {
          required: true,  
        }
        },
        highlight: function (element) {
            $(element).parent().addClass('error')
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('error')
        }
        });
    });

    </script>
@endsection
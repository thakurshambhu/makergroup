@extends('layouts.app', [
    'class' => 'register-page',
    'backgroundImagePath' => 'img/bg/brain.jpg'
])
<style>
    .fullscreen-container {
  display: none;
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
 /* background: rgba(90, 90, 90, 0.5);*/
  z-index: 9999;
  background-color: #55594d;
}

#popdiv {
height: 500px;
max-width: 520px;
    width: 96%;
background-color: #fff;
position: fixed;
top: 0px;
bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
padding: 2rem 1.4rem;
text-align: center;
display: flex;
justify-content: center;
flex-direction: column;
border-radius: 10px;
}
/*#popdiv{
    max-width: 520px;
    width: 96%;
     top: 0px;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}*/

#popupdiv form{margin-top:20px;}
#popupdiv .btn-primary{min-width:160px;}

body {
  padding-top: 65px;
}
</style>
@section('content')
    <div class="content">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-4 col-md-12  ">
                    <div class="card card-signup text-center">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Register') }}</h4>
                        </div>
                        <div class="card-body ">
                            <form class="form" method="POST" action="{{ route('register') }}" id="registerForm">
                                @csrf
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div class="group-icon">
                                        <i class="nc-icon nc-single-02"></i>
                                    </div>
                                    <input name="name" type="text" class="form-control" placeholder="Name" value="{{ old('name') }}"  maxlength="25">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <div class="group-icon">
                                        <i class="nc-icon nc-single-02"></i>
                                    </div>
                                    <input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="group-icon">
                                        <i class="nc-icon nc-key-25"></i>
                                    </div>
                                    <input name="password" type="password" class="form-control" placeholder="Password" maxlength="10" id="password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="group-icon">
                                        <i class="nc-icon nc-key-25"></i>
                                    </div>
                                    <input name="password_confirmation" type="password" class="form-control" placeholder="Password confirmation" maxlength="10">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group wow fadeIn">
            <input type="checkbox" name="policy"> I have read and agree to the <a href="{{'terms'}}">Terms of Use</a>, Including the <a href="{{'policy'}}">Privacy & Policy</a>.
          </div>
                                <!-- <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="nc-icon nc-single-02"></i>
                                        </span>
                                    </div>
                                    <input name="name" type="text" class="form-control" placeholder="Name" value="{{ old('name') }}"  maxlength="25">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div> -->
                                <!-- <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="nc-icon nc-email-85"></i>
                                        </span>
                                    </div>
                                    <input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div> -->
                                <!-- <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="nc-icon nc-key-25"></i>
                                        </span>
                                    </div>
                                    <input name="password" type="password" class="form-control" placeholder="Password" maxlength="10" id="password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div> -->
                                <!-- <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="nc-icon nc-key-25"></i>
                                        </span>
                                    </div>
                                    <input name="password_confirmation" type="password" class="form-control" placeholder="Password confirmation" maxlength="10">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div> -->
                               <!--  <div class="form-check text-left">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="agree_terms_and_conditions" type="checkbox">
                                        <span class="form-check-sign"></span>
                                            {{ __('I agree to the') }}
                                        <a href="#something">{{ __('terms and conditions') }}</a>.
                                    </label>
                                    @if ($errors->has('agree_terms_and_conditions'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('agree_terms_and_conditions') }}</strong>
                                        </span>
                                    @endif
                                </div> -->
                                <div class="card-footer ">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Get Started') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
             </div>
        </div>
     </div> 
 <div class="fullscreen-container">
  <div id="popdiv">
    <span class="pmsg"></span>
    <h4>
      Enter password

    </h4>
     <form method="post" id="checkMasterPassword" action="{{route('checkmpassword')}}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <!-- <label for="inputName">Enter password <span style="color: red">*</span></label> -->
                                    <input class="form-control" type="password" name="master_password" id="master_password">
                                </div>
                            </div>                          
                            
                            <button type="submit" id="submit" class="btn btn-default">Submit</button>
                        </form>
  </div>
</div>
@endsection
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
 <script src="{{asset('paper')}}/js/plugins/jqueryValidation.js"></script>
 <script src="{{asset('paper')}}/js/plugins/jsvalidation-additional.js"></script>
<script>    
$(document).ready(function() {
    $(".fullscreen-container").fadeTo(200, 1);
  
  
   $.validator.addMethod("regex", function (value) {
        return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value) // has only allowed chars letter
    }, "Password must contain at least (1) uppercase letter, (1) lowercase letter, (1) number and (1) special character");
    $("#registerForm").validate({
      rules: {
        name: "required",
        email: {
          required: true,
          email: true
        },
        password: {
            required:true,            
            regex: true,
        },
        password_confirmation:{
            required:true,
             equalTo : "#password"
        },
        policy:{
            required:true,
        }
      },
      messages: {
        name: "Please enter your name",
        email: {
          required: "Please enter your email id",
          email: "Email id is not valid"
        },password: {
            required:'Please enter your password',            
        },
        password_confirmation:{
            required:"Please confirm your password",
            equalTo: "Password and Confirm password should be same"
           
        },
        policy:{
                  required: "Please read the Policy and check the checkbox before submitting the form."
                }
      },
      submitHandler: function(form) {
        // do other things for a valid form
        form.submit();
      },

    });

    $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             });
    $("#checkMasterPassword").validate({
      rules: {
        master_password: {
            required: true,
        },
          
        },
        submitHandler: function (form) {
                var pass = $('#master_password').val();
                $.ajax({
                    url: "check-master-password",
                    type: "POST",
                    data: {
                        'mpassword':pass
                    },
                    success: function (result) {
                    $('.pmsg').html('');
                    if(result == 'match')
                    {   
                        // $('.pmsg').html('<p style="color:green;">Master password verified! You can create an account now.</p>');
                        setTimeout(function(){ 
                            $(".fullscreen-container").fadeOut(200);
                            $('.pmsg').html('');
                         }, 1000);
                          
                    }else
                    {
                        $('.pmsg').html('<p style="color:red;">Incorrect password.</p>');
                        setTimeout(function(){ 
                            $('.pmsg').html('');
                         }, 3000);
                    }
                  }           
                });              
            }
        });   


});

</script>
@push('scripts')
@endpush

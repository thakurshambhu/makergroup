@extends('layouts.app', [
'class' => 'login-page',
'backgroundImagePath' => 'img/bg/brain.jpg'
])
@section('content')
<div class="content">
   <div class="container">
      <div class="col-lg-4 col-md-6 ml-auto mr-auto">
         <form class="form" method="POST" action="{{ route('login') }}" id="Loginform">
            @csrf
            <div class="card card-login">
               <div class="card-header ">
                  <div class="card-header ">
                     <h3 class="header text-center">{{ __('Login') }}</h3>
                  </div>
               </div>
               <div class="card-body ">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="nc-icon nc-single-02"></i>
                        </span>
                     </div>
                     <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" id="email">
                     @if ($errors->has('email'))
                     <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('email') }}</strong>
                     </span>
                     @endif
                     <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong class="email_error"></strong>
                     </span>
                  </div>
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="nc-icon nc-single-02"></i>
                        </span>
                     </div>
                     <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" >
                     @if ($errors->has('password'))
                     <span class="invalid-feedback" style="display: block;" role="alert">
                     <strong>{{ $errors->first('password') }}</strong>
                     </span>
                     @endif
                     
                  </div>
                  <div class="form-group">
                     <div class="form-check">
                        <label class="form-check-label">
                        <input class="form-check-input" name="remember" type="checkbox" value="" {{ old('remember') ? 'checked' : '' }}>
                        <span class="form-check-sign"></span>
                        {{ __('Remember me') }}
                        </label>
                     </div>
                  </div>
               </div>
               <div class="card-footer">
                  <div class="text-center col-md-12">
                     <button type="submit" id="loginSubmit" class="btn btn-warning btn-round col-md-12">Sign in</button>
                     <a href="{{'register'}}" class="col-md-12">
                     Create Account
                     </a>
                     <br>
                     <a href="{{'password/reset'}}" class="col-md-12">
                     Forgot password
                     </a>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection
@push('scripts')
<script>
  //  $(document).ready(function() {
  //      //demo.checkFullPageBackgroundImage();
  //      //var email = "";
  //      $('#loginSubmit').click(function(){
  //           email = $('#email').val();
  //      });
  //       $.ajaxSetup({
  //             headers: {
  //               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //               }
  //            });
       
  //      $("#Loginform").validate({   
  //      rules: { 
  //        email: {
  //           required: true,
  //           email: true,
  //        },
  //        password: {
  //          required: true,                      
  //        },
  //      },
  //   // Specify validation error messages
  //      messages: {
         
  //        email: {
  //          required: "Please enter an email.",
  //          email: "Please enter a valid email."
  //          //minlength: "Your password must be at least 8 characters long."
  //        },  
  //        password: {
  //          required: "Please enter pasword.",
  //          //minlength: "Your password must be at least 8 characters long."
  //        },     
  //      },
   
  //   submitHandler: function(form) {
  //     $('#loginSubmit').click(function(){
  //          var  email = $('#email').val();
  //          $('.email_error').text("");
  //          $.ajax({
  //                   url: "checkuser-active",
  //                   type: "POST",
  //                   data: {'email':email},
  //                   success: function (result) {
  //                   if(result == "Not Activated")
  //                   {
  //                       $('.email_error').text("Your account is not yet active, please try again later.");
  //                   }else 
  //                   {
  //                        form.submit();
  //                   }
  //                 }           
  //            });
  //      });
  //   }
  // });

  //  });
</script>
@endpush
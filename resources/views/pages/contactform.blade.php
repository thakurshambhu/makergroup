@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'contactform'
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
                    <div class="card-header">
                        <h4 class="card-title"> Contact Us</h4>
                    </div>
                    <div class="card-body">
                        <div id="messages">
                         </div>
                        <form method="post" id="contactform" action="{{route('saveContactUs')}}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputName">Name <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="name" id="inputName" placeholder="Name" value="{{old('name')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email <span style="color: red">*</span></label>
                                    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPhone">Phone Number <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="phone_no" id="inputPhone" placeholder="E.g: (xxx) xxx-xxxx">
                                </div>
                              <div class="form-group col-md-6">
                                    <label for="inputSubject">Subject <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="subject" id="inputSubject" placeholder="Subject (Max 100 characters)">
                              </div>
                            </div>

                            <div class="form-group">
                                  <label for="inputDescription">Description</label>
                                  <textarea class="form-control" id="inputDescription" name="description" placeholder="Description (Max 255 characters)"></textarea> 
                            </div>
                            <div class="form-group col-md-6">
                                    <input type="hidden" class="form-control" name="status" id="inputStatus" value="Open">
                              </div>
                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
<script type="text/javascript">
        
$(document).ready(function(){
    $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             });
    $("#contactform").validate({
      rules: {
        name: {
            required: true,
        },
          email: {
            required: true,
            email: true
        },
          phone_number: {
            required: true,
            digits: true
        },
        subject: {
            required: true,
            minlength: 2,
            maxlength:100
        },
        description: {
            minlength: 2,
            maxlength:255
        }
        },
        highlight: function (element) {
            $(element).parent().addClass('error')
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('error')
        },
        submitHandler: function (form) {
                $('#loadingmessage').show();
                $.ajax({
                    url: "submit-contact-form",
                    type: "POST",
                    data: $("#contactform input,textarea").serialize(),
                    success: function (result) {
                    console.log(result);
                    $('#loadingmessage').remove();
                    if (result.status == "success") {
                      $("#messages").addClass("alert alert-success")
                      $('#messages').html(result.message).fadeIn('slow'); // if true (1)
                      $("#contactform input,textarea").val("");
                    }
                    if (result.status == "error") {
                      $("#messages").addClass("alert alert-danger")
                      $('#messages').html(result.message).fadeIn('slow');
                    }
                  }           
                });              
            }
        });
    });

    </script>
@endsection

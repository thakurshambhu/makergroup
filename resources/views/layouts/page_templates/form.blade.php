<div id='loadingmessage' style='display:none'>
  <img src="{{asset('landing_page')}}/images/loading.gif"/>
</div>

<div id="messages">
          </div>
<form method="POST" action="{{route('saveContactUs')}}" id="contactForm">
            @csrf
          <div class="form-group wow fadeIn">
            <input type="text" class="form-control" placeholder="Name" name="name" maxlength="30" />
          </div>
          <div class="form-group wow fadeIn">
            <input type="email" class="form-control" placeholder="Email" name="email" />
          </div>
          <div class="form-group wow fadeIn">
            <input type="text" class="form-control" placeholder="Phone" name="phone_no" maxlength="10" />
          </div>
          <div class="form-group wow fadeIn">
            <textarea class="form-control" placeholder="Message" name="description"></textarea>
          </div>
            <div class="form-group wow fadeIn">
            <input type="checkbox" name="policy"> I have read and agree to the <a style="color:#007bff;" href="{{'terms'}}">Terms of Use</a>, as well as the <a style="color:#007bff;" href="{{'policy'}}">Privacy Policy</a>.
          </div>
          <button type="submit" id="submit" class="btn btn-warning wow fadeIn">Submit</button>
            </form>

          <script type="text/javascript">
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             });
            //$('#submit').click(function () {
            $("#contactForm").validate({
              rules: {
                name: {
                  required: true,
                  maxlength : 20
                },
                email: {
                  required: true,
                  email: true
                },
                phone_no: {
                  required: true,
                  digits: true
                },
                policy:{
                  required:true,
                }
              },
              messages: {
                name: {
                  required: "Please enter your full name.",
                },
                email: "Enter a valid email.",
                phone_no: {
                  required: "Please enter your phone number",
                },
                policy:{
                  required: "Please read the Policy and check the checkbox before submitting the form."
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
                    data: $("#contactForm input,textarea").serialize(),
                    success: function (result) {
                    console.log(result);
                    $('#loadingmessage').remove();
                    if (result.status == "success") {
                      $("#messages").addClass("alert alert-success")
                      $('#messages').html(result.message).fadeIn('slow'); // if true (1)
                      $("#contactForm input,textarea").val("");
                    }
                    if (result.status == "error") {
                      $("#messages").addClass("alert alert-danger")
                      $('#messages').html(result.message).fadeIn('slow');
                    }
                  }           
                });              
            }
          });
    </script>

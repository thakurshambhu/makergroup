
// Validation for Contact Form

$(document).ready(function(){
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
        }
        });
    });




// Fade Out Alerts

$('.alert').delay(2000).fadeOut(); 
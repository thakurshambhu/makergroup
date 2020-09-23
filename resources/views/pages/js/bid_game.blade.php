<script type="text/javascript">

$( document ).ready(function() {
   $(".padTop8").attr("disabled","disabled")
});

// Get Teams in Teams drop down
$('#selectedBatch').change(function () {
    $('.batchUsers').html('');
    var selected_batch = $('#selectedBatch').val();
    $.ajax({
        type: "POST",
        url: "get-teams",
        data: {
            "_token": "{{ csrf_token() }}",
            selected_batch: selected_batch
        },
        success: function (data) {
            if (data.status == "success") {
                var div_data = "<option value=''>Name vs. Name</option>";
                $('.batchUsers').html(div_data)
                $.each(data.userlist, function (i, obj) {
                    var div_data = "<option value=" + obj.id + ">" + obj.user_1.name + "   " + "v/s" + "   " + obj.user_2.name + "</option>";
                    $(div_data).appendTo('.batchUsers');
                });
            }
        }
    });
});


$('.batchUsers').on('change', function (e) {
    $("form input").val("");
    $(".clear_error").html("");
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    var user1 = "";
    var user2 = "";
    $.ajax({
        type: "POST",
        url: "get-opponents",
        data: {
            "_token": "{{ csrf_token() }}",
            valueSelected: valueSelected
        },
        success: function (data) {
            if (data.status == "success") {
                user1 = data.opponents[0].user_1.name;
                user2 = data.opponents[0].user_2.name;
                $(".user_1").html(data.opponents[0].user_1.name)
                $(".user_2").html(data.opponents[0].user_2.name)
           
                $(".bid_input").attr("disabled",false);

            }
        }
    });

    var batch_id = $('#selectedBatch').val();
    var team_id = $('.batchUsers').val();
    
      $.ajax({
        type: "POST",
        url: "get-game-data",
        data: {
            "_token": "{{ csrf_token() }}",
            "batch_id": batch_id,
            "team_id": team_id
        },
        success: function (data) {
            console.log(data);
            $('#game_panel').html(data);
            $(".user_1").html(user1)
            $(".user_2").html(user2)
        }
    });


});




function no_bid_check(i, j, k) {
    
    //Check 1st bid  should be more than 0.20
    var current_val = $('#r' + i + '_' + j + '_bid').val()
    var check_user = $('#r' + i + '_' + j + '_bid').attr('check-user');
    if(!$.isNumeric(current_val))
    {
        $('#error_'+i).html('Please enter only numbers.');
        $('#r' + i + '_' + j + '_bid').focus();
        $('#r' + i + '_' + j + '_bid').val('');
        setTimeout(function(){ $('#error_'+i).html(''); }, 3000);
    }

    //alert(check_user);
    var name =  'r' + i + '_bid_'+j;

    if (j == 1) {
        if (current_val < 0.20) { // current bid should be more than 0.20
            $('#r' + i + '_' + j + '_bid').val('')
            
    $('#r' + i + '_' + j + '_bid').focus();
        }
    }

    // successor bid should be more than 0.20
    if(j>1){
        var previous_val = $('#r' + i + '_' + (j - 1) + '_bid').val()
    }

    var difference = (current_val - previous_val).toFixed(2); //checking previous bid with next
    if (difference < 0.20 && current_val !=0 )  {
        $('#error_'+i).html('Current bid should be more than 0.20 from last bid');
        $('#r' + i + '_' + j + '_bid').focus();
        setTimeout(function(){ $('#error_'+i).html(''); }, 3000);

    } else {
        $('#error_'+i).html();
    }
    var final_value = ''
    var final_index = ''
    var user_1 = [];
    var user_2 = [];
    var isNoBid = false;

    //if (current_val == '0' || current_val == "undefined" || j==5) { // if any bid is 0 then turn it as 'NO BID'
        if(current_val == 0)
        $('#r' + i + '_' + j + '_bid').val('No Bid')

        var counter = 1;

        $('#round_' + i + ' input').each(function (index) {
            if (j <= index + 1 && ($('#r' + i + '_' + (index + 1) + '_bid').val() == 'No Bid' || isNoBid)) {
                isNoBid = true;
               $('#r' + i + '_' + (index + 2) + '_bid').attr("disabled", "disabled"); // rest of the input boxes will be disabled after 0 bid
            } else {
                
               $('#r' + i + '_' + (index + 2) + '_bid').attr("disabled", false);
            }

            if ($('#r' + i + '_' + (index + 1) + '_bid').val() != 'No Bid' && $('#r' + i + '_' + (index + 1) + '_bid').val() != ''){
                final_value = $('#r' + i + '_' + (index + 1) + '_bid').val()
                final_index = index + 1
            }


            if (i % 2 != 0) {

                if (final_index % 2 != 0) {

                    user_1.push($('#r' + i + '_' + (index + 1) + '_bid').val());
                } else {
                    user_2.push($('#r' + i + '_' + (index + 1) + '_bid').val());
                }

            } else {
                if (final_index % 2 != 0) {
                    user_2.push($('#r' + i + '_' + (index + 1) + '_bid').val());
                } else {
                    user_1.push($('#r' + i + '_' + (index + 1) + '_bid').val());
                }
            }

        });



        $('#right_div' + i).html('');
         $('#left_div' + i).html('');
        if ((final_value != '' && j == 5) || isNoBid) {

            //final_value = parseFloat(1.0 - final_value).toFixed(2)
            var mst_final = (1-final_value).toFixed(2);
            if (i % 2 == 0) {

                if (final_index % 2 != 0) {
                    $('#right_div' + i).html('$'+mst_final)
                } else {
                    $('#left_div' + i).html('$'+mst_final)
                }

            } else {
                if (final_index % 2 != 0) {
                    $('#left_div' + i).html('$'+mst_final)
                } else {
                    $('#right_div' + i).html('$'+mst_final)
                }
            }                

        }else if((final_value != '' && j == 5))  {                  

            var mst_final = (1-final_value).toFixed(2);
            if (i % 2 == 0) {

                if (final_index % 2 != 0) {
                    $('#right_div' + i).html('$'+mst_final)
                } else {
                    $('#left_div' + i).html('$'+mst_final)
                }

            } else {
                if (final_index % 2 != 0) {
                    $('#left_div' + i).html('$'+mst_final)
                } else {
                    $('#right_div' + i).html('$'+mst_final)
                }
            }   



        }
       

                var gameForm = $('#round_'+i);
                var formData = gameForm.serializeArray();
                var batch_id = $('#selectedBatch').val();
                var team_id  = $('.batchUsers').val();
                var bid_id = k;
                var user_1_final_bid = $('#left_div'+i).html()
                var user_2_final_bid = $('#right_div'+i).html()
                ////alert(formData);
                $.ajax({
                    type: "POST",
                    url: "/save-bid-data",
                    data: {
                        "bid_id" : bid_id,
                        "check_user" : check_user,
                        "name" : name,
                         "value" : current_val,
                         "batch_id"         : batch_id,
                         "team_id"          : team_id,
                         "_token": "{{ csrf_token() }}",
                         "user_1_final_bid":user_1_final_bid,
                         "user_2_final_bid":user_2_final_bid,
                    },
                    success: function (data) {
                        if (data.status == "success") {
                            
                        }
                    }
                });

    // }
}

// $('input').keyup(function(event) {

//   // skip for arrow keys
//   if(event.which >= 37 && event.which <= 40) return;

//   // format number
//   $(this).val(function(index, value) {
//     return value
//     .replace(/\D/g, "")
//     .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
//     ;
//   });
// });


$('#displayselectedBatch').change(function () {
    var selected_batch = $('#displayselectedBatch').val();
    $.ajax({
        type: "POST",
        url: "get-teams",
        data: {
            "_token": "{{ csrf_token() }}",
            selected_batch: selected_batch
        },
        success: function (data) {
            if (data.status == "success") {
                $.each(data.userlist, function (i, obj) {
                    var div_data = "<option value=" + obj.id + ">" + obj.user_1.name + "   " + "v/s" + "   " + obj.user_2.name + "</option>";
                    $(div_data).appendTo('.displaybatchUsers');
                });
            }
        }
    });
});


$('.displaybatchUsers').on('change', function (e) {

    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;

    $.ajax({
        type: "POST",
        url: "get-game-data",
        data: {
            "_token": "{{ csrf_token() }}",
            valueSelected: valueSelected
        },
        success: function (data) {
            if (data.status == "success") {
                $(".user_1").html(data.opponents[0].user_1.name)
                $(".user_2").html(data.opponents[0].user_2.name)
                // $(".bid_input").attr("disabled",false);

            }
        }
    });

});


</script>
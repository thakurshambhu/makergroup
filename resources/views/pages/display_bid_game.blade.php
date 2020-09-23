@extends('layouts.inner_main')
@section('content')
<style>
   .inner-site-header {
       display: none;
}
</style>
<section class="fromation-style">
   <div class="container">
      <div class="row padding-bottom35">
         <div class="col-12">
            <h2>Bidding Game</h2>
            <div class="content-style-frame">
             <!--   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit</p> -->
             <div class="content-style-frame spaceTB30 col-12 question-btn-frame"><a class="btn btn-warning float-left" href="{{route('dashboard')}}">Back To Dashboard</a></div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <div class="game-input">
               <h3> Workshop </h3>
               <select class="form-control" name="selectedBatch" id="displayselectedBatch">
                  <option value="">Select Workshop</option>
                  @foreach($batches as $batch)
                  <option value="{{$batch->id}}">{{$batch->batches}}</option>
                  @endforeach
               </select>
            </div>
         </div>
         <div class="col-md-6">
            <div class="game-input">
               <h3>Team</h3>
               <select class="form-control displaybatchUsers">
                  <option value="">Name vs. Name</option>
               </select>
            </div>
         </div>
      </div>
      <div class="row">
        <div class="col-md-6 offset-md-5">
            <button type="button" class="btn btn-warning " onclick="showNextBid()">Next</button>
        </div>
      </div>
      <div class="row" id="game_panel" >
         @for($i=1;$i<=6;$i++)
         @if($i%2!=0)
         <div class="col-12 col-md-4 marTop35">
            <div class="bid-frame">
               <h6 class="text-center">Round {{$i}}</h6>
               <div class="error text-danger" id="error_{{$i}}"></div>
               <div class="row bid-box">
                  <div class="col-6 user_1">Name</div>
                  <div class="col-6 user_2">Name</div>
               </div>
               <form id="round_{{$i}}">
                  <div class="row">
                      
                        @for($j=1;$j<=5;$j++)
                        <div class="padTop8 col-6"><input type="text" class="form-control bid_input" name="r{{$i}}_bid_{{$j}}" id="r{{$i}}_{{$j}}_bid" value="" disabled="true"></div>
                        @endfor
                  </div>
               </form>
               <div class="row">
                  <div class="col-6">
                     <div class="padTop8">
                        <div class="form-control total" id="left_div{{$i}}" value="" disabled></div>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="padTop8">
                        <div class="form-control total" id="right_div{{$i}}" value="" disabled></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @else
         <div class="col-12 col-md-4 marTop35">
            <div class="bid-frame">
               <h6 class="text-center">Round {{$i}}</h6>
               <div class="row bid-box">
                  <div class="col-6 user_1">Name</div>
                  <div class="col-6 user_2">Name</div>
               </div>
               <form id="round_{{$i}}">
                  <div class="row">
                        @for($j=1;$j<=5;$j++)
                         @if($j==1)
                           <div class="padTop8 col-6"></div>
                        @endif
                        <div class="padTop8 col-6"><input type="text" class="form-control bid_input" name="r{{$i}}_bid_{{$j}}" id="r{{$i}}_{{$j}}_bid" value=""disabled="true"></div>
                        @endfor
                  </div>
               </form>
               <div class="row">
                  <div class="col-6">
                     <div class="padTop8">
                        <div class="form-control total" id="left_div{{$i}}" value="" disabled></div>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="padTop8">
                        <div class="form-control total" id="right_div{{$i}}" value="" disabled></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endif
         @endfor
      </div>
      <div class="row">
         <div class="col-12 padTop35">
            <div class="table-responsive bid-result-table">
               <table class="table">
                  <thead>
                     <tr>
                        <th>Name</th>
                        <th class="text-center">Games won</th>
                        <th class="text-center">Highest bid</th>
                        <th class="text-center">Money won/lost</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr id = "final_result0" class="last_result"></tr>
                        
                        <!-- <td class="text-center final_result"></td>
                        <td class="text-center final_result"></td>
                        <td class="text-center final_result"></td> -->
                     <tr id = "final_result1" class="last_result"></tr>
                    <!--  <tr id="user_2">
                        <td class="user_2" >Name</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                     </tr> -->
                    <!--  <tr>
                        <td></td>
                        <td></td>
                        <td class="text-center"><b>Total</b></td>
                        <td class="text-center"><b></b></td>
                     </tr> -->
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- @include('pages.js.bid_game') -->
<script type="text/javascript">
var selected_batch;
$('#displayselectedBatch').change(function () {
  $('.bid_input').val('');
  $('.total').html('');
    selected_batch = $('#displayselectedBatch').val();
    $('.displaybatchUsers').html('');
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
              $('.displaybatchUsers').html(div_data)
                $.each(data.userlist, function (i, obj) {
                    div_data = "<option value=" + obj.id + ">" + obj.user_1.name + "   " + "v/s" + "   " + obj.user_2.name + "</option>";
                    $(div_data).appendTo('.displaybatchUsers');
                });
            }
        }
    });
});

var i = 1,j = 1,index=0;
var bid_data;
var round_id;
$('.displaybatchUsers').on('change', function (e) {
$('.bid_input').val('');
  $('.total').html('');
  $('.last_result').html('');
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;

    $.ajax({
        type: "POST",
        url: "get-display-data",
        data: {
            "_token": "{{ csrf_token() }}",
            valueSelected: valueSelected,
            selected_batch : selected_batch
        },
        success: function (data) {
            if (data.status == "success") {
              console.log(data)
              bid_data = data['bid_data'];
              round_id = bid_data[0]['round_id'];
                $(".user_1").html(data.opponents[0].user_1.name)
                $(".user_2").html(data.opponents[0].user_2.name)
                $('#user_1').attr("value",data.opponents[0].user_1.name)
                $('#user_2').attr("value",data.opponents[0].user_2.name)
               //showNextBid(i=1,j=1,index=0);
             i=1; j=1;index=0;


            }
        }
    });

    console.log(valueSelected);
    $.ajax({
        type: "POST",
        url: "get-final-result",
        data: {
            "_token": "{{ csrf_token() }}",
            valueSelected: valueSelected,
        },
        success: function (data) {
            if (data.status == "success") {
              console.log(data)
              var user1_highest_bid = 0;
              var user2_highest_bid = 0;
              $.each(data.final_result, function (i, obj) {
                if(i==0){
                $("#final_result"+i).html("<td class='text-center'>"+obj.name+"</td><td class='text-center'>"+data.user1_winning_count+"</td><td id='user1_highest_bid' class='text-center'>"+obj.user1_bid+"</td><td class='text-center'>"+data.user_won1+"</td>")
                }else{
                  $("#final_result"+i).append("<td class='text-center'>"+obj.name+"</td><td class='text-center'>"+data.user2_winning_count+"</td><td id='user2_highest_bid' class='text-center'>"+obj.user2_bid+"</td><td class='text-center'>"+data.user_won2+"</td>")

                }
                if(parseFloat(user1_highest_bid) < parseFloat(obj.user1_bid))
                    user1_highest_bid = obj.user1_bid
                if(parseFloat(user2_highest_bid) < parseFloat(obj.user2_bid))
                    user2_highest_bid = obj.user2_bid

              });
              $('#user1_highest_bid').html(user1_highest_bid);
              $('#user2_highest_bid').html(user2_highest_bid);
              // if($("#user_1").val() == )
              // bid_data = data.bid_data;
              // round_id = bid_data[0]['round_id'];
              //  $(".user_1").html(data.opponents[0].user_1.name)
              //   $(".user_2").html(data.opponents[0].user_2.name)
              // console.log(data.bid_data);

            }
        }
    });



});



var no_bid = false;
  
var isZeroFound = false;
var runIsZeroFound = false;
function showNextBid(){
  
  if(index < 29){
  if(bid_data[index].user1_bid == 0.00 && bid_data[index].user_2_bid == 0.00 && !isZeroFound){
    isZeroFound = true;
    runIsZeroFound = true;
  }
}
 
  if(j > 5 || round_id != bid_data[(j-1)].round_id || bid_data.length == index || runIsZeroFound){
    if(j< 6 && (!isZeroFound || runIsZeroFound)){
    if(j%2!=0 && i%2 != 0)
      $('#right_div'+i).html('$'+(1 - bid_data[index-1]['user_2_bid']).toFixed(2));
    else
      $('#left_div'+i).html('$'+(1 - bid_data[index-1]['user1_bid']).toFixed(2));
  }else if(!isZeroFound || runIsZeroFound){
    if(i%2 == 0)
      $('#right_div'+i).html('$'+(1 - bid_data[index-1]['user_2_bid']).toFixed(2));
    else
      $('#left_div'+i).html('$'+(1 - bid_data[index-1]['user1_bid']).toFixed(2));
  }
  runIsZeroFound = false;
  if(j > 5 || round_id != bid_data[(j-1)].round_id || bid_data.length == index){
    isZeroFound = false;
    i++;
    no_bid = false;
    j = 0;
    index = index-1;
  }
    
  }
if(index <= 29){
  var run_not_bid = false;
  if(bid_data[index].user1_bid == 0.00 && bid_data[index].user_2_bid == 0.00 && !no_bid)
  {
    no_bid = true;
    run_not_bid = true;
  }
if(!run_not_bid)
{
    if(bid_data[index].user1_bid != 0.00)
    {
      $('#r'+i+'_'+j+'_bid').val(bid_data[index].user1_bid);
    }else{

      $('#r'+i+'_'+j+'_bid').val(bid_data[index].user_2_bid);
    }
}else if(run_not_bid)
{

  if(bid_data[index].user1_bid != 0.00)
    {
      $('#r'+i+'_'+j+'_bid').val('No Bid');
    }else{

      $('#r'+i+'_'+j+'_bid').val('No Bid');
    }
}
}
  j++;
  if(index <= 29)
  {
    index++; 
  }             
}


</script>
@endsection
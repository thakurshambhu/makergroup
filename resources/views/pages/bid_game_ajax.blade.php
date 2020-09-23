@foreach($game_data->rounds as $key => $round)
   @if(($key+1)%2 != 0)
   <div class="col-12 col-md-4 marTop35">
      <div class="bid-frame">
         <h6 class="text-center">Round {{$key+1}}</h6>
         <div class="error text-danger clear_error" id="error_{{$key+1}}"></div>
         <div class="row bid-box">
            <div class="col-6 user_1">Name</div>
            <div class="col-6 user_2">Name</div>
         </div>
         <form id="round_{{$key+1}}">
            <div class="row">
               @php $no_bid = false; @endphp
                  @foreach($round->bidding as $keyz => $bid)
                  @php $run_no_bid=false; if(($bid->user1_bid == 0.00 && $bid->user_2_bid == 0.00) && $round->round_complete == "1" && !$no_bid) { $no_bid = true;$run_no_bid=true;}  @endphp
                  @if(!$run_no_bid)
                  <div class="padTop8 col-6"><input type="text" class="form-control bid_input"  name="r{{$key+1}}_bid_{{$keyz+1}}" id="r{{$key+1}}_{{$keyz+1}}_bid" onchange="no_bid_check('{{$key+1}}','{{$keyz+1}}','{{$bid->id}}')" value="@if(($keyz %2 == 0) && ($bid->user1_bid != 0)){{$bid->user1_bid}}@elseif($bid->user_2_bid != 0){{$bid->user_2_bid}}@endif" check-user="@if($keyz %2 == 0) user_1 @else user_2 @endif" min="0" @if($round->round_complete == "1") disabled @endif></div>
                  @elseif($run_no_bid)
                  <div class="padTop8 col-6"><input type="text" class="form-control bid_input"  name="r{{$key+1}}_bid_{{$keyz+1}}" id="r{{$key+1}}_{{$keyz+1}}_bid" onchange="no_bid_check('{{$key+1}}','{{$keyz+1}}','{{$bid->id}}')" value="No Bid" check-user="@if($keyz %2 == 0) user_1 @else user_2 @endif" min="0" ></div>

                  @endif
                  @endforeach
                  @php $no_bid = false; @endphp
            </div>
            
         </form>
         <div class="row">
            <div class="col-6">
               <div class="padTop8">
                  <div class="form-control total" id="left_div{{$key+1}}" value="">@if($key %2 == 0 && $game_data->rounds[$key]['final_bid'] != 0) ${{$game_data->rounds[$key]['final_bid']}} @endif</div>
               </div>
            </div>
            <div class="col-6">
               <div class="padTop8">
                  <div class="form-control total" id="right_div{{$key+1}}" value="">@if($key %2 != 0 &&  $game_data->rounds[$key]['final_bid'] != 0) ${{ $game_data->rounds[$key]['final_bid']}} @endif</div>
               </div>
            </div>
         </div>
      </div>
   </div>
   @else
   <div class="col-12 col-md-4 marTop35">
      <div class="bid-frame">
         <h6 class="text-center">Round {{$key+1}}</h6>
         <div class="row bid-box">
            <div class="col-6 user_1">Name</div>
            <div class="col-6 user_2">Name</div>
         </div>
         <form id="round_{{$key+1}}">
            <div class="row">
                 @php $no_bid = false; @endphp
                  @foreach($round->bidding as $keyz => $bid)
                  @if(($keyz+1)==1)
                     <div class="padTop8 col-6"></div>
                  @endif
                   @php $run_no_bid=false; if(($bid->user1_bid == 0.00 && $bid->user_2_bid == 0.00) && $round->round_complete == "1" && !$no_bid) { $no_bid = true;$run_no_bid=true;}  @endphp
                  @if(!$run_no_bid)
                  <div class="padTop8 col-6"><input type="text" class="form-control bid_input"  name="r{{$key+1}}_bid_{{$keyz+1}}" id="r{{$key+1}}_{{$keyz+1}}_bid" onchange="no_bid_check('{{$key+1}}','{{$keyz+1}}', '{{$bid->id}}')"value="@if(($keyz %2 != 0) && ($bid->user1_bid != 0)){{$bid->user1_bid}}@elseif($bid->user_2_bid != 0){{$bid->user_2_bid}}@endif" min="0" check-user="@if($keyz %2 != 0) user_1 @else user_2 @endif" @if($round->round_complete == "1") disabled @endif></div>
                  @elseif($run_no_bid)
                  <div class="padTop8 col-6"><input type="text" class="form-control bid_input"  name="r{{$key+1}}_bid_{{$keyz+1}}" id="r{{$key+1}}_{{$keyz+1}}_bid" onchange="no_bid_check('{{$key+1}}','{{$keyz+1}}', '{{$bid->id}}')"value="No Bid" min="0" check-user="@if($keyz %2 != 0) user_1 @else user_2 @endif" ></div>
                  @endif
                  @endforeach
                  @php $no_bid = false; @endphp
            </div>
         </form>
         <div class="row">
            <div class="col-6">
               <div class="padTop8">
                  <div class="form-control total" id="left_div{{$key+1}}" value="">@if($key %2 == 0 && $game_data->rounds[$key]['final_bid'] !=0) ${{$game_data->rounds[$key]['final_bid']}} @endif</div>
               </div>
            </div>
            <div class="col-6">
               <div class="padTop8">
                  <div class="form-control total" id="right_div{{$key+1}}" value="">@if($key %2 != 0 && $game_data->rounds[$key]['final_bid'] !=0) ${{$game_data->rounds[$key]['final_bid']}} @endif</div>
               </div>
            </div>
         </div>
      </div>   
   </div>
   @endif
@endforeach
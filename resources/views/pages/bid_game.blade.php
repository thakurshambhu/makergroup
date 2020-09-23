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
               <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit</p> -->
                <div class="content-style-frame spaceTB30 col-12 question-btn-frame"><a class="btn btn-warning float-left" href="{{route('dashboard')}}">Back To Dashboard</a></div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <div class="game-input">
               <h3> Workshop </h3>
               <select class="form-control" name="selectedBatch" id="selectedBatch">
                  <option value="" selected>Select Workshop</option>
                  @foreach($batches as $batch)
                  <option value="{{$batch->id}}">{{$batch->batches}}</option>
                  @endforeach
               </select>
            </div>
         </div>
         <div class="col-md-6">
            <div class="game-input">
               <h3>Team</h3>
               <select class="form-control batchUsers">
                  <option value="">Name vs. Name</option>
               </select>
            </div>
         </div>
      </div>
      <div class="row" id="game_panel" >
         @for($i=1;$i<=6;$i++)
            @if($i%2!=0)
            <div class="col-12 col-md-4 marTop35">
               <div class="bid-frame">
                  <h6 class="text-center">Round {{$i}}</h6>
                  <div class="error text-danger clear_error" id="error_{{$i}}"></div>
                  <div class="row bid-box">
                     <div class="col-6 user_1">Name</div>
                     <div class="col-6 user_2">Name</div>
                  </div>
                  <form id="round_{{$i}}">
                     <div class="row">
                         
                           @for($j=1;$j<=5;$j++)
                           <div class="padTop8 col-6"><input type="number" class="form-control bid_input" name="r{{$i}}_bid_{{$j}}" id="r{{$i}}_{{$j}}_bid" onchange="no_bid_check('{{$i}}','{{$j}}')"value="" min="0" disabled="true"></div>
                           @endfor
                     </div>
                  </form>
                  <div class="row">
                     <div class="col-6">
                        <div class="padTop8">
                           <div class="form-control total" id="left_div{{$i}}" value=""></div>
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="padTop8">
                           <div class="form-control total" id="right_div{{$i}}" value=""></div>
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
                           <div class="padTop8 col-6"><input type="number" class="form-control bid_input" name="r{{$i}}_bid_{{$j}}" id="r{{$i}}_{{$j}}_bid" onchange="no_bid_check('{{$i}}','{{$j}}')"value="" min="0" disabled="true"></div>
                           @endfor
                     </div>
                  </form>
                  <div class="row">
                     <div class="col-6">
                        <div class="padTop8">
                           <div class="form-control total" id="left_div{{$i}}" value=""></div>
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="padTop8">
                           <div class="form-control total" id="right_div{{$i}}" value=""></div>
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
               <a class="btn btn-warning   form-control" href="{{route('playbackGamePage')}}">Playback Game</a>
               <!-- <table class="table">
                  <thead>
                     <tr>
                        <th>Name</th>
                        <th class="text-center">Games won</th>
                        <th class="text-center">Highest bid</th>
                        <th class="text-center">Money won/lost</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td class="user_1">Name</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                     </tr>
                     <tr>
                        <td class="user_2">Name</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td></td>
                        <td class="text-center"><b>Total</b></td>
                        <td class="text-center"><b></b></td>
                     </tr>
                  </tbody>
               </table> -->
            </div>
         </div>
      </div>
   </div>
</section>
@include('pages.js.bid_game')
@endsection
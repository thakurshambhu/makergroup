<div class="row">
<div class="col-md-12">
<div class="card">
   <div class="row">
      <div class="col-md-9">
         <div class="card-header">
            <h4 class="card-title"> feedback Reports</h4>
         </div>
      </div>
   </div>
   @php $total_weightage=0; $toatl_users=0;@endphp
   @foreach($dataArray as $data)
   @php $toatl_users++;  @endphp
   <div class="card-body">
      <div class="card card-nav-tabs">
         <div class="card-header card-header-warning">
            BY : {{$data['name']}}
         </div>
         <div class="card-body">
            @foreach($data['feedback_responses'] as $feedback)
            @php $total_weightage+= $feedback['weightage'];@endphp
            <h6 class="card-title">Q : {{$feedback['question']}}</h6>
            <h6 class="card-title">feedback ratings : {{$feedback['weightage']}}</h6>
            @endforeach
            <h6 class="card-title">Good Things : </h6>

            <p class="card-text" style="font-size: 10px;">{{$data['comments'][0]['liked_comment']}}</p>
            <h6 class="card-title">Improvement Scope : </h6>
            <p class="card-text">{{$data['comments'][0]['disliked_comment']}}</p>
         </div>
      </div>
   </div>
   @endforeach
   <div class="card-body">
      <div class="card card-nav-tabs">
         <div class="card-header card-header-warning">
            <h6 class="card-title"> Average Ratings : </h6>
            <p class="card-text">{{$total_weightage/$toatl_users}}</p>
         </div>
      </div>
   </div>
</div>
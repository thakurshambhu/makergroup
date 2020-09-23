@extends('layouts.app', [
'class' => '',
'elementActive' => 'feedback_dashboard'
])
@section('content')
<div class="content">
   <div id="messages">
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="row">
               <div class="col-md-9">
                  <div class="card-header">
                     <h4 class="card-title">Submit Feedbacks</h4>
                  </div>
               </div>
            <div class="card-body">
              <div class="row">
                @foreach($batch_users  as $user)
                <div class="col-md-4">
                <div class="card" style="width: 20;">
                  @if(empty($user->photo_url))
                  <img class="batch_profile_image" src="{{asset('/uploads/images/profile_picture/default-avatar.png')}}">
                    @else<img class="batch_profile_image" src="{{asset('/uploads/images/profile_picture/' . $user->photo_url)}}">
                    @endif
                    <div class="card-body">
                      <h4 class="card-title">{{$user->name}}</h4>
                      <p class="card-text"> <b>Email: </b> <a href="mailto:{{$user->email}}">{{$user->email}}</a><br> <a class="btn btn-primary" id="submit_feedback" href="{{route('getFeedBackSurvey')}}/{{$user->id}}"> Submit Feedback</a>
                        @if(session()->has('submittedUsers') && !in_array($user->id, Session::get('submittedUsers')))
                              
                        @else
                            <i class="fa fa-check" aria-hidden="true" title="Feedback Completed" style="color:#2c680b;font-size: 20px;"></i>
                        @endif
                    </div>
                  </div>
                 
                  </div>
                   @endforeach 
                </div>
              </div>
                <div class="col-md-2 offset-md-10">
                  <a type="button" class="btn btn-primary" href="{{route('dashboard')}}">Back</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
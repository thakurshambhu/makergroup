@extends('layouts.app', [
'class' => '',
'elementActive' => 'batch_details'
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
                     <h4 class="card-title">Team Details</h4>
                  </div>
               </div>
               @if(isset($userdetails))
               <div class="col-md-2">
                  <a type="button" class="btn btn-primary" href="{{ route('editTeam',$id)}}">Edit Team</a>
               </div>
            </div>
            @endif
            <div class="card-body">
               <div class="row">
                  @foreach($userdetails as $userdetail)
                  <div class="col-md-12">
                     <div class="card" style="width: 20;">
                        @if(empty($userdetail->photo_url))
                        <div class="form-row">
                           <div class="col-md-2">
                              <img class="batch_profile_image" src="{{asset('/uploads/images/profile_picture/default-avatar.png')}}">
                              @else<img class="batch_profile_image" src="{{asset('/uploads/images/profile_picture/' . $userdetail->photo_url)}}">
                              @endif
                           </div>
                           <div class=" card-body col-md-6">
                              <h4 class="card-title">{{$userdetail->name}}</h4>
                              <p class="card-text"> <b>Email: </b> <a href="mailto:{{$userdetail->email}}">{{$userdetail->email}}</a><br> <b>Workshop ID: </b> {{$userdetail->batch_id}}</p>
                           </div>
                        </div>
                     </div>
                     @endforeach 
                  </div>
               </div>
               <div class="col-md-2 offset-md-10">
                  <a type="button" class="btn btn-primary" href="{{route('listTeams')}}">Back</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
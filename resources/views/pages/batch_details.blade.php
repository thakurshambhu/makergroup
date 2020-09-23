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
                     <h4 class="card-title">Workshop Details</h4>
                  </div>
               </div>
               @if(isset($users))
               <div class="col-md-2">
                  <a type="button" class="btn btn-primary" href="{{ route('editBatch',$id)}}">Edit Workshop</a>
               </div>
            </div>
            @endif
            <div class="card-body">
               <div class="row">
                  @foreach($users as $user)
                  <div class="col-md-4">
                     <div class="card" style="width: 20;">
                        @if(empty($user->photo_url))
                        <img class="batch_profile_image" src="{{asset('/uploads/images/profile_picture/default-avatar.png')}}">
                        @else<img class="batch_profile_image" src="{{asset('/uploads/images/profile_picture/' . $user->photo_url)}}">
                        @endif
                        <div class="card-body">
                           <h4 class="card-title">{{$user->name}}</h4>
                           <p class="card-text"> <b>Email: </b> <a href="mailto:{{$user->email}}">{{$user->email}}</a><br> <b>Workshop ID: </b> {{$user->batch_id}}</p>
                        </div>
                     </div>
                  </div>
                  @endforeach 
               </div>
            </div>
            <div class="col-md-2 offset-md-10">
               <a type="button" class="btn btn-primary" href="{{route('showBatch')}}">Back</a>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
@endsection
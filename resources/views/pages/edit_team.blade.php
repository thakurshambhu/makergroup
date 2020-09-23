@extends('layouts.app', [
'class' => '',
'elementActive' => 'edit_team'
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
                     <h4 class="card-title">Edit Team</h4>
                  </div>
               </div>
               <div class="col-md-2">
                  <a type="button" class="btn btn-primary" href="{{route('listTeams')}}">Team List</a>
               </div>
            </div>

            <div class="card-body">

           <form method="POST" >
                <div class="row">
                <div class="form-group col-md-12">
                  <h4 for="Batch">Workshop ID : {{$team_details->batch_id}}</h4>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Team</label>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-4">
                  <select class="form-control batchUsers" id="team_1_user_1" name="team_1[]" value="">
                        <option value="">Select User</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}" {{ $team_details->user_1 == $user->id ? 'selected="selected"' : '' }}>{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="">v/s</label>
                </div>

                <div class="form-group col-md-4">
                  <select class="form-control batchUsers" id="team_1_user_2" name="team_1[]" value="">
                        <option value="">Select User</option>
                         @foreach($users as $user)
                        <option value="{{$user->id}}" {{ $team_details->user_2 == $user->id ? 'selected="selected"' : '' }}>{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
              </div>

                <div class="col-md-2 offset-md-10">
                  <a type="button" id="updateTeam" class="btn btn-primary">Update Team</a>
               </div>
           </form>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">

$('#updateTeam').click(function(){
 var team_id  = "{{$team_details->id}}" 

 var team_1   = $("select[name='team_1[]']")
                .map(function(){return $(this).val();}).get();
$.ajax({
        type: "POST",
        url: "{{url('/')}}/admin"+"/"+"update-team",
        data: {
            "_token": "{{ csrf_token() }}",
            team_1: team_1,
            team_id :team_id
        },
        success: function(data) {
            if (data.status == "success") {
                    $('html, body').animate({ scrollTop: 0 }, 0);
                    $("#messages").addClass("alert alert-success")
                    $('#messages').html(data.message).fadeIn('slow');
                    $("#messages").fadeOut(2000)
                } else {
                    $("#messages").addClass("alert alert-danger")
                    $('#messages').html(data.message).fadeIn('slow');
                    $("#messages").fadeOut(2000)
                }

                setInterval(function() {
                window.location.reload()
                }, 3000);
            }

        });
    });
 
 


</script>
@endsection
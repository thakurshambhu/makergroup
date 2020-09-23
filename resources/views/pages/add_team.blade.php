@extends('layouts.app', [
'class' => '',
'elementActive' => 'add_team'
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
                     <h4 class="card-title">Add Teams</h4>
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
                  <label for="selectBatch">Workshop</label>
                  <select class="form-control" id="selectedBatch" name="selectedBatch" value="">
                        <option value="">Select Workshop</option>
                        @foreach($batches as $batch)
                        <option value="{{$batch->id}}">{{$batch->batches}}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Team 1:</label>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-4">
                  <select class="form-control batchUsers" id="team_1_user_1" name="team_1[]" value="">
                        <option value="">Select User</option>
                    </select>
                </div>

                <div>
                    <label for="">v/s</label>
                </div>

                <div class="form-group col-md-4">
                  <select class="form-control batchUsers" id="team_1_user_2" name="team_1[]" value="">
                        <option value="">Select User</option>
                    </select>
                </div>
              </div>


              <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Team 2:</label>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-4">
                  <select class="form-control batchUsers" id="team_2_user_1" name="team_2[]" value="">
                        <option value="">Select User</option>
                    </select>
                </div>

                <div>
                    <label for="">v/s</label>
                </div>

                <div class="form-group col-md-4">
                  <select class="form-control batchUsers" id="team_2_user_2" name="team_2[]" value="">
                        <option value="">Select User</option>
                    </select>
                </div>
              </div>


              <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Team 3  :</label>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-4">
                  <select class="form-control batchUsers batchUsers" id="team_3_user_1" name="team_3[]" value="">
                        <option value="">Select User</option>
                       
                    </select>
                </div>

                <div>
                    <label for="">v/s</label>
                </div>

                <div class="form-group col-md-4">
                  <select class="form-control batchUsers" id="team_3_user_2" name="team_3[]" value="">
                        <option value="">Select User</option>
                    </select>
                </div>
              </div>


              <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Team 4:</label>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-4">
                  <select class="form-control batchUsers" id="team_4_user_2" name="team_4[]" value="">
                        <option value="">Select User</option>
                    </select>
                </div>

                <div>
                    <label for="">v/s</label>
                </div>

                <div class="form-group col-md-4">
                  <select class="form-control batchUsers" id="team_4_user_2" name="team_4[]" value="">
                        <option value="">Select User</option>
                    </select>
                </div>
              </div>
                <div class="col-md-2 offset-md-9">
                  <a type="button" id="createTeam" class="btn btn-primary">Create Teams</a>
               </div>


           </form>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
 $('#selectedBatch').change(function() {
    var selected_batch = $('#selectedBatch').val();
    $.ajax({
        type: "POST",
        url: "get-batch-users",
        data: {
            "_token": "{{ csrf_token() }}",
            selected_batch: selected_batch
        },
        success: function(data) {
            if (data.status == "success") {
                    $.each(data.userlist, function(i, obj) {
                        var div_data = "<option value=" + obj.id + ">" + obj.name + "</option>";
                        $(div_data).appendTo('.batchUsers');
                    });
            }

        }
    });
});


$('#createTeam').click(function(){
 var batch_id = $('#selectedBatch option:selected').val();

 var team_1   = $("select[name='team_1[]']")
                .map(function(){return $(this).val();}).get();
 var team_2   = $("select[name='team_2[]']")
                .map(function(){return $(this).val();}).get();
 var team_3   = $("select[name='team_3[]']")
                .map(function(){return $(this).val();}).get();
 var team_4   = $("select[name='team_4[]']")
                .map(function(){return $(this).val();}).get();                                          

$.ajax({
        type: "POST",
        url: "{{url('/')}}/admin/save-teams",
        data: {
            "_token": "{{ csrf_token() }}",
            team_1: team_1,
            team_2: team_2,
            team_3: team_3,
            team_4: team_4,
            batch_id :batch_id
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
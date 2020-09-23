@extends('layouts.app', [
'class' => '',
'elementActive' => 'edit_batch'
])
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.5.2/css/colReorder.dataTables.min.css
   ">
<link rel='stylesheet prefetch' href='https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css'>
<div class="content">
   <div id="messages">
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="row">
               <div class="col-md-9">
                  <div class="card-header">
                     <h4 class="card-title"> Edit Workshop</h4>
                  </div>
               </div>
               <div class="col-md-2">
                  <a type="button" class="btn btn-primary" href="{{route('showBatch')}}">Workshop List</a>
               </div>
            </div>
            <div class="alert alert-danger" id="less_select_error" hidden>Select at-least 8 users</div>
            <input type="hidden" name="selected_users" id="selected_users">
            <div class="card-body table-responsive-sm " >
              <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputName">Workshop Name <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="batch_name" id="batchName" placeholder="Workshop Name" value="{{$batch_data[0]['batches']}}">
                </div>
            </div>
               <table id="datatable" class="table" style="width:100%">
                  <thead>
                     <tr>
                        <th>
                        </th>
                        <th>Name</th>
                        <th>email</th>
                        <!-- <th>Batch ID</th> -->
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($userlist as $user)
                     <tr>
                        <td class="form-check">
                           <label class="form-check-label" style="padding-left: 8px !important;">
                                <input type="checkbox" class="form-check-input" value="{{$user->id}}" name="sur_tkn_chck[]" <?php if($user->batch_id == $id) echo 'checked'; ?>>
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
               <div class="col-md-2 offset-md-8">
                  <button type="button" class="btn btn-primary" id="submitUser">Update Workshop</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
    $('#submitUser').click(function() {
       var selected_users = new Array();
        $( "input[name='sur_tkn_chck[]']:checked" ).each( function() {
                selected_users.push( $( this ).val() );
        });
        var batch_name = $('#batchName').val();
        console.log(selected_users)
        $.ajax({
            type: "POST",
            url: "{{url('/')}}/admin/update-batch",
            data: {
              "_token": "{{ csrf_token() }}",
              "user":selected_users,
              "batch_id": "{{$id}}",
              "batch_name": batch_name,
            },
            success: function(data){
                 if (data.status == "success") { // if true (1)
                    $("#messages").addClass("alert alert-success")
                    $("#messages").addClass("")
                    $("#messages").html("Batch Updated Sucessfully!")
                    $("#messages").fadeOut(2000)
                }else{
                    $("#messages").addClass("alert alert-danger")
                    $("#messages").addClass("")
                    $("#messages").html("Now batch has no users")
                    $("#messages").fadeOut(6000)
                }
        //          setInterval(function() {
        //     window.location.reload()
        // }, 1000);
            }

        });
        
        });
       
    
     
</script>
@endsection
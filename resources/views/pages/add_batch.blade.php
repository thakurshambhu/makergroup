@extends('layouts.app', [
'class' => '',
'elementActive' => 'add_batch'
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
               <div class="col-md-8">
                  <div class="card-header">
                     <h4 class="card-title"> Create Workshop</h4>
                  </div>
               </div>
               <div class="col-md-2">
                  <a type="button" class="btn btn-primary" href="{{route('showBatch')}}">Workshop List</a>
               </div>

            </div>
            <div class="alert alert-danger" id="less_select_error" hidden>Select at-least 8 users</div>
            <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputName">Workshop Name <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="batch_name" id="batchName" placeholder="Workshop Name" value="">
                </div>
            </div>
          </div>

            <input type="hidden" name="selected_users" id="selected_users">
            <div class="card-body">
               <table id="datatable" class="table" style="width:100%">
                  <thead>
                     <tr>
                        <th>
                        </th>
                        <th>Name</th>
                        <th>email</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($userlist as $user)
                     <tr>
                         <td class="form-check">
                           <label class="form-check-label" style="padding-left: 8px !important;">
                                <input type="checkbox" class="form-check-input" value="{{$user->id}}" name="sur_tkn_chck[]">
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
                  <button type="button" class="btn btn-primary" id="submitUser">Create Workshop</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
    $('#submitUser').click(function() {
       var selected_users = new Array();
       var batch_id = "{{$last_batch_id}}";
       var batch_name = $("#batchName").val();


       
        $( "input[name='sur_tkn_chck[]']:checked" ).each( function() {
                selected_users.push( $( this ).val() );
        });
        var len = selected_users.length 
        if(len < 1 ){
            $("#messages").addClass("alert alert-danger")
            $("#messages").addClass("")
            $("#messages").html("Minimum 1 and Maximum 8 users need to be selected.")
            $("#messages").fadeOut(5000)
            return;
        }else{
        $.ajax({
            type: "POST",
            url: "{{url('/')}}/admin/save-batch",
            data: {
              "_token": "{{ csrf_token() }}",
              "user":selected_users,
              "batch_id": batch_id,
              "batch_name" : batch_name
            },
            success: function(data){
                 if (data.status == "success") { // if true (1)
                    $("#messages").addClass("alert alert-success")
                    $("#messages").addClass("")
                    $("#messages").html("Workshop Created Sucessfully!")
                    $("#messages").fadeOut(3000)
                }
                 setInterval(function() {
                window.location.reload()
              }, 3000);
            }
        });
      }
  });
</script>
@endsection
@extends('layouts.app', [
'class' => '',
'elementActive' => 'list_batches'
])
@section('content')
<div class="content">
   <div class="alert alert-success show_rest_msg" role="alert" style="display: none;">
  Pre Workshop reset successfully.
</div>
   <div class="container-fluid mt--7">
      <div class="row">
         <div class="col">
            <div class="card shadow">
               <div class="card-header border-0">
                  <div class="row align-items-center">
                     <div class="col-8">
                        <h3 class="mb-0">{{ __('Workshop List') }}</h3>
                     </div>
                     <!-- <div class="col-4 text-right">
                        <a href="{{ route('page.index', 'add_page') }}" class="btn btn-sm btn-primary">{{ __('Add Page') }}</a>
                        </div> -->
                  </div>
               </div>
               <div class="col-12">
                  @if (session('status'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     {{ session('status') }}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  @endif
               </div>
               <div class="table-responsive">
                  <table class="table" id="questionTable">
                     <thead>
                        <tr>
                           <th class="text-center">#</th>
                           <th>Name</th>
                           <th class="text-center">Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($batchlist as $index => $batch)
                        <tr>
                           <td class="text-center">{{$index +1}}</td>
                           <td>{{$batch->batches}}</td>
                           <td class="td-actions text-center">
                              <a rel="tooltip" class="btn btn-info btn-simple btn-icon btn-sm" 
                                 href="{{ route('showBatchDetails',$batch->id)}}"  title="View">
                              <i class="fa fa-file"></i>
                              </a>
                              <a rel="tooltip" class="btn btn-success btn-simple btn-icon btn-sm" 
                                 href="{{ route('editBatch',$batch->id)}}"  title="Edit">
                              <i class="fa fa-edit"></i>
                              </a>
                              <a  rel="tooltip" class="btn btn-danger btn-simple btn-icon btn-sm"
                                 href="{{ route('deleteBatch',$batch->id)}}"  title="Delete">
                              <i class="fa fa-times"></i>
                              </a>
                             <a type="button" id="reset_workshop_survey" batch-id="{{$batch->id}}" class="btn btn-danger btn-simple btn-icon btn-sm" title="Reset Pre Workshop Survey">
                             <i class="fa fa-refresh" aria-hidden="true"></i>
                              </a>
                              <div id="loadingmessage" style="display:none">
                                    <img src="{{asset('landing_page')}}/images/loading.gif">
                                  </div>
                                  <input type="hidde" id="batch_id" value="{{$batch->id}}">
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                     {{ $batchlist->links() }}
                  </table>
               </div>
               <div class="card-footer py-4">
                  <nav class="d-flex justify-content-end" aria-label="...">
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $('.view_batch').click(function(){
       var output = ''
       var batch_id = $(this).val();
       $.ajax({
           type: "POST",
           url: "{{ url('/batch-details')}}",
           data: {
               "_token": "{{ csrf_token() }}",
               batch_id,
           },
           cache: false,
   
           success: function(result) {
               console.log(result)
               if (result) { // if true (1)
                   for (var i = 0; i < result.length; i++) {
                      output += result[i].name + ' &nbsp;' + result[i].email + '<br>'
                      console.log(result)
                   }
               }
               $('.modal-body').html(output)
               $('.modal-title').html("Batch "+batch_id)
               $("#exampleModalLong").modal('show')
           }
       });
       // setInterval(function() {
       //     window.location.reload()
       // }, 2000)
   });


    $('#reset_workshop_survey').click(function(){
            $('#loadingmessage').show();
        
        var user_id = $('#reset_workshop_survey').attr('batch-id');
        var batch_id = $('#batch_id').val();
        $.ajax({
          type:'POST',
          //dataType:'JSON',
          url:"{{url('/')}}/reset-workshop-survey",
          data:{
            "_token": "{{ csrf_token() }}",           
            "batch" : batch_id,

          },
          success:function(data)
          {
            
            if(data.status == 'success')
            {
                $('#loadingmessage').hide();
                $('.show_rest_msg').show();
                setTimeout(function(){ $('.show_rest_msg').hide();  }, 3000);
            }
            
          }
        });
      });
</script>
@endsection
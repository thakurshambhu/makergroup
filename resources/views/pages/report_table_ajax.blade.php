<div class="table-responsive">
  <table class="table min-w-600" >
   <thead>
      <tr>
         <th class="text-center">#</th>
         <th>Name</th>
         <th>Email</th>
         <th class="text-center">Actions</th>
      </tr>
   </thead>
   <tbody>
      @foreach($users as $index => $user)
      <tr>
         <td class="text-center">{{$index +1}}</td>
         <td>{{$user->name}}</td>
         <td>{{$user->email}}</td>

         @if(in_array($user->id,$ids))
         <td class="td-actions text-center">
            <a rel="tooltip" class="btn btn-success btn-simple btn-icon btn-sm" 
               href="{{ route('detailReport',$user->id)}}" title="View Report">
            <i class="fa fa-file"></i>
            </a>
            <a rel="tooltip" class="btn btn-danger btn-simple btn-icon btn-sm" 
               href="{{ route('downloadReport',$user->id)}}" title="Download Report">
            <i class="fa fa-download"></i>
            </a>
            <a rel="tooltip" class="btn btn-warning btn-simple btn-icon btn-sm" 
               href="{{ route('sendReport',$user->id)}}" title="Send Report">
            <i class="fa fa-paper-plane"></i>
            </a>
           

              <!-- <input type="checkbox" @if($user->is_feedback_show==1) ? checked : 0 @endif  class='checkbox' data-id={{$user->id}}> -->
              <label class="switch" title="Deactivate feedback survey">
              @if($user->is_feedback_show==1)
             
              <input type="checkbox" class='checkbox' checked="checked" data-id={{$user->id}} >
              
               <span class="slider round"></span>
                </label>
              @else
              <label class="switch" title="Activate feedback survey">

              <input type="checkbox" class='checkbox' data-id={{$user->id}}>
              
               <span class="slider round"></span>
                </label>
              @endif
             
           

          
            
         </td>
         @else
         <td>Feedback Pending</td>
         @endif


      </tr>
      <!-- Modal -->
      @endforeach
   </tbody>
</table>
</div>

<script type="text/javascript">
   $(document).ready(function(){
      $(document).on('change', '.checkbox', function(){
      // $(".checkbox").on('change',function() {
           var user_id =  $(this).attr('data-id');
           //var is_feedback_show=0;
          if(this.checked) {
              is_feedback_show=1;
          }else{
            is_feedback_show=0;
          }
           $.ajax({
              type: "POST",
              url: "feedback_show",
              data: {
                  "_token": "{{ csrf_token() }}",
                  user_id: user_id,
                  is_feedback_show:is_feedback_show,
              },
              success: function(data) {
                      // alert(data.message);
                      // $('.table').html(data);

              }
          });
       });

   });
</script>
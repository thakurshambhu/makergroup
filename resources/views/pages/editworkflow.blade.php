@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])

@section('content')
<div class="content">
   <div class="messages"></div>
<div class="row">
         <div class="col-md-12">
            <div class="stepContainer">
               <div class="stepHeader">
                  <h3>Projects List</h3>
                  <a href="#" data-toggle="modal" data-target="#addworkFlow">Add Project</a>
                   <!-- The Modal -->
<div class="modal fade" id="addworkFlow">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
 
       <!-- Modal Header -->
       <div class="modal-header">
         <h4 class="modal-title">Add Project</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
 
       <!-- Modal body -->
       <div class="modal-body">
         <div class="workflowmessages"></div>
        

         <div class="form-group">
            <label for="">Project Name</label>
            <input type="text" class="form-control" id="workFlowName">
         </div>
         <div id="cloneWorkflow">
         <div class="wokflow_form">
         <div class="form-group userEmail">
               <button type="button" class="addButton addworkFlowButton"><i class="fas fa-plus-circle"></i></button>
               <button type="button" class="removeButton removeWorkFlowButton hideRemoveButton"><i class="fas fa-times-circle"></i></button>
            <label for="">Invite user to collaborate </label>
            
           
            <input type="email" class="form-control email" id="workflowemail1">

            <div class="workRights d-flex">
               <span>Access Rights</span>
               <div class="custom-control custom-checkbox mr-2">
                  <input type="checkbox" class="custom-control-input read" value="0" id="read1">
                  <label class="custom-control-label" id="readlabel1" for="read1">read</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input write" value="1" id="write1">
                  <label class="custom-control-label" id="writelabel1" for="write1">write</label>
                </div>
            </div>
         </div>
         </div>
         </div>
 
     <button type="button" class="btn btn-default" id="createWorkflow">Submit</button> <button type="button" class="btn btn-border" data-dismiss="modal">cancel</button>
         
        
       </div>
 
       <!-- Modal footer -->
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>
 
     </div>
   </div>
 </div>
               </div>
               <div class="stepTable">
                  <div class="table-responsive-sm">
                     <table class="table table-bordered table-workflow ">
                        <thead class="thead-light">
                           <tr>
                              <th scope="col" >name</th>
                              <th scope="col">date created </th>
                              <th scope="col" class="text-center">number of users</th>
                              <th scope="col">status</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           @if(!empty($workflows))

                           @foreach($workflows['workflow'] as $workflow)

                           <tr>
                              <td><a href="{{route('objectives')}}/{{$workflow[0]->id}}">{{$workflow[0]->name}}</a></td>
                              <td>{{$workflow[0]->created_at}}</td>
                              <td class="text-center">@php echo count($workflow['users'][0]) @endphp</td>
                              <td><span class="inporgress">in progress</span></td>
                              <td>
                                 <div class="d-flex actions"><a data-id="{{$workflow[0]->id}}" class="trash delete_workflow"><i class="fas fa-trash"></i>&nbsp;<a data-id="{{$workflow[0]->id}}" class="getWorkflow"><i class="fas fa-edit"></i></a> <a href="#" data-toggle="collapse" data-target="#expandableRow{{$workflow[0]->id}}"><i class="fas fa-chevron-down"></i></a></div>
                              </td>
                           </tr>
                           
                           <tr id="expandableRow{{$workflow[0]->id}}" class="collapse fade ">
                              <td colspan="5">
                                 <table class="table innerTable">
                                    <thead class="thead-light">
                                       
                                       <tr>
                                          <th scope="col" >email</th>
                                          <th scope="col">access rights</th>
                                          <th scope="col" colspan="2">user status</th>
                                          <th></th>
                                       </tr>
                                       
                                    </thead>
                                    <tbody>
                                      @foreach($workflow['users'][0] as $user)
                                       <tr>
                                          <td>{{$user->email}}</td>
                                          <td>@if($user->writeaccess == 1) Read, Write @else Read @endif</td>
                                          <td colspan="2" >@if($user->status == 0) Deactive @else Active @endif</td>
                                          <td><a class="trash delete_work_user" data-id="{{$user->id}}"><i class="fas fa-trash"></i></a>&nbsp;&nbsp;<a data-id="{{$user->id}}" class="getWorkflowUser"><i class="fas fa-edit"></i></a> </td>
                                       </tr>
                                     @endforeach
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                         @endforeach
                           @endif

                          
                           <tr>
                        </tbody>
                     </table>
                     <label for="">Collaborate Project List</label>
                     <table class="table table-bordered table-workflow ">
                        <thead class="thead-light">
                           <tr>
                              <th scope="col" >name</th>
                              <th scope="col" >Sent By</th>
                              <th scope="col">date created </th>
                              <!-- <th scope="col" class="text-center">number of users</th>
                              <th scope="col">status</th> -->
                              
                           </tr>
                        </thead>
                        <tbody>

                      @if(!empty($workflowbyother))
                           @foreach($workflowbyother['workflow'] as $key => $workf)
                          

                            <tr>
                              <td><a href="{{route('objectives')}}/{{$workf[0]->id}}">{{$workf[0]->name}}</a></td>
                              <td>{{$workf[0]->workflow_user->email}}</td>
                              <td>{{$workf[0]->created_at}}</td>
                             
                              
                           </tr>
                           @endforeach
                           @endif
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
           <!--  <div class="col-md-12 actionButtons">
               <div class="divider"></div>
               <a href="#" class="btn btn-default btn-md btn-block-sm">Next</a>
               <a href="#" class="btn btn-border btn-md">skip</a>
            </div> -->
         </div>
      </div>
</div>

<!--Edit Workflow Name Modal -->
<div class="modal fade" id="editworkFlow">

   <div class="modal-dialog modal-lg">
     <div class="modal-content">
 
       <!-- Modal Header -->
       <div class="modal-header">
         <h4 class="modal-title">Edit Project </h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
 <div class="wnamemessages"></div>
       <!-- Modal body -->
       <div class="modal-body">
         <div class="workflowmessages"></div>
        
          
         <div class="form-group">
            <label for="">Project Name</label>
            <input type="text" class="form-control" id="uworkFlowName">
            <input type="hidden" id="workflowid">
              <div id="ucloneWorkflow">
              <div class="uwokflow_form">
         <div class="form-group userEmail">
               <button type="button" class="addButton addworkFlowButton"><i class="fas fa-plus-circle"></i></button>
               <button type="button" class="removeButton removeWorkFlowButton hideRemoveButton"><i class="fas fa-times-circle"></i></button>
            <label for="">Invite user to collaborate </label>
            
           
            <input type="email" class="form-control uemail" id="uworkflowemail1">

            <div class="workRights d-flex">
               <span>Access Rights</span>
               <div class="custom-control custom-checkbox mr-2">
                  <input type="checkbox" class="custom-control-input" value="0" id="uread1">
                  <label class="custom-control-label" id="ureadlabel" for="uread1">read</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" value="1" id="uwrite1">
                  <label class="custom-control-label" id="uwritelabel1" for="uwrite1">write</label>
                </div>
            </div>
         </div>
         </div></div>
         </div>
                 
 
     <button type="button" class="btn btn-default" id="editWorkflowName">Submit</button> <button type="button" class="btn btn-border" data-dismiss="modal">cancel</button>
         
        
       </div>
 
       <!-- Modal footer -->
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>
 
     </div>
   </div>
 </div>


 <!-- Edit workflow user Modal -->
<div class="modal fade" id="editworkFlowUser">

   <div class="modal-dialog modal-lg">
     <div class="modal-content">
 
       <!-- Modal Header -->
       <div class="modal-header">
         <h4 class="modal-title">Edit Workflow User</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
 <div class="wnamemessages"></div>
       <!-- Modal body -->
       <div class="modal-body">
         <div class="workflowmessages"></div>
        

         <div class="workRights d-flex">
               <span>Access Rights</span>
               <div class="custom-control custom-checkbox mr-2">
                  <input type="checkbox" class="custom-control-input read" value="0" id="read">
                  <label class="custom-control-label" id="readlabel" for="read">read</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input write" value="1" id="write">
                  <label class="custom-control-label" id="writelabel" for="write">write</label>
                </div>
                <input type="hidden" id="workflowuserid">
            </div>        
 
     <button type="button" class="btn btn-default" id="editWorkflowUser">Submit</button> <button type="button" class="btn btn-border" data-dismiss="modal">cancel</button>
         
        
       </div>
 
       <!-- Modal footer -->
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>
 
     </div>
   </div>
 </div>
@include('pages.js.planning_tools')

<script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function(){
        var el = document.documentElement
        , rfs = // for newer Webkit and Firefox
               el.requestFullScreen
            || el.webkitRequestFullScreen
            || el.mozRequestFullScreen
            || el.msRequestFullScreen
        ;
        if(typeof rfs!="undefined" && rfs){
          rfs.call(el);
        } else if(typeof window.ActiveXObject!="undefined"){
          // for Internet Explorer
          var wscript = new ActiveXObject("WScript.Shell");
          if (wscript!=null) {
             wscript.SendKeys("{F11}");
          }
        }
    });
  }, 1000);
    
</script> 
@endsection
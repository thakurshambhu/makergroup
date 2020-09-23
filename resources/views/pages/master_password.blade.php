@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'admin',
])

@section('content')
    <div class="content">
        <div class="container-fluid mt--7">
            <div class="row">
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
                <div class="col-xl-6 offset-xl-3 order-xl-6">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <h3 class="mb-0">Create Master Password</h3>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('saveMasterPassword') }}" autocomplete="off">
                                @csrf
                                
                                <div class="pl-lg-4">
                                   
                                   
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-password">Master Password</label>
                                        <input type="password" name="mpassword" id="input-mpassword" class="form-control form-control-alternative" placeholder="Master Password" value="@if(isset($password[0]->password)){{base64_decode($password[0]->password)}}@endif" required>&nbsp;
                                    <input type='checkbox' id='toggle' value='0'>&nbsp; <span id='toggleText'>Show</span>
                                        
                                        
                                    </div>
                            

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
 $("#toggle").change(function(){
  
  // Check the checkbox state
  if($(this).is(':checked')){
   // Changing type attribute
   $("#input-mpassword").attr("type","text");
   
   // Change the Text
   $("#toggleText").text("Hide");
  }else{
   // Changing type attribute
   $("#input-mpassword").attr("type","password");
  
   // Change the Text
   $("#toggleText").text("Show");
  }
 
 });
});
</script>>
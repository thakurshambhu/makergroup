@extends('layouts.app', [
'class' => '',
'elementActive' => 'add_page'
])
@section('content')
<div class="content">
   <div id="messages">
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="row">
               <div class="col-md-10">
                  <div class="card-header">
                     <h4 class="card-title"> Add Page Details</h4>
                  </div>
               </div>
               <div class="col-md-2">
                  <a type="button" class="btn btn-warning" href="{{route('detailPageList')}}">Back</a>
               </div>
            </div>
            <div class="card-body">
               <form method="post" id="addDetailPage" action="{{route('saveDetailsPage')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                     <div class="form-group col-md-12">
                        <label for="inputName">Name <span style="color: red">*</span></label>
                        <select  class="form-control" name="pageName" id="pageName" placeholder="Name (E.g: Negotiation )" value="">
                           <option value="">Select Parent Page</option>
                           @foreach($homePageContents as $homePageContent)
                           <option value="{{$homePageContent->name}}">{{$homePageContent->name}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group col-md-12">
                        <label for="inputTitle">Title <span style="color: red">*</span></label>
                        <input type="text"  class="form-control" name="pageTitle" id="pageTitle" placeholder="Title (E.g: LV 1 )" value="">
                     </div>
                     <div class="form-group col-md-12">
                        <label for="inputTitle">Subtitle <span style="color: red">*</span></label>
                        <input type="text"  class="form-control" name="pageSubtitle" id="pageSubtitle" placeholder="Subtitle (E.g: Your introduction to all things negotiation
                           )" value="">
                     </div>
                     <div class="form-group col-md-12">
                        <label for="inputDescription">Description <span style="color: red">*</span></label>
                        <textarea type="text"  class="form-control" name="inputDescription" id="inputDescription" placeholder="Description" value=""></textarea>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="inputKeyFeature1">Key Feature 1 <span style="color: red">*</span></label>
                           <input type="text"  class="form-control" name="pageKeyFeature1" id="pageKeyFeature1" placeholder="Key Feature 1 (E.g: 12+ ppl)" value="" required="">
                        </div>
                        <div class="col-md-6">
                           <label for="inputKeyFeature1">Icon for Key Feature 1 <span style="color: red">*</span></label>
                           <input type="file"  class="form-control" name="pageKeyFeature1Icon" id="pageKeyFeature1Icon" placeholder="Key Feature 1 Icon (.png)" value="" required="">
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="inputKeyFeature2">Key Feature 2 <span style="color: red">*</span></label>
                           <input type="text"  class="form-control" name="pageKeyFeature2" id="pageKeyFeature2" placeholder="Key Feature 2 (E.g: 1-4 hours)" value="" required>
                        </div>
                        <div class="col-md-6">
                           <label for="inputKeyFeature2">Icon for Key Feature 2 <span style="color: red">*</span></label>
                           <input type="file"  class="form-control" name="pageKeyFeature2Icon" id="pageKeyFeature2Icon" placeholder="Key Feature 2 Icon (.png)" value="" required="">
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="inputKeyFeature3">Key Feature 3 <span style="color: red">*</span></label>
                           <input type="text"  class="form-control" name="pageKeyFeature3" id="pageKeyFeature3" placeholder="Key Feature 3 (E.g:Interactive)" value="" required>
                        </div>
                        <div class="col-md-6">
                           <label for="inputKeyFeature3">Icon for Key Feature 3 <span style="color: red">*</span></label>
                           <input type="file"  class="form-control" name="pageKeyFeature3Icon" id="pageKeyFeature3Icon" placeholder="Key Feature 3 Icon (.png)" value="" required="">
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="inputKeyFeature4">Key Feature 4 <span style="color: red">*</span></label>
                           <input type="text"  class="form-control" name="pageKeyFeature4" id="pageKeyFeature4" placeholder="Key Feature 4 (E.g: On site/Residential)" value="" required>
                        </div>
                        <div class="col-md-6">
                           <label for="inputKeyFeature4">Icon for Key Feature 4 <span style="color: red">*</span></label>
                           <input type="file"  class="form-control" name="pageKeyFeature4Icon" id="pageKeyFeature4Icon" placeholder="Key Feature 4 Icon (.png)" value="" required="">
                        </div>
                     </div>
                     <div class="form-group col-md-12">
                        <label for="inputClientQuote">Client Quote</label>
                        <textarea type="text"  class="form-control" name="pageClientQuote" id="pageClientQuote" placeholder='Client quote 4 (E.g: "Lorem Ipsum is simply dummy text of the printing and typesetting industry"  -Auther)'value=""></textarea>
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="pageStatus">Status <span style="color: red">*</span></label>
                        <select class="form-control" id="pageStatus" name="pageStatus" value="">
                           <option value="">Select Status</option>
                           <option value="Active">Active</option>
                           <option value="Inactive">Inactive</option>
                        </select>
                     </div>
                  </div>
                  <button type="button" id="submit" class="btn btn-primary">Submit</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
        
$(document).ready(function(){
    $("#addDetailPage").validate({
      rules: {
        pageName: {
            required: true,
        },
          pageTitle: {
            required: true,
        },
          pageSubtitle: {
            required: true,
        },
        inputDescription: {
            required: true,
        },
         pageKeyFeature1: {
            required: true,
        },
          pageKeyFeature2: {
            required: true,
        },
          pageKeyFeature3: {
            required: true,
        },
          pageKeyFeature4: {
            required: true,
        },
        pageClientQuote: {
            required: true,
        },
        pageStatus: {
          required: true,  
        }
        },
        highlight: function (element) {
            $(element).parent().addClass('error')
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('error')
        }
    });
});


$('#submit').click(function(){
    var form = $('#addDetailPage')[0]; // You need to use standard javascript object here
    var formData = new FormData(form);
    console.log(formData)

    $.ajax({
    url: "{{url('/')}}"+"/"+"save-detail-page",
    data: formData,
    type: 'POST',
    contentType: false, 
    processData: false, 
    success: function(data){
            if(data.status == "success"){
                $('html, body').animate({ scrollTop: 0 }, 0);
                $("#messages").addClass("alert alert-success")
                $('#messages').html(data.message).fadeOut(5000); 
            }else{
                $('html, body').animate({ scrollTop: 0 }, 0);
                $("#messages").addClass("alert alert-danger")
                $('#messages').html(data.message).fadeOut(5000); 
            }
                setInterval(function() {
                window.location.reload()
                }, 3000);
            },

  
    });
});
    </script>
@endsection
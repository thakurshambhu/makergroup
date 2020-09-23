@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'edit_detail_page'
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
                                <h4 class="card-title"> Edit Page Details</h4>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a type="button" class="btn btn-warning" href="{{route('detailPageList')}}">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" id="editDetailPage" action="{{route('updateDetailsPage')}}/{{$pageData->id}}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputName">Name <span style="color: red">*</span></label>
                                    <select  class="form-control" name="pageName" id="pageName" placeholder="Name (E.g: Negotiation )" value="">
                                       <option value="">Select Parent Page</option>
                                            @foreach($homePageContents as $homePageContent)
                                            
                                            <option value="{{$pageData->page_name}}"{{($pageData->page_name == $homePageContent->name)?'selected' : ''}}>{{$homePageContent->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                 <div class="form-group col-md-12">
                                    <label for="inputTitle">Title <span style="color: red">*</span></label>
                                    <input type="text"  class="form-control" name="pageTitle" id="pageTitle" placeholder="Title (E.g: LV 1 )" value="{{$pageData->title}}">
                                </div>

                                 <div class="form-group col-md-12">
                                    <label for="inputTitle">Subtitle <span style="color: red">*</span></label>
                                    <input type="text"  class="form-control" name="pageSubtitle" id="pageSubtitle" placeholder="Subtitle (E.g: Your introduction to all things negotiation
 )" value="{{$pageData->subtitle}}">
                                </div>

                                 <div class="form-group col-md-12">
                                    <label for="inputDescription">Description <span style="color: red">*</span></label>
                                    <textarea type="text"  class="form-control" name="inputDescription" id="inputDescription" placeholder="Description">{{$pageData->description}}</textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputKeyFeature1">Key Feature 1 <span style="color: red">*</span></label>
                                        <input type="text"  class="form-control" name="pageKeyFeature1" id="pageKeyFeature1" placeholder="Key Feature 1 (E.g: 12+ ppl)" value="{{($pageData->keyfeature1) }}" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputKeyFeature1">Icon for Key Feature 1 <span style="color: red">*</span></label>
                                        <input type="file"  class="form-control" name="pageKeyFeature1Icon" id="pageKeyFeature1Icon" placeholder="Key Feature 1 Icon (.png)" value="{{$pageData->kfIcon1}}" required="">
                                        <input type="hidden" name="alt_pageKeyFeature1Icon" value="{{$pageData->kfIcon1}}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputKeyFeature2">Key Feature 2 <span style="color: red">*</span></label>
                                        <input type="text"  class="form-control" name="pageKeyFeature2" id="pageKeyFeature2" placeholder="Key Feature 2 (E.g: 1-4 hours)" value="{{$pageData->keyfeature2}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputKeyFeature2">Icon for Key Feature 2 <span style="color: red">*</span></label>
                                        <input type="file"  class="form-control" name="pageKeyFeature2Icon" id="pageKeyFeature2Icon" placeholder="Key Feature 2 Icon (.png)" value="{{$pageData->kfIcon2}}" required="">
                                        <input type="hidden" name="alt_pageKeyFeature2Icon" value="{{$pageData->kfIcon2}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputKeyFeature3">Key Feature 3 <span style="color: red">*</span></label>
                                        <input type="text"  class="form-control" name="pageKeyFeature3" id="pageKeyFeature3" placeholder="Key Feature 3 (E.g:Interactive)" value="{{$pageData->keyfeature3}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputKeyFeature3">Icon for Key Feature 3 <span style="color: red">*</span></label>
                                        <input type="file"  class="form-control" name="pageKeyFeature3Icon" id="pageKeyFeature3Icon" placeholder="Key Feature 3 Icon (.png)" value="{{$pageData->kfIcon3}}" required="">
                                        <input type="hidden" name="alt_pageKeyFeature3Icon" value="{{$pageData->kfIcon3}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputKeyFeature4">Key Feature 4 <span style="color: red">*</span></label>
                                        <input type="text"  class="form-control" name="pageKeyFeature4" id="pageKeyFeature4" placeholder="Key Feature 4 (E.g: On site/Residential)" value="{{$pageData->keyfeature4}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputKeyFeature4">Icon for Key Feature 4 <span style="color: red">*</span></label>
                                        <input type="file"  class="form-control" name="pageKeyFeature4Icon" id="pageKeyFeature4Icon" placeholder="Key Feature 4 Icon (.png)" value="{{$pageData->kfIcon4}}" required="">
                                        <input type="hidden" name="alt_pageKeyFeature4Icon" value="{{$pageData->kfIcon4}}">
                                    </div>
                                 </div>

                                 <div class="form-group col-md-12">
                                    <label for="inputClientQuote">Client Quote</label>
                                    <textarea type="text"  class="form-control" name="pageClientQuote" id="pageClientQuote" placeholder='Client quote 4 (E.g: "Lorem Ipsum is simply dummy text of the printing and typesetting industry"  -Auther)'value="">{{$pageData->client_quote}}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">

                                          <label for="pageStatus">Status <span style="color: red">*</span></label>
                                          <select class="form-control" id="pageStatus" name="pageStatus" value="">
                                                <option value="">Select Status</option>
                                                <option value="Active"  {{($pageData->status == "Active")?'selected' : ''}}>Active</option>
                                                <option value="Inactive"  {{($pageData->status == "Inactive")?'selected' : ''}}>Inactive</option>
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

    $('#submit').click(function(){
    var form = $('#editDetailPage')[0]; // You need to use standard javascript object here
    var formData = new FormData(form);

    $.ajax({
    url: "{{url('/')}}"+"/admin/"+"update-detail-page/"+"{{$pageData->id}}",
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
        
$(document).ready(function(){
    $("#editDetailPage").validate({
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
        status: {
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

    </script>
@endsection
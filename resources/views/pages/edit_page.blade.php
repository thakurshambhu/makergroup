@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'add_page'
])
@section('content')
    <div class="content">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-10">
                    <div class="card-header">
                        <h4 class="card-title"> Edit Page</h4>
                    </div>
                </div>
                <div class="col-md-2">
                    <a type="button" class="btn btn-warning" href="{{route('showPages')}}">Back</a>
                </div>
            </div>
                    <div class="card-body">
                        <form method="post" id="editStaticPage" action="{{action('PageController@savePage',$id )}}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputName">Name <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="pageName" id="pageName" placeholder="Name (E.g: Negotiation )" value="{{$pageData->name}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputName">Title 1 <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="pageTitle1" id="pageTitle1" placeholder="Title (E.g: NEGOTIATION / LV1
)" value="{{$pageData->title1}}">
                                </div>
                            </div>
                            <div class="form-group">
                                  <label for="inputDescription">Description 1 </label>
                                  <textarea class="form-control" id="pageDescription1" name="pageDescription1" placeholder="Description1">{{$pageData->description1}}</textarea> 
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputName">Title 2 <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="pageTitle2" id="pageTitle2" placeholder="Title (E.g: NEGOTIATION / LV2
)" value="{{$pageData->title2}}">
                                </div>
                            </div>

                            <div class="form-group">
                                  <label for="inputDescription">Description 2 </label>
                                  <textarea class="form-control" id="pageDescription2" name="pageDescription2" placeholder="Description">{{$pageData->description2}}</textarea> 
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputName">Title 3 <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="pageTitle3" id="pageTitle3" placeholder="Title (E.g: NEGOTIATION / LV3
)" value="{{$pageData->title3}}">
                                </div>
                            </div>

                            <div class="form-group">
                                  <label for="inputDescription">Description 3 </label>
                                  <textarea class="form-control" id="pageDescription3" name="pageDescription3" placeholder="Description">{{$pageData->description3}}</textarea> 
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">

                                      <label for="inputDescription">Status</label>
                                      <select class="form-control" id="pageStatus" name="pageStatus" value="{{$pageData->status}}">
                                            <option value="">Select Status</option>
                                            <option value="Active"
                                                {{($pageData->status == "Active")?'selected' : ''}}>Active</option>
                                            <option value="Inactive"
                                                {{($pageData->status == "Inactive")?'selected' : ''}}>Inactive</option>
                                        </select>
                                </div>
                        </div>
                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
<script type="text/javascript">
        
$(document).ready(function(){
    $("#editStaticPage").validate({
      rules: {
        pageName: {
            required: true,
        },
          pageTitle1: {
            required: true,
        },
          pageTitle2: {
            required: true,
        },
        pageTitle3: {
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
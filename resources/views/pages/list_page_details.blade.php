@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'list_details_page'
])

@section('content')
    <div class="content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Details Page List') }}</h3>
                                </div>
                                 <div class="col-4 text-right">
                                    <a href="{{route('addDetailPage')}}" class="btn btn-sm btn-primary">{{ __('Add Page') }}</a>
                                 </div>
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
                            <table class="table">
                               
                                
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Name</th>
            <th>Title</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
         @foreach($pageDetails as $index => $pageDetail)
        <tr>
            <td class="text-center">{{$index +1}}</td>
            <td>{{$pageDetail->page_name}}</td>
            <td>{{$pageDetail->title}}</td>
            <td>{{$pageDetail->status}}</td>

            <td class="td-actions text-center">
                <button type="button" rel="tooltip" class="btn btn-info btn-simple btn-icon btn-sm" data-toggle="modal" data-target="#exampleModalLong{{$pageDetail->id}}">
                    <i class="fa fa-file"></i>
                </button>
                <a rel="tooltip" class="btn btn-success btn-simple btn-icon btn-sm" 
                href="{{route('editDetailPage', $pageDetail->id)}}">
                    <i class="fa fa-edit"></i>
                </a>

                <a  rel="tooltip" class="btn btn-danger btn-simple btn-icon btn-sm"
                href="{{route('deleteDetailPage', $pageDetail->id)}}">
                    <i class="fa fa-times"></i>
                </a>
            </td>
        </tr>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong{{$pageDetail->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 style="float: left;" class="modal-title" id="exampleModalLongTitle">{{$pageDetail->page_name}} / {{$pageDetail->title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                        <div class="col-md-12">
                            <div>
                                <b><span>Title : </span> </b>{{$pageDetail->title}}
                            </div>        
                        </div>
                        <div class="col-md-12">
                            <div>
                                <b><span>Subtitle : </span> </b>{{$pageDetail->subtitle}}
                            </div>        
                        </div>
                        <div class="col-md-12">
                            <div>
                                <b><span>Description : </span> </b>{{$pageDetail->description}}
                            </div>        
                        </div>
                        <div class="col-md-12">
                            <div>
                                <b><span>Key Features : </span> </b>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div>
                                                {{$pageDetail->keyfeature1}}
                                            </div>       
                                        </div>
                                        <div class="col-md-3">
                                            <div>
                                                {{$pageDetail->keyfeature2}}
                                            </div>       
                                        </div>
                                        <div class="col-md-3">
                                            <div>
                                                {{$pageDetail->keyfeature3}}
                                            </div>       
                                        </div>
                                        <div class="col-md-3">
                                            <div>
                                                {{$pageDetail->keyfeature4}}
                                            </div>       
                                        </div>
                                    </div>
                            </div>        
                        </div>
                        
                    <div class="col-md-12">
                            <div>
                                <b><span>Client Quote : </span> </b>{{$pageDetail->client_quote}}
                            </div>        
                        </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div>
                                <b><span>Status : </span> </b>{{$pageDetail->status}}
                            </div>        
                        </div>
                    </div>
                    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </tbody>
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
@endsection
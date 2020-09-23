@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'list_questions'
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
                                    <h3 class="mb-0">{{ __('Questions List') }}</h3>
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

                        <div class="table">
                            <table class="table" >
                               
                                
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Name</th>
            <th>Question</th>
            <th>Survey</th>
            <th>Bucket</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
         @foreach($questions as $index => $question)
        <tr>
            <td class="text-center">{{($questions->CurrentPage()*10-10)+$index+1}}</td>
            <td>{{$question->name}}</td>
            <td>{{$question->question}}</td>
            <td>{{$question->survey}}</td>
            <td>{{$question->bucket_id}}</td>
            <td>{{$question->question_status}}</td>

            <td class="td-actions text-center">
               
                <a rel="tooltip" class="btn btn-success btn-simple btn-icon btn-sm" 
                href="{{ route('editQuestion',$question->id)}}">
                    <i class="fa fa-edit"></i>
                </a>

                <a  rel="tooltip" class="btn btn-danger btn-simple btn-icon btn-sm"
                href="{{ route('deleteQuestion',$question->id)}}">
                    <i class="fa fa-times"></i>
                </a>
            </td>
        </tr>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 style="float: left;" class="modal-title" id="exampleModalLongTitle">{{$question->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <div>
                        <b>{{$question->title1}}</b>
                    </div>
                    <div>
                        {{$question->description1}}
                    </div>

                    <div>
                        <b>{{$question->title2}}</b>
                    </div>
                    <div>
                        {{$question->description2}}
                    </div>

                    <div>
                        <b>{{$question->title3}}</b>
                    </div>
                    <div>
                        {{$question->description3}}
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
{{ $questions->links() }}
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
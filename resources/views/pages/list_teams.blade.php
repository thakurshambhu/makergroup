@extends('layouts.app', [
'class' => '',
'elementActive' => 'list_teams'
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
                        <h3 class="mb-0">{{ __('Teams List') }}</h3>
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
                           <th>Teams</th>
                           <th>Workshop</th>
                           <th class="text-center">Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($teams as $index => $team)
                        <tr>
                           <td class="text-center">{{($teams->CurrentPage()*10-10)+$index +1}}</td>
                           <td>Team {{$team->id}}</td>
                           <td> Batch {{$team->batch_id}}</td>
                           <td class="td-actions text-center">

                              <a rel="tooltip" class="btn btn-success btn-simple btn-icon btn-sm" 
                                 href="{{route('teamDetails',$team->id)}}">
                              <i class="fa fa-file"></i>
                              </a>
                              <a  rel="tooltip" class="btn btn-danger btn-simple btn-icon btn-sm"
                                 href="{{ route('deleteTeam',$team->id)}}">
                              <i class="fa fa-times"></i>
                              </a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                     {{ $teams->links() }}
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
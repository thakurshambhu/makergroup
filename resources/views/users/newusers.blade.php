@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'user'
])

@section('content')
    <div class="content px-0">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow px-2">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Users') }}</h3>
                                </div>
                                <!-- <div class="col-4 text-right">
                                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Add user') }}</a>
                                </div> -->
                            </div>
                        </div>
                        
                        <div class="col-12">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                        </div>

                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('Name') }}</th>
                                        <th scope="col">{{ __('Email') }}</th>
                                        <th scope="col">{{ __('Role') }}</th>
                                        <th scope="col">{{ __('Creation Date') }}</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                            </td>
                                            @if($user->role_id == 1)
                                            <td>Super Admin</td>
                                            @elseif($user->role_id == 2)
                                            <td>Admin</td>
                                            @else
                                            <td>User</td>
                                           @endif
                                            <td data-sort="{{ $user->created_at->format('Ymd') }}">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                               <a title="Activate User" class="btn btn-success btn-simple btn-icon btn-sm btn-check" href="{{ route('activeuser',$user->id) }}/">
                              <i class="fa fa-check"></i>
                              </a> 
                                            </td>
                                        </tr>
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

    <script type="text/javascript">
        $( document ).ready(function() {
        $('#datatable').DataTable();
        $('input').addClass("form-control");
        $('input').addClass("search-box");
        $(".search-box").attr("placeholder", "Type here to search");
        // $("#datatable_paginate").fadeOut();
        $("#datatable_length").fadeOut();

    } );

    </script>
@endsection
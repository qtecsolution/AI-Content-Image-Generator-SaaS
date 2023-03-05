@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">
        @if ($data->type == 'user')
            <a href="{{ route('users.index') }}"> User </a>
        @else
            <a href="{{ route('admin.all') }}"> Admin </a>
        @endif
    </li>
    <li class="breadcrumb-item active"> Details</li>
@endsection

@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">

            <div class="col-md-12">
                <div class="my-projects">
                    <div class="my-projects-header border-bottom">
                        <h5 class="header-title text-capitalize"> {{ $data->type }} Information</h5>
                        <div class="project-button pull-right">
                            @if ($data->type == 'user')
                            <a href="{{ route('users.index') }}" class="btn btn-light btn-sm">
                                <i class="fa fa-list"></i>
                                Users List
                            </a>
                            @else
                            <a href="{{ route('admin.all') }}" class="btn btn-light btn-sm">
                                <i class="fa fa-list"></i>
                                Admin List
                            </a>
                            @endif
                           
                        </div>
                    </div>
                    <div class="my-projects-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="card">
                                    <div class="p-2">
                                        @if ($data->avatar != '' && file_exists($data->avatar))
                                            <img src="{{ asset($data->avatar) }}" alt="{{ $data->name }}"
                                                style="max-width:150px">
                                        @else
                                            <img src="{{ asset('assets/images/placeholder.png') }}"
                                                alt="{{ $data->name }}" style="max-width:150px">
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"> {{ $data->name }} <a
                                                href="{{ route('users.edit', $data->id) }}"><i class="fa fa-edit"></i></a>
                                        </h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"> <b> Email: </b> {{ $data->email }} </li>
                                        <li class="list-group-item"> <b> Phone: </b> {{ $data->phone }} </li>
                                        <li class="list-group-item"> <b> Address: </b> {{ $data->address ?? '' }} </li>
                                        @if ($data->type == 'user')
                                        <li class="list-group-item"> <b> Plan: </b> {{ $data->plan->name ?? '' }} </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

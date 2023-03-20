@extends('layouts.app')
@section('title','Admin')
@section('breadcrumb')
    <li class="breadcrumb-item active">Admin</li>
@endsection

@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">

            <div class="col-md-12">
                <div class="my-projects">
                    <div class="my-projects-header border-bottom">
                        <h4 class="header-title">All Admin</h4>
                        <div class="project-button pull-right">
                            <a href="{{ route('users.create') }}" class="btn btn-light btn-xs"> <i
                                    class="fa fa-plus-circle"></i> New </a>
                        </div>
                    </div>
                    <div class="my-projects-body">

                        <div class="project-table-wrapper p-3">

                            <table class="project-table table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allData as $data)
                                        <tr>
                                            <td> {{ $data->name }} </td>
                                            <td> {{ $data->email }} </td>
                                            <td> {{ $data->phone }} </td>
                                            <td>
                                                @if ($data->is_active == 1)
                                                    <span class="text-success"> Active </span>
                                                @else
                                                    <span class="text-danger"> Active </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="action-wrapper">
                                                    <a class="text-success" title="User Details" href="{{route('users.show',$data->id)}}">
                                                        <i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-success" title="Edit User Information" href="{{route('users.edit',$data->id)}}">
                                                        <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                                    </a>
                                                    @if($data->id!=1)
                                                    <a class="text-danger" title="Delete User" href="javascript:void(0)" type="button"
                                                        onclick="resourceDelete('{{ route('users.destroy', $data->id) }}')">
                                                        <i class="fa fa-trash-o fa-lg"></i>
                                                    </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

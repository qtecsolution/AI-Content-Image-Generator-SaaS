@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">All Users</li>
@endsection

@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">

            <div class="col-md-12">
                <div class="my-projects">
                    <div class="my-projects-header">
                        <h4 class="header-title">All Users</h4>
                        <div class="project-button pull-right">
                            <a href="{{ route('user.create') }}" class="btn btn-light btn-xs"> <i class="fa fa-plus-circle"></i> Create User </a>
                        </div>
                    </div>
                    <div class="my-projects-body">

                        <div class="project-table-wrapper">

                            <div class="searchbox">
                                <span class="search-icon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                                <input type="text" name="" id="searchINputField">

                                <div class="right-text">
                                    <span>Delete</span>
                                    <span class="selected">selected 4</span>
                                    <span>Media posts </span>
                                </div>
                            </div>


                        <table class="project-table table" id="projectTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Avatar</th>
                                    <th scope="col">Plan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->index + 1 }}</td>
                                      
                                        <td>{{ $item->name }} </td>
                                        <td>  {{ $item->email }}</td>
                                        <td>  {{ $item->phone }}</td>
                                        
                                        <td class="text-upper">{{$item->type}}</td>
                                        <td>
                                            <img src="{{ asset($item->avatar) }}" width="40" height="40">
                                        </td>
                                        <td>
                                            {{ $item->plan->name ?? '' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('user.show', $item->id) }}" class="btn btn-success btn-xs"><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning btn-xs"><i
                                                    class="fa fa-edit"></i></a>
                                            <a onclick="resourceDelete('{{ route('user.destroy', $item->id) }}')" class="btn btn-danger btn-xs"><i
                                                    class="fa fa-trash"></i></a>
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

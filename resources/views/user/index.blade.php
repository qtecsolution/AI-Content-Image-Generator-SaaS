@extends('layouts.app')
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">

            <div class="col-md-12">
                <div class="card custom">
                    <div class="card-header bg-default">
                        <h5 class="card-title no-margin">All Users</h5>
                        <div class="card-button">
                            <a href="{{ route('user.create') }}" class="btn btn-success btn-xs">
                                <i class="fa fa-add"></i>
                                Create User
                            </a>
                        </div>
                    </div>
                    <div class="card-body project-table-wrapper">
                        <table class="project-table" id="projectTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Avatar</th>
                                    <th scope="col">Plan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                      
                                        <td>{{ $item->name }} <br>
                                            {{ $item->email }}<br>
                                            {{ $item->phone }}<br>
                                        </td>
                                        <th class="text-upper">{{$item->type}}</th>
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

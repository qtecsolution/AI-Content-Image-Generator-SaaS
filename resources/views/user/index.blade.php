@extends('layouts.app')
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">

            <div class="col-md-12">
                <div class="card custom">
                    <div class="card-header bg-info">
                        <h5 class="card-title no-margin color-white">All Users</h5>
                        <div class="card-button">
                            <a href="{{ route('user.create') }}" class="btn btn-success btn-xs">
                                <i class="fa fa-add"></i>
                                Create User
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
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
                                        <td>
                                            <img src="{{ asset($item->avatar) }}" width="40" height="40">
                                        </td>
                                        <td>
                                            {{ $item->plan->name ?? '' }}
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

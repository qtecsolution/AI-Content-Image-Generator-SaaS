@extends('layouts.app')
@section('title', 'Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <section class="my-projects">

            <div class="my-projects-header border-bottom">
                <h4 class="header-title">Dashboard</h4>
            </div>
            <div class="my-projects-body mt-2">
                <div class="row">
                    <div class="col-3">
                        <div class="card text-center">
                            <h5 class="card-header bg-light"> <i class="fa fa-users"></i> Total Users</h5>
                            <div class="card-body">
                                <h4> {{ $totalUser }} </h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card text-center">
                            <h5 class="card-header bg-light"> <i class="fa fa-file"></i> Total Use Case</h5>
                            <div class="card-body">
                                <h4> {{ totalUseCase() }} </h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card text-center">
                            <h5 class="card-header bg-light">
                                <i class="fa fa-bolt"></i> Current Month Transection
                            </h5>
                            <div class="card-body">
                                <h4> {{ $salesData->count() }} </h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card text-center">
                            <h5 class="card-header bg-light"> <i class="fa fa-credit-card"></i> Current Month Revenue</h5>
                            <div class="card-body">
                                <h4> {{ $salesData->sum('total') }} </h4>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="card custom">
                            <div class="card-header bg-light">
                                <h5 class="card-title no-margin">Recent Transection</h5>
                                <div class="card-button">
                                    <a href="{{ route('order.index') }}" class="btn btn-light btn-sm"> <i
                                            class="fa fa-list"></i> See All </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Invoice</th>
                                            <th scope="col">Users</th>
                                            <th scope="col">Plan</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $item)
                                            <tr>
                                                <th scope="row">{{ $item->invoice }}</th>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->plan->name }}</td>
                                                <td>{{ dateTimeFormat($item->created_at) }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card custom">
                            <div class="card-header bg-light">
                                <h5 class="card-title no-margin">Recent Users</h5>
                                <div class="card-button">
                                    <a href="{{ route('users.all') }}" class="btn btn-light btn-sm"> <i
                                            class="fa fa-list"></i> See All </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Plan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recentUsers as $userIndex => $user)
                                            <tr>
                                                <th scope="row">{{ $userIndex + 1 }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td> {{ $user->plan->name ?? 'No Plan ' }} </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

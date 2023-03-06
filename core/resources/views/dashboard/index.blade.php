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
                                <p> Users </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card text-center">
                            <h5 class="card-header bg-light"> <i class="fa fa-file"></i> Total Use Case</h5>
                            <div class="card-body">
                                <h4> {{ totalUseCase() }} </h4>
                                <p> Use Case </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card text-center">
                            <h5 class="card-header bg-light"> <i class="fa fa-bolt"></i> Monthly Transection</h5>
                            <div class="card-body">
                                <h4> 20 </h4>
                                <p>Fab 01 - Mar 01</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card text-center">
                            <h5 class="card-header bg-light"> <i class="fa fa-credit-card"></i> Monthly Revenue</h5>
                            <div class="card-body">
                                <h4> 20 </h4>
                                <p>Fab 01 - Mar 01</p>
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
                                    <a href="" class="btn btn-light btn-sm"> <i class="fa fa-list"></i> See All </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Trx ID</th>
                                            <th scope="col">Gateway</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
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
                                    <a href="" class="btn btn-light btn-sm"> <i class="fa fa-list"></i> See All </a>
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
                                                <td> {{ $user->plan->name ?? '' }} </td>
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

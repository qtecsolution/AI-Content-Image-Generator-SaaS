@extends('layouts.app')
@section('title', 'Transactions')
@section('breadcrumb')
    <li class="breadcrumb-item">Transactions</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
            <div class="col-md-12">
                <div class="my-projects">
                    <div class="my-projects-header border-bottom mb-3">
                        <h5 class="header-title">My Transactions</h5>
                        <div class="project-button pull-right">
                        </div>
                    </div>
                    <div class="my-projects-body">

                        <div class="project-table-wrapper p-3">

                            <table class="project-table table">
                                <thead>
                                    <tr class="bg-white">
                                        <td>Date</td>
                                        <td>Invoice</td>
                                        <td>User</td>
                                        <td>Plan</td>
                                        <td>Method</td>
                                        <td width="10%"></th>
                                    </tr>
                                </thead>
                                <body>
                                    @foreach($allData as $data)
                                    <tr>
                                        <td>{{dateTimeFormat($data->created_at)}}</td>
                                        <td> {{$data->invoice}} </td>
                                        <td> {{$data->user->name}} </td>
                                        <td> {{$data->plan->name}} </td>
                                        <td> {{$data->payment_method}} </td>
                                        <td> 
                                            @if ($data->is_paid)
                                            <a href="{{ route('user.transactions.details', $data->id) }}"
                                                class="status-expenses">Expenses</a>
                                            @else
                                            <a href="{{ route('user.transactions.details', $data->id) }}" class="status-panding">Pending</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </body>
                            </table>
                        </div>
                        <div class="row g-2">
                            <div class="col mt-3">
                                {{ $allData->links('vendor.pagination.default') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    
@endsection
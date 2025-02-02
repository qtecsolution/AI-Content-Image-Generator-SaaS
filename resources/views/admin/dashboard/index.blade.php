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

            <div class="row g-3">

                <div class="col-xl-3 col-6">

                    <div class="small-box user-box">
                        <div class="small-box-left">
                            <h1 class="total-number">{{ $totalUser }}</h1>
                            <p class="total-text">Total Users</p>
                        </div>
                        <div class="small-box-right">
                            <span class="icon-wrapper">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 26.25V23.75C20 22.4239 19.4732 21.1521 18.5355 20.2145C17.5979 19.2768 16.3261 18.75 15 18.75H6.25C4.92392 18.75 3.65215 19.2768 2.71447 20.2145C1.77678 21.1521 1.25 22.4239 1.25 23.75V26.25M21.25 13.75L23.75 16.25L28.75 11.25M15.625 8.75C15.625 11.5114 13.3864 13.75 10.625 13.75C7.86358 13.75 5.625 11.5114 5.625 8.75C5.625 5.98858 7.86358 3.75 10.625 3.75C13.3864 3.75 15.625 5.98858 15.625 8.75Z"
                                        stroke="#1D2939" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                            </span>
                        </div>

                    </div>


                </div>
                <div class="col-xl-3 col-6">

                    <div class="small-box usecases-box">
                        <div class="small-box-left">
                            <h1 class="total-number">{{ totalUseCase() }}</h1>
                            <p class="total-text">Total Use Cases</p>
                        </div>
                        <div class="small-box-right">
                            <span class="icon-wrapper">
                                <svg width="22" height="28" viewBox="0 0 22 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.5 1.5H3.5C2.83696 1.5 2.20107 1.76339 1.73223 2.23223C1.26339 2.70107 1 3.33696 1 4V24C1 24.663 1.26339 25.2989 1.73223 25.7678C2.20107 26.2366 2.83696 26.5 3.5 26.5H18.5C19.163 26.5 19.7989 26.2366 20.2678 25.7678C20.7366 25.2989 21 24.663 21 24V9M13.5 1.5L21 9M13.5 1.5V9H21M16 15.25H6M16 20.25H6M8.5 10.25H6"
                                        stroke="#2D31A6" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>


                            </span>
                        </div>

                    </div>


                </div>
                <div class="col-xl-3 col-6">

                    <div class="small-box transiction">
                        <div class="small-box-left">
                            <h1 class="total-number">{{ $salesData->count() }}</h1>
                            <p class="total-text">Current Monthly Transaction</p>
                        </div>
                        <div class="small-box-right">
                            <span class="icon-wrapper">
                                <svg width="26" height="28" viewBox="0 0 26 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.25 1.5L1.75 16.5H13L11.75 26.5L24.25 11.5H13L14.25 1.5Z"
                                        stroke="#93370D" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>


                            </span>
                        </div>

                    </div>


                </div>
                <div class="col-xl-3 col-6">

                    <div class="small-box revenue">
                        <div class="small-box-left">
                            <h1 class="total-number"> {{readConfig('currency_symbol')}}{{ $salesData->sum('total') }}</h1>
                            <p class="total-text">Current Monthly Revenue</p>
                        </div>
                        <div class="small-box-right">
                            <span class="icon-wrapper">
                                <svg width="25" height="15" viewBox="0 0 30 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M28.75 1.5L16.875 13.375L10.625 7.125L1.25 16.5M28.75 1.5H21.25M28.75 1.5V9"
                                        stroke="#53389E" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>


                            </span>
                        </div>

                    </div>


                </div>




            </div>


            <div class="row mt-3">
                <div class="col-lg-6 ">
                    <div class="listtable-wrapper">
                        <div class="listtable-header">
                            <h3 class="title">Recent Transaction</h3>

                            <a href="{{ route('order.index') }}" class="seeall-btn">
                                <span class="icon">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.3335 4H14.0002" stroke="#1D2939" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.3335 8H14.0002" stroke="#1D2939" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.3335 12H14.0002" stroke="#1D2939" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M2 4H2.00667" stroke="#1D2939" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M2 8H2.00667" stroke="#1D2939" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M2 12H2.00667" stroke="#1D2939" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </span>
                                <span class="text">See all </span>
                            </a>


                        </div>
                        <div class="listtable-body">
                            <div class="table-responsive">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Invoice</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Plan</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $item)
                                        <tr>
                                            <td>{{ $item->invoice }}</td>
                                            <td>{{ $item->user->name??'' }}</td>
                                            <td>{{ $item->plan->name??'' }}</td>
                                            <td>{{ dateTimeFormat($item->created_at) }}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="listtable-wrapper">
                        <div class="listtable-header">
                            <h3 class="title">Recent Users</h3>

                            <a href="{{ route('users.index') }}" class="seeall-btn">
                                <span class="icon">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.3335 4H14.0002" stroke="#1D2939" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.3335 8H14.0002" stroke="#1D2939" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.3335 12H14.0002" stroke="#1D2939" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M2 4H2.00667" stroke="#1D2939" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M2 8H2.00667" stroke="#1D2939" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M2 12H2.00667" stroke="#1D2939" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </span>
                                <span class="text">See all </span>
                            </a>


                        </div>
                        <div class="listtable-body">
                            <div class="table-responsive">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Plan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recentUsers as $userIndex => $user)
                                        <tr>
                                            <td>{{ $userIndex + 1 }}</td>
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
        </div>

    </section>
</div>
@endsection

@extends('layouts.app')
@section('title','Details')
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
                          
                            <a href="{{ route('users.index') }}" class="seeall-btn">
                              <span class="icon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.33301 4H13.9997" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.33301 8H13.9997" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.33301 12H13.9997" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 4H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 8H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 12H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                              </span>   
                             <span>Admin list</span> 
                            </a>
                            @else
                            
                            <a href="{{ route('admin.all') }}" class="seeall-btn">
                              <span class="icon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.33301 4H13.9997" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.33301 8H13.9997" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.33301 12H13.9997" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 4H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 8H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 12H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                              </span>   
                             <span>Admin list</span> 
                            </a>
                            @endif
                           
                        </div>
                    </div>
                    <div class="my-projects-body py-3">
                        <div class="row">
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="card border-gray">
                                    <div class="p-2">
                                        @if ($data->avatar != '' && file_exists($data->avatar))
                                            <img class="rounded" src="{{ asset($data->avatar) }}" alt="{{ $data->name }}"
                                                style="max-width:150px">
                                        @else
                                            <img class="rounded" src="{{ asset('assets/images/placeholder.png') }}"
                                                alt="{{ $data->name }}" style="max-width:150px">
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"> {{ $data->name }}
                                             <a
                                                href="{{ route('users.edit', $data->id) }}">
                                                <span  data-bs-toggle="tooltip" data-bs-placement="top" title="Edit information ">
                                                <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9 15.6667H16.5M12.75 1.91669C13.0815 1.58517 13.5312 1.39893 14 1.39893C14.2321 1.39893 14.462 1.44465 14.6765 1.53349C14.891 1.62233 15.0858 1.75254 15.25 1.91669C15.4142 2.08085 15.5444 2.27572 15.6332 2.4902C15.722 2.70467 15.7678 2.93455 15.7678 3.16669C15.7678 3.39884 15.722 3.62871 15.6332 3.84319C15.5444 4.05766 15.4142 4.25254 15.25 4.41669L4.83333 14.8334L1.5 15.6667L2.33333 12.3334L12.75 1.91669Z" stroke="#667085" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>

                                                </span>
                                            </a>
                                        </h5>
                                    </div>
                                    <ul class="list-group list-group-flush info-list ">
                                        <li class="list-group-item"> <span> Email: </span> {{ $data->email }} </li>
                                        <li class="list-group-item"> <span> Phone: </span> {{ $data->phone }} </li>
                                        <li class="list-group-item"> <span> Address: </span> {{ $data->address ?? '' }} </li>
                                        @if ($data->type == 'user')
                                        <li class="list-group-item"> <span> Plan: </span> {{ $data->plan->name ?? '' }} </li>
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

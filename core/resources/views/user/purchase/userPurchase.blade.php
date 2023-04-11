@extends('layouts.app')
@section('title','All Plans')
@section('breadcrumb')
    <li class="breadcrumb-item active">All Plans</li>
@endsection
@section('content')
@php 
$months = request()->input('type') == 2 ? 12 : 1;
@endphp
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
          
            <div class="col-md-12">
                <div class="my-projects">
                    <div class="my-projects-header border-bottom">
                        <h5 class="header-title">All Plans</h5>
                      
                    </div>
                    <div class="my-projects-body">

                        <div class="pricing-body mt-3">
                            <div class="col-md-12">
                                <ul class="category-list py-2">
                                    <li class="category-list-item {{ !request()->input('type') ? 'active' : '' }}"><a href="{{route('user.purchase')}}" class="category-list-link">Monthly</a></li>
                                    <li class="category-list-item {{ request()->input('type') == 2 ? 'active' : '' }}"><a href="{{route('user.purchase')}}?type=2" class="category-list-link ">Yearly</a></li>
                                </ul>
                            </div>
                            <div class="pricing-cards">
                                <!-- single  card free  -->
                                @foreach ($plans as $item)
                                @php 
                                    $price = request()->input('type') == 2 ? $item->yearly_price : $item->price;
                                @endphp 
                                <div class="pricing-card">
                                    
                                    <div class="pricing-card-header">
                                        <span class="name">{{$item->name}}</span>
                                        <span class="price">
                                            <span class="currency">{{readConfig('currency_sambol')}}</span>
                                            <span class="number">{{ $price }}</span>
                                            <span class="plane-time">/{{ request()->input('type') == 2 ? 'year' : 'mo' }}</span>
                                        </span>
                                        <small class="text-gray">{{readConfig('currency_sambol')}}{{ request()->input('type') == 2 ? $item->price.'/mo' : $item->yearly_price.'/year' }}</small>
                                        
                                    </div>

                                    <div class="pricing-card-body">
                                        <ul class="facility-list">
                                            <li>
                                                <span class="icon-wrapper">
                                                    <img src="{{asset('assets/images/icons/check.svg')}}" alt="check icon ">
                                                </span>
                                                <span>Generate Maximum {{$item->word_count}} AI Words</span>
                                            </li>
                                            <li>
                                                <span class="icon-wrapper">
                                                    <img src="{{asset('assets/images/icons/check.svg')}}" alt="check icon ">
                                                </span>
                                                <span>{{$item->call_api_count * $months  }} Api Request</span>
                                            </li>
                                            <li>
                                                <span class="icon-wrapper">
                                                    <img src="{{asset('assets/images/icons/check.svg')}}" alt="check icon ">
                                                </span>
                                                <span>Store {{$item->documet_count * $months }} documents on server</span>
                                            </li>
                                            <li>
                                                <span class="icon-wrapper">
                                                    <img src="{{asset('assets/images/icons/check.svg')}}" alt="check icon ">
                                                </span>
                                                <span>Store {{$item->image_count * $months }} Generate Image on server</span>
                                            </li>
                                        </ul>
                                        <div class="d-grid">
                                            @if($user->plan_id == $item->id && $price == 0)
                                            <button type="button" class="btn-subscribe subscribed" onclick="redirectUrl('{{route('plan.userexpense')}}')"> 
                                                See The expenses
                                            </button>
                                            @else
                                            <button type="button" class="btn-subscribe" onclick="redirectUrl('{{route('plan.purchase',$item->id).'?type='.request()->input('type')}}')"> 
                                                 Purchase now
                                            </button>
                                            @endif
                                        
                                        </div>
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

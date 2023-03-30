@extends('layouts.app')

@section('title', 'Expanse')
@section('breadcrumb')
    <li class="breadcrumb-item active">Expanse</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">

            <div class="col-md-12">
                <div class="my-projects">
                    <div class="my-projects-header border-bottom">
                        <h5 class="header-title">Plan Purchase and Expanses Informations</h5>
                    </div>

                    <div class="my-projects-body mt-4">
                        <div class="row g-4 g-4">
                            @if (!$order->is_paid)
                            <h3 class="text-info mt-5"> Wait for the admin approval</h3>
                            @endif
                            <div class="col-lg-4">
                                <div class="purches-info-box pe-lg-4">
                                    <h4 class="title">Plan Information</h4>
                                    <ul class="purchesinfo-list">
                                        <li>Name: {{ $plan->name }}</li>
                                        <li>Word Count: {{ $plan->word_count }}</li>
                                        <li>API Call: {{ $plan->documet_count }} </li>
                                        <li>Document Save Count: {{ $plan->documet_count }}</li>
                                        <li>Image Save Count: {{ $plan->image_count }}</li>
                                        <li>Language: {{ $plan->lang }}</li>
                                        <li>Price: {{readConfig('currency_sambol')}}{{ $plan->price }}</li>
                                    </ul>
                                </div>    
                            </div>   
                            <div class="col-lg-4">
                                <div class="purches-info-box pe-lg-4">
                                    <h4 class="title">Purchase Information</h4>
                                    <ul class="purchesinfo-list">
                                        <li>Date: {{ dateTimeFormat($order->created_at) }}</li>
                                        <li>Invoice: {{ $order->invoice }}</li>
                                        <li>Paid Amount: {{readConfig('currency_sambol')}} {{ $order->total }} </li>
                                        <li>Payment Method: {{ $order->payment_method }}</li>
                                    </ul>
                                </div>    
                            </div>   
                            <div class="col-lg-4">
                                @if ($expanse != null)
                                <div class="purches-info-box pe-lg-4">
                                    <h4 class="title">Your Expanses summary</h4>
                                    <ul class="purchesinfo-list">
                                        <li>Total API Call: {{ $expanse->current_api_count }}</li>
                                            <li>Rest of API Call:
                                                {{ $expanse->call_api_count - $expanse->current_api_count }}</li>
                                            <li>Total Document Save Count:
                                                {{ $expanse->current_documet_count }}
                                            </li>
                                            <li>Rest of Documet Save Count:
                                                {{ $expanse->documet_count - $expanse->current_documet_count }}</li>
                                            <li>Total Image: {{ $expanse->current_image_count }}
                                            </li>
                                            <li>Rest of Image:
                                                {{ $expanse->image_count - $expanse->current_image_count }}</li>
                                            <li>Activated Date:
                                                {{ dateTimeFormat($expanse->activated_at) }}</li>
                                            <li>Expire Date:
                                                {{ dateTimeFormat($expanse->expire_at) }}</li>
                                    </ul>
                                </div>
                                @endif    
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

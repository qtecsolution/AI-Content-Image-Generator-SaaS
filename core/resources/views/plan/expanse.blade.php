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

                        <div class="row d-none">
                            <div class="col-md-4">
                                <div class="m-2">


                                    <h4>Plan Information</h4>
                                    <ul class="list-group mt-3">
                                        <li class="list-group-item">Name: {{ $plan->name }}</li>
                                        <li class="list-group-item">Word Count: {{ $plan->word_count }}</li>
                                        <li class="list-group-item">API Call: {{ $plan->documet_count }} </li>
                                        <li class="list-group-item">Document Save Count: {{ $plan->documet_count }}</li>
                                        <li class="list-group-item">Image Save Count: {{ $plan->image_count }}</li>
                                        <li class="list-group-item">Language: {{ $plan->lang }}</li>
                                        <li class="list-group-item">Price: {{ $plan->price }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="m-2">
                                    <h4>Purchase Information</h4>
                                    <ul class="list-group mt-3">
                                        <li class="list-group-item">Date: {{ dateTimeFormat($order->created_at) }}</li>
                                        <li class="list-group-item">Invoice: {{ $order->invoice }}</li>
                                        <li class="list-group-item">Paid Amount: {{ $order->total }} </li>
                                        <li class="list-group-item">Payment Method: {{ $order->payment_method }}</li>
                                    </ul>
                                </div>
                            </div>

                            @if ($expanse != null)
                                <div class="col-md-4">
                                    <div class="m-2">
                                        <h4>Your Service Expanses summary</h4>
                                        <ul class="list-group mt-3">
                                            <li class="list-group-item">Total API Call: {{ $expanse->current_api_count }}</li>
                                            <li class="list-group-item">Rest of API Call:
                                                {{ $expanse->call_api_count - $expanse->current_api_count }}</li>
                                            <li class="list-group-item">Total Document Save Count:
                                                {{ $expanse->current_documet_count }}
                                            </li>
                                            <li class="list-group-item">Rest of Documet Save Count:
                                                {{ $expanse->documet_count - $expanse->current_documet_count }}</li>
                                            <li class="list-group-item">Total Image: {{ $expanse->current_image_count }}
                                            </li>
                                            <li class="list-group-item">Rest of Image:
                                                {{ $expanse->image_count - $expanse->current_image_count }}</li>
                                            <li class="list-group-item">Activated Date:
                                                {{ dateTimeFormat($expanse->activated_at) }}</li>
                                            <li class="list-group-item">Expire Date:
                                                {{ dateTimeFormat($expanse->expire_at) }}</li>
                                        </ul>

                                    </div>
                                </div>
                            @endif

                            @if (!$order->is_paid)
                                <div class="col-md-4">
                                    <h3 class="text-center text-info mt-5"> Wait for the admin approvel</h3>
                                </div>
                            @endif
                        </div>

                        <div class="row g-4 g-4">
                            <div class="col-lg-4">
                                <div class="purches-info-box pe-lg-4">
                                    <h4 class="title">Plan Information</h4>
                                    <ul class="purchesinfo-list">
                                        <li>Word Count: 300</li>
                                        <li>API Call: 10</li>
                                        <li>Document Save Count: 10</li>
                                        <li>Image Save Count: 2</li>
                                        <li>Language: English</li>
                                        <li>Price: 10</li>
                                    </ul>
                                </div>    
                            </div>   
                            <div class="col-lg-4">
                                <div class="purches-info-box pe-lg-4">
                                    <h4 class="title">Purchase Information</h4>
                                    <ul class="purchesinfo-list">
                                        <li>Date: 2023-03-13 15:23:18</li>
                                        <li>Invoice: 1678699398-19445</li>
                                        <li>Paid Amount: 10</li>
                                        <li>Image Save Count: 2</li>
                                        <li>Language: English</li>
                                        <li>Payment Method: bank</li>
                                    </ul>
                                </div>    
                            </div>   
                            <div class="col-lg-4">
                                <div class="purches-info-box pe-lg-4">
                                    <h4 class="title">Plan Information</h4>
                                    <ul class="purchesinfo-list">
                                        <li>Total API Call: 0</li>
                                        <li>Rest of API Call: 881</li>
                                        <li>Total Document Save Count: 0</li>
                                        <li>Rest of Document Save Count: 48</li>
                                        <li>Rest of Image: 7</li>
                                        <li>Activated Date: 2023-03-19 17:24:26</li>
                                        <li>Expire Date: 2023-04-18 17:24:26</li>
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

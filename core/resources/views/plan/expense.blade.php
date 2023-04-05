@extends('layouts.app')

@section('title', 'Transaction Details')
@section('breadcrumb')
    <li class="breadcrumb-item active">Transaction Details</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">

            <div class="col-md-12">
                <div class="my-projects">
                    <div class="my-projects-header border-bottom">
                        <h5 class="header-title">Plan Purchase and expenses Informations</h5>
                    </div>

                    <div class="my-projects-body mt-4">
                        <div class="row g-4 g-4">
                            @if (!$order->is_paid)
                            <h4 class="text-warning mt-5"> Admin authorization is necessary for this order. </h3>
                                <div class="col-md-12">
                                    <a href="{{ route('order.approved', $order->id) }}"
                                        data-bs-toggle="tooltip" data-bs-title="Approve this order."  class="status-approved">Approve</a>
                                </div>
                            
                            @endif
                            <div class="col-lg-4">
                                <div class="purches-info-box pe-lg-4">
                                    <h4 class="title">Plan Information</h4>
                                    <ul class="purchesinfo-list">
                                        <li>Name: {{ $plan->name }}</li>
                                        <li>Word Count: {{ $plan->word_count }}</li>
                                        <li>API Call: {{ $plan->call_api_count }} </li>
                                        <li>Document Save Count: {{ $plan->documet_count }}</li>
                                        <li>Image Save Count: {{ $plan->image_count }}</li>
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
                                @if ($expense != null)
                                <div class="purches-info-box pe-lg-4">
                                    <h4 class="title">Expenses summary</h4>
                                    <ul class="purchesinfo-list">
                                        <li>Total API Call: {{ $expense->current_api_count }}</li>
                                            <li>Rest of API Call:
                                                {{ $expense->call_api_count - $expense->current_api_count }}</li>
                                            <li>Total Document Save Count:
                                                {{ $expense->current_documet_count }}
                                            </li>
                                            <li>Rest of Documet Save Count:
                                                {{ $expense->documet_count - $expense->current_documet_count }}</li>
                                            <li>Total Image: {{ $expense->current_image_count }}
                                            </li>
                                            <li>Rest of Image:
                                                {{ $expense->image_count - $expense->current_image_count }}</li>
                                            <li>Activated Date:
                                                {{ dateTimeFormat($expense->activated_at) }}</li>
                                            <li>Expire Date:
                                                {{ dateTimeFormat($expense->expire_at) }}</li>
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

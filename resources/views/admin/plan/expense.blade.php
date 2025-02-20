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
                                        <li>Total words: {{ $plan->word_count }} /mo</li>
                                        <li>Maximum word per request: {{ $plan->max_words }}</li>
                                        <li>Total image generate: {{ $plan->image_count }} /mo</li>
                                        <li>Monthly Price: {{readConfig('currency_symbol')}}{{ $plan->price }}</li>
                                        <li>Yearly Price: {{readConfig('currency_symbol')}}{{ $plan->yearly_price }}</li>
                                    </ul>
                                </div>    
                            </div>   
                            <div class="col-lg-4">
                                <div class="purches-info-box pe-lg-4">
                                    <h4 class="title">Purchase Information</h4>
                                    <ul class="purchesinfo-list">
                                        <li>Date: {{ dateTimeFormat($order->created_at) }}</li>
                                        <li>Invoice: {{ $order->invoice }}</li>
                                        <li>Payment Type: {{ $order->type==2?'Yearly':'Monthly' }}</li>
                                        <li>Total Amount: {{readConfig('currency_symbol')}}{{ $order->total+$order->discount_amount }} </li>
                                        @if($order->discount_amount>0)
                                        <li>Discount Amount: {{readConfig('currency_symbol')}}{{ $order->discount_amount }} (Coupon: {{$order->discount_code}}) </li>
                                        @endif
                                        <li>Paid Amount: {{readConfig('currency_symbol')}}{{ $order->total }} </li>
                                        <li>Payment Method: {{ $order->payment_method }}</li>
                                        @if($order->other != '')
                                        <li> <b> Attachment: </b>  <a href="{{filePath($order->other)}}" target="_blank"> <i class="fa fa-file"></i> Attach File </a> </li>
                                        @endif
                                    </ul>
                                </div>    
                            </div>   
                            <div class="col-lg-4">
                                @if ($expense != null)
                                <div class="purches-info-box pe-lg-4">
                                    <h4 class="title">Expenses summary</h4>
                                    <ul class="purchesinfo-list">
                                        <li>Total word used: {{ $expense->current_word_count }}</li>
                                        <li>Rest of word: {{ $expense->word_count - $expense->current_word_count }}</li>
                                        <li>Rest of Image: {{ $expense->image_count - $expense->current_image_count }}</li>
                                        <li>Activated Date: {{ dateTimeFormat($expense->activated_at) }}</li>
                                        <li>Expire Date: {{ dateTimeFormat($expense->expire_at) }}</li>
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

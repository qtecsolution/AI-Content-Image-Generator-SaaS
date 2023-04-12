@extends('layouts.app')
@section('title', 'Checkout')
@section('breadcrumb')
    <li class="breadcrumb-item active">Checkout</li>
@endsection
@section('content')
@php
    $price = request()->input('type') == 2 ? $plan->yearly_price : $plan->price;
@endphp
    <div class="main-content p-2 p-md-4 pt-0">

        <section class="checkout">

            <div class="popular-template-header pt-4">
                <h4 class="header-title">Checkout</h4>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="row m-n2">
                <div class="col-12 col-lg-8 p-2">

                    <div class="card border-0 shadow-sm mb-3 px-3 overflow-hidden ">

                        <div class="card-header px-3">
                            <div class="font-weight-medium py-1">Payment method</div>
                        </div>

                        <div class="card-body p-0 ">

                            <ul class="list-group list-group-flush">
                                @if (readConfig('PAYPAL_ACTIVE') == 'on')
                                    <li class="list-group-item p-0">
                                        <div class="customradio p-2">
                                            <input type="radio" id="paypal" class="customradio-box"
                                                name="payment_processor" value="paypal" hidden="">
                                            <label for="paypal" class="customradio-label w-100">
                                                <div class="d-flex justify-content-between align-items-center">

                                                    <div class="d-flex align-items-center gap-2">
                                                        <img src="{{ asset('assets/images/paypal.svg') }}"
                                                            class="width-6 rounded-sm">
                                                        <span class="payment-name">Paypal</span>
                                                    </div>

                                                    <div>
                                                        <div class="payment-way">Paypal payment</div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </li>
                                @endif
                                @if (readConfig('STRIPE_ACTIVE') == 'on')
                                    <li class="list-group-item p-0">
                                        <div class="customradio p-2">
                                            <input type="radio" id="stripe" class="customradio-box"
                                                name="payment_processor" value="stripe" hidden="">
                                            <label data-bs-toggle="collapse" href="#collapseExample" role="button"
                                                aria-expanded="false" aria-controls="collapseExample" for="stripe"
                                                class="customradio-label w-100">
                                                <div class="d-flex justify-content-between align-items-center">

                                                    <div class="d-flex align-items-center gap-2">
                                                        <img src="{{ asset('assets/images/stripe.svg') }}"
                                                            class="width-6 rounded-sm">
                                                        <span class="payment-name">Stripe</span>
                                                    </div>

                                                    <div>
                                                        <div class="payment-way">Credit card</div>
                                                    </div>

                                                </div>
                                            </label>
                                            <div class="collapse" id="collapseExample">
                                                <div class="card-body">
                                                    <div class='row'>
                                                        <div class='col-xs-12 col-md-4  form-group'>
                                                            <label class='control-label'>Card Number</label>
                                                            <input autocomplete='off'
                                                                class='form-control custom-input card-number' size='20'
                                                                type='text'>
                                                        </div>
                                                        <div class='col-xs-12 col-md-2 form-group cvc required'>
                                                            <label class='control-label'>CVC</label> <input
                                                                autocomplete='off'
                                                                class='form-control custom-input card-cvc'
                                                                placeholder='Ex: 311' size='4' type='text'>
                                                        </div>
                                                        <div class='col-xs-12 col-md-2 form-group expiration required'>
                                                            <label class='control-label'>Exp. Month</label>
                                                            <input class='form-control custom-input card-expiry-month'
                                                                placeholder='MM' size='2' type='text'>
                                                        </div>
                                                        <div class='col-xs-12 col-md-2 form-group expiration required'>
                                                            <label class='control-label'>Exp. Year</label>
                                                            <input class='form-control custom-input card-expiry-year'
                                                                placeholder='YYYY' size='4' type='text'>
                                                        </div>
                                                    </div>
                                                    <div class='row '>
                                                        <div class='col-md-12 error form-group mt-4 d-none'>
                                                            <div class='alert-danger alert'>Please correct the
                                                                errors and
                                                                try
                                                                again.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                @endif
                                @if (readConfig('RAZORPAY_ACTIVE') == 'on')
                                    <li class="list-group-item p-0">
                                        <div class="customradio p-2">
                                            <input type="radio" id="coinbase" class="customradio-box"
                                                name="payment_processor" value="razorpay" hidden="">
                                            <label for="coinbase" class="customradio-label w-100">
                                                <div class="d-flex justify-content-between align-items-center">

                                                    <div class="d-flex align-items-center gap-2">
                                                        <img src="{{ asset('assets/images/razorpay_logo.png') }}"
                                                            class="width-6 rounded-sm">
                                                        <span class="payment-name">Razorpay </span>
                                                    </div>

                                                    <div>
                                                        <div class="payment-way">Razorpay</div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </li>
                                @endif
                                <li class="list-group-item p-0">
                                    <div class="customradio p-2">
                                        <input type="radio" id="aamarPay" class="customradio-box"
                                               name="payment_processor" value="aamarpay" hidden="">
                                        <label for="aamarPay" class="customradio-label w-100">
                                            <div class="d-flex justify-content-between align-items-center">

                                                <div class="d-flex align-items-center gap-2">
                                                    <img src="{{ asset('assets/images/amarpay.png') }}"
                                                         class="width-6 rounded-sm">
                                                    <span class="payment-name">aamarPay </span>
                                                </div>

                                                <div>
                                                    <div class="payment-way">aamarPay</div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </li>

                                @if (readConfig('bank_status') == 'on')
                                    <li class="list-group-item p-0">
                                        <div class="customradio p-2">
                                            <input type="radio" id="bank" class="customradio-box"
                                                name="payment_processor" value="bank" hidden="">
                                            <label for="bank" class="customradio-label w-100">
                                                <div class="d-flex justify-content-between align-items-center">

                                                    <div class="d-flex align-items-center gap-2">
                                                        <img src="https://phpcontent.lunatio.com/img/icons/payments/bank.svg"
                                                            class="width-6 rounded-sm">
                                                        <span class="payment-name">Bank</span>
                                                    </div>

                                                    <div>
                                                        <div class="payment-way">Bank Transfar</div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </li>
                                @endif
                            </ul>


                            @error('payment_method')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm d-none">
                        <div class="card-header">
                            <div class="font-weight-medium py-1">Billing information</div>
                        </div>
                        <div class="card-body d-flex flex-column gap-3 form-methods">
                            <form action="{{ route('plan.purchase.store') }}" enctype="multipart/form-data"
                                method="post" id="order_payment_done" class="mt-2">
                                @csrf
                                <input type="hidden" id="plan_id" name="plan_id" value="{{ $plan->id }}">
                                <input type="hidden" id="paymentMethod" name="paymentMethod" value="">
                                <input type="hidden" id="paymentAmount" name="paymentAmount" value="{{ $price }}">
                                <input type="hidden" id="paymentType" name="type" value="{{ request()->input('type') == 2 ? 2 : 1 }}">
                                <input type="hidden" id="paymentID" name="payment_id" value="">
                                <input type="hidden" id="value_1" name="value_1" value="">

                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Name <span class="text-danger"> * </span> :</label>
                                    <input type="text" value="{{ $user->name }}"
                                        class="form-control custom-input shadow-none" id="name" name="name"
                                        autocomplete="off" placeholder="Enter your name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong> Please enter your name </strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="phone" class="form-label">Email <span class="text-danger"> * </span> :</label>
                                    <input type="email" name="email" value="{{ $user->email }}"
                                        class="form-control custom-input shadow-none" id="phone" autocomplete="off"
                                        placeholder="Enter your phone">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="address" class="form-label">Address : </label>
                                    <input type="text" value="{{ $user->address }}"
                                        class="form-control custom-input shadow-none" name="address" id="address"
                                        autocomplete="off" placeholder="Enter your address">

                                </div>

                                <div class="form-group mb-3">
                                    <label for="phone" class="form-label">Phone :</label>
                                    <input type="tel" class="form-control custom-input shadow-none" id="phone"
                                        autocomplete="off" placeholder="Enter your phone" name="phone"
                                        value="{{ $user->phone }}">

                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-lg-4 p-2 d-flex flex-column justify-content-start">
                    <div class="card border-0 shadow-sm">

                        <div class="card-header">
                            <div class="font-weight-medium py-1">Order summary</div>
                        </div>

                        <div class="card-body p-0 mt-2">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item pt-0 py-3">
                                    <div class="row">
                                        <div class="col">
                                            <div>{{ $plan->name }}</div>

                                            <div class="checkout-month d-inline-block">
                                                <div class="small text-muted">
                                                    @if(request()->input('type') == 2)
                                                        <span class="checkout-one-time">Billed for 365 days</span>
                                                    @else
                                                        <span class="checkout-subscription d-block">Billed for 30 days.</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class=" checkout-month d-inline-block">
                                                <span class="text-muted">{{ readConfig('currency_sambol') }}</span>{{ $price }}
                                            </div>

                                        </div>
                                    </div>
                                </li>


                            </ul>
                        </div>

                        <div class="card-footer font-weight-bold">
                            <div class="row">
                                <div class="col">
                                    <span>Total</span>
                                </div>
                                <div class="col-auto">
                                    <span class=" checkout-month d-inline-block">
                                        <span>{{ readConfig('currency_sambol') }}</span>{{ $price }}
                                    </span>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 px-2">
                        <span class="small text-muted">
                            <span class="checkout-one-time">
                                To proceed, you must accept the <a href="{{route('page','terms-condition')}}" target="_blank">terms of service.</a>
                            </span>
                        </span>
                    </div>

                    <div class="px-2">
                        <button type="button" onclick="checkOut()" name="submit"
                            class="btn btn-success btn-block my-3 w-100">
                            <span class=" checkout-month d-inline-block">
                                Pay {{ readConfig('currency_sambol') }}{{ $price }}
                            </span>

                        </button>
                    </div>

                    <span class="invalid-feedback methodError alert alert-danger" role="alert">
                        <strong>Please select the payment methods</strong>
                    </span>

                </div>
            </div>
        </section>

    </div>
@endsection
@section('script')
    <script>
        function checkOut() {

            var methods = 'others'
            methods = $('input[name=payment_processor]:checked').val();

            $('.methodError').addClass('invalid-feedback ')

            switch (methods) {
                case 'paypal':
                    paypalPayment();
                    break;
                case 'stripe':
                    var type = $('#paymentType').val();
                    $('.form-methods').load("{{ route('plan.stripe.load', $plan->id) }}?type="+type);
                    stripPaymnet();
                    break;
                case 'razorpay':
                    // $('.form-methods').load('{{ route('plan.razorpay.load', $plan->id) }}');
                    razorPaymnet();
                    break;
                case 'aamarpay':
                    aamarPay()
                    break;
                case 'bank':
                    bankPayment()
                    break;
                default:
                    $('.methodError').removeClass('invalid-feedback ')
                    break;
            }

        }
    </script>
    @if($price <= 0)
    <script>
        $(document).ready(function() {
            $('#paymentMethod').val('Free');
            $('#paymentID').val('');
            $('#value_1').val('');
            $('#order_payment_done').submit();
        });
    </script>
    @endif


    @if (readConfig('PAYPAL_ACTIVE') == 'on')
        <script>
            "use strict"

            function paypalPayment() {
                $('#paymentMethod').val('paypal');
                $('#paymentAmount').val({{ $price }});
                $('#paymentID').val('');
                $('#value_1').val('');
                $('#order_payment_done').submit();
            }
        </script>
    @endif


    <script>
        function aamarPay(){
            var type = $('#paymentType').val();
            window.location.href = "{{route('aamarpay.process').'?plan='.$plan->id}}&price={{$price}}&type="+type;
            const formData = {
                cus_name: '{{Auth::user()->name}}',
                cus_email : '{{Auth::user()->email}}',
                cus_phone : '{{Auth::user()->phone}}',
                amount:'{{ $price }}',
                tran_id: {{$plan->id."-".time()}},
                signature_key: "ca14b13465d1afe8305ce219dd9a3599",
                store_id: "dataghor",
                currency:'USD',
                desc:"Payment for AI",
                cus_add1: "53, Gausul Azam Road, Sector-14, Dhaka, Bangladesh",
                cus_add2: "Dhaka",
                cus_city: "Dhaka",
                cus_country: "Bangladesh",
                success_url: "{{route('aamarpay.success')}}",
                fail_url: "{{route('aamarpay.success')}}",
                cancel_url: "{{route('aamarpay.success')}}",
                type: "json",
            };
            const url ="https://sandbox.aamarpay.com/jsonpost.php";
            const json = JSON.stringify(formData);

            $.ajax({
                url: url,
                type: "POST",
                data: json,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });

        }
    </script>

    @if (readConfig('bank_status') == 'on')
        <script>
            "use strict"

            function bankPayment() {

                var planId = $('#plan_id').val();
                var type = $('#paymentType').val();
                // var formData = $('#order_payment_done').serialize();
                var url = "{{ route('checkout.bank') }}" + `?plan_id=${planId}&type=${type}` ;
                forModal(url, 'Bank Transfer');
            }
        </script>
    @endif




    @if (readConfig('STRIPE_ACTIVE') == 'on')
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script>
            "use strict"

            function stripPaymnet() {
                var price = "{{ $price }}";
                // e.preventDefault();
                $('#paymentMethod').val('stripe');
                $('#paymentAmount').val(price);
                $('#paymentID').val('');
                $('#value_1').val('');
                Stripe.setPublishableKey("{{ readConfig('STRIPE_KEY') }}");
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);

            }

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('d-none')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    $('#paymentID').val(token);
                    $('#order_payment_done').append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $('#order_payment_done').submit();
                }
            }
        </script>
    @endif



    @if (readConfig('RAZORPAY_ACTIVE') == 'on')
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            "use strict"

            function razorPaymnet(e) {

                $('#paymentMethod').val('razorpay');
                $('#paymentAmount').val({{ $price }});
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var options = {
                    "key": "{{ readConfig('RAZORPAY_KEY') }}",
                    "amount": ({{ $price }} * 100), // 2000 paise = INR 20
                    "currency": "USD",
                    "name": "{{ $plan->name }}",
                    "description": "Payment",
                    "image": "{{ filePath(readConfig('type_logo')) }}",
                    "handler": function(response) {
                        $('#paymentID').val(response.razorpay_payment_id);
                        $('#order_payment_done').submit();
                    },
                    "prefill": {
                        "name": '{{ $user->name }}',
                        "email": '{{ $user->email }}',
                        "contact": '{{ $user->phone }}',
                    },
                    "theme": {
                        "color": "#528FF0"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        </script>
    @endif
@endsection

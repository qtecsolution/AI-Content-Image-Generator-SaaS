@extends('layouts.app')
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">

            <div class="col-md-12">
                <div class="card custom">
                    <div class="card-header bg-info">
                        <h5 class="card-title no-margin color-white">All Plans</h5>
                        <div class="card-button">
                            <a href="{{ route('plan.userIndex') }}" class="btn btn-success btn-xs">
                                <i class="fa fa-add"></i>
                                See Plans
                            </a>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            {{ $plan }}
                            show the plan card here
                        </div>
                        <div class="col-md-4">

                            <form method="post" action="{{ route('plan.purchase.store') }}">
                                @csrf
                                <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                <input type="hidden" name="payment_method" value="paypal">
                                <input type="hidden" name="paymentAmount" value="{{ $plan->price }}">
                                {{-- this input filed the payment done amount --}}
                                <button class="btn btn-primary" type="submit">Purchase </button>
                            </form>
                        </div>

                        <div class="col-md-6 mb-4 sticky-sidebar-wrapper">
                            <h3 class="title text-uppercase ls-10 pt-2">Select Payment Method</h3>
                            <div class="order-summary">
                                {{-- this is order payment --}}
                                <form action="{{ route('plan.purchase.store') }}" method="post" id="order_payment_done"
                                    data-stripe-publishable-key="{{ App\Http\Controllers\HomeController::readConfig('STRIPE_KEY') }}">
                                    @csrf
                                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                    <input type="hidden" id="paymentMethod" name="paymentMethod" value="stripe">
                                    <input type="hidden" id="paymentAmount" name="paymentAmount"
                                        value="{{ $plan->price }}">
                                    <input type="hidden" id="paymentTID" name="paymentTID" value="">
                                    <input type="hidden" id="value_1" name="value_1" value="">
                                </form>
                                @error('payment_method')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                                @if (App\Http\Controllers\HomeController::readConfig('PAYPAL_ACTIVE') == 'on')
                                    <div id="smart-button-container">
                                        <div style="text-align: center;">
                                            <div id="paypal-button-container"></div>
                                        </div>
                                    </div>
                                @endif

                                @if (App\Http\Controllers\HomeController::readConfig('STRIPE_ACTIVE') == 'on')
                                    <div class="form-group place-order stripe-payment">
                                        <a class="btn btn-dark btn-block btn-rounded checkout_btn" data-bs-toggle="collapse"
                                            href="#collapseExample" role="button" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            <img src="{{ asset('stripe.png') }}">
                                        </a>
                                    </div>
                                    <div class="collapse" id="collapseExample">
                                        <div class="card-body">
                                            <div class='row'>
                                                <div class='col-xs-12'>
                                                    <label class='control-label'>Name on Card</label>
                                                    <input class='form-control' size='4' type='text'>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-xs-12'>
                                                    <label class='control-label'>Card Number</label>
                                                    <input autocomplete='off' class='form-control card-number'
                                                        size='20' type='text'>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                                        class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                        type='text'>
                                                </div>
                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Expiration Month</label> <input
                                                        class='form-control card-expiry-month' placeholder='MM'
                                                        size='2' type='text'>
                                                </div>
                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Expiration Year</label> <input
                                                        class='form-control card-expiry-year' placeholder='YYYY'
                                                        size='4' type='text'>
                                                </div>
                                            </div>
                                            <div class='row '>
                                                <div class='col-md-12 error form-group d-none'>
                                                    <div class='alert-danger alert'>Please correct the errors and
                                                        try
                                                        again.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <button class="btn btn-primary btn-lg btn-block" type="button"
                                                        onclick="stripPaymnet()">Pay Now
                                                        ({{ $plan->price }})</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('plan.purchase.store') }}" method="post"
                                        class="order_payment_stripe"
                                        data-stripe-publishable-key="{{ App\Http\Controllers\HomeController::readConfig('STRIPE_KEY') }}">
                                        @csrf
                                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                        <input type="hidden" class="paymentMethod" name="paymentMethod" value="cod">
                                        <input type="hidden" class="paymentAmount" name="paymentAmount"
                                            value="{{ $plan->price }}">
                                        <input type="hidden" class="paymentTID" name="paymentTID" value="">
                                        <input type="hidden" class="value_1" name="value_1" value="">
                                    </form>
                                @endif

                                @if (App\Http\Controllers\HomeController::readConfig('RAZORPAY_ACTIVE') == 'on')
                                    <div class="form-group razorpay-payment place-order">
                                        <button type="button" class="btn btn-dark btn-block btn-rounded checkout_btn"
                                            onclick="razorPaymnet()">
                                            <img src="{{ asset('razorpay_logo.png') }}"
                                                class="paypal-logo paypal-logo-paypal paypal-logo-color-blue">
                                        </button>
                                    </div>
                                    <form action="{{ route('plan.purchase.store') }}" method="POST"
                                        class="razorPaymnet d-none">
                                        @csrf
                                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                        <input type="hidden" id="paymentMethod" name="paymentMethod" value="rezorpay">
                                        <input type="hidden" id="paymentAmount" name="paymentAmount"
                                            value="{{ $plan->price }}">
                                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ App\Http\Controllers\HomeController::readConfig('RAZORPAY_KEY') }}"
                                            data-amount="{{ 100 * $plan->price }}"
                                            data-name="{{ App\Http\Controllers\HomeController::readConfig('type_name') }}" data-description=""
                                            data-image="{{ App\Http\Controllers\HomeController::filePath(App\Http\Controllers\HomeController::readConfig('type_logo')) }}"
                                            data-prefill.name="{{ $user->name }}" data-prefill.email="{{ $user->email }}"></script>
                                    </form>
                                @endif

                                @if (App\Http\Controllers\HomeController::readConfig('MOLLIE_ACTIVE') == 'on')
                                    <div class="form-group mollie-payment place-order">
                                        <button type="button" class="btn btn-dark btn-block btn-rounded checkout_btn"
                                            onclick="molliePaymnet()">
                                            <img src="{{ asset('mollie.png') }}"
                                                class="paypal-logo paypal-logo-paypal paypal-logo-color-blue">
                                        </button>
                                    </div>
                                    <form action="{{ route('plan.purchase.store') }}" method="POST"
                                        class="molliePaymnet d-none">
                                        @csrf
                                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                        <input type="hidden" id="paymentMethod" name="paymentMethod" value="mollie">
                                        <input type="hidden" id="paymentAmount" name="paymentAmount"
                                            value="{{ $plan->price }}">
                                    </form>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @if (App\Http\Controllers\HomeController::readConfig('PAYPAL_ACTIVE') == 'on')
        <script
            src="https://www.paypal.com/sdk/js?client-id={{ App\Http\Controllers\HomeController::readConfig('PAYPAL_CLIENT_ID') }}&enable-funding=venmo&currency=USD"
            data-sdk-integration-source="button-factory"></script>
        <script>
            "use strict"

            function initPayPalButton() {
                //get amount

                paypal.Buttons({
                    style: {
                        shape: 'rect',
                        color: 'black',
                        layout: 'vertical',
                        label: 'checkout',
                        tagline: false
                    },

                    createOrder: function(data, actions) {

                        return actions.order.create({
                            purchase_units: [{
                                "amount": {
                                    "currency_code": "USD",
                                    "value": {{ $plan->price }}
                                }
                            }]
                        });

                    },

                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(orderData) {

                            // Full available details
                            var data = JSON.stringify(orderData, null, 2);

                            console.log('Capture result' + data['purchase_units']['amount']['value'] + ' ' +
                                data['id']);
                            //append the data
                            $('#paymentMethod').val('paypal');
                            $('#paymentAmount').val(data['purchase_units']['amount']['value']);
                            $('#paymentTID').val(data['id']);
                            $('#value_1').val(data);
                            $('#order_payment_done').submit();



                            // Show a success message within this page, e.g.
                            const element = document.getElementById('paypal-button-container');
                            element.innerHTML = '';
                            element.innerHTML = '<h3>Thank you for your payment!</h3>';

                            // Or go to another URL:  actions.redirect('thank_you.html');

                        });
                    },

                    onError: function(err) {

                        if ($('input[type="radio"][name="shipping_method"]').is(":checked")) {
                            const element = document.getElementById('paypal-button-container');
                            element.innerHTML = '';
                            element.innerHTML =
                                '<h3>Transaction is failed, please Place order as partial payment !</h3>';
                            console.log('error = ' + err);
                        }

                    }
                }).render('#paypal-button-container');
            }
            initPayPalButton();
        </script>
    @endif



    @if (App\Http\Controllers\HomeController::readConfig('STRIPE_ACTIVE') == 'on')
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script>
            "use strict"

            function stripPaymnet() {
                debugger
                // e.preventDefault();
                $('.paymentMethod').val('stripe');
                $('.paymentAmount').val({{ $plan->price }});
                $('.paymentTID').val('');
                $('.value_1').val('');

                Stripe.setPublishableKey($('#order_payment_done').data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);

            }

            function stripeResponseHandler(status, response) {
                console.log(response);
                console.log(status);
                if (response.error) {
                    $('.error')
                        .removeClass('d-none')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    // $('#order_payment_done').find('input[type=text]').empty();
                    $('#order_payment_done').append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $('#order_payment_done').submit();
                }
            }
        </script>
    @endif




    @if (App\Http\Controllers\HomeController::readConfig('RAZORPAY_ACTIVE') == 'on')
        {}
        <script>
            "use strict"

            function razorPaymnet() {


                $('.razorPaymnet').submit();

            }
        </script>
    @endif

    @if (App\Http\Controllers\HomeController::readConfig('MOLLIE_ACTIVE') == 'on')
        {}
        <script>
            "use strict"
            // MOLLIE_ACTIVE
            function molliePaymnet() {


                $('.molliePaymnet').submit();

            }
        </script>
    @endif
@endsection

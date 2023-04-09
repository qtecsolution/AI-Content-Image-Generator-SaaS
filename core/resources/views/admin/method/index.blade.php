@extends('layouts.app')
@section('title','Payment Methods')
@section('breadcrumb')
    <li class="breadcrumb-item">Payment Methods</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <ul class="nav nav-tabs setting-tab" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link @if (isset($tab) && $tab == 'paypal') active @endif" id="paypal-tab" data-bs-toggle="tab"
                    data-bs-target="#paypal-tab-pane" type="button" role="tab" aria-controls="paypal-tab-pane"
                    aria-selected="true">Paypal Setup</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link @if (isset($tab) && $tab == 'stripe') active @endif" id="Stripe-tab"
                    data-bs-toggle="tab" data-bs-target="#Stripe-tab-pane" type="button" role="tab"
                    aria-controls="Stripe-tab-pane" aria-selected="false">Stripe
                    Setup</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link @if (isset($tab) && $tab == 'rezor') active @endif" id="RazorPay-tab"
                    data-bs-toggle="tab" data-bs-target="#RazorPay-tab-pane" type="button" role="tab"
                    aria-controls="RazorPay-tab-pane" aria-selected="false">RazorPay
                    Setup</button>
            </li>


            <li class="nav-item d-none" role="presentation">
                <button class="nav-link @if (isset($tab) && $tab == 'openai') active @endif" id="Mollie-tab"
                    data-bs-toggle="tab" data-bs-target="#Mollie-tab-pane" type="button" role="tab"
                    aria-controls="Mollie-tab-pane" aria-selected="false">Mollie
                    Setup</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link @if (isset($tab) && $tab == 'bank') active @endif" id="bank-tab"
                    data-bs-toggle="tab" data-bs-target="#bank-tab-pane" type="button" role="tab"
                    aria-controls="bank-tab-pane" aria-selected="false">Bank Payment
                    Setup</button>
            </li>



        </ul>
        <div class="tab-content mt-3 setting-tab-content" id="myTabContent">
            <div class="tab-pane fade @if (isset($tab) && $tab == 'paypal') show active @endif " id="paypal-tab-pane"
                role="tabpanel" aria-labelledby="paypal-tab" tabindex="0">
                <div class="row">
                    <div class="col-md-7">
                        <form action="{{ route('payment.paypal.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-2">
                                <label class="col-form-label">Paypal active <span class="text-danger">*</span></label>
                                <select class="form-control select2 w-100" name="PAYPAL_ACTIVE">
                                    <option value="on" {{ readConfig('PAYPAL_ACTIVE') == 'on' ? 'selected' : null }}>ON
                                    </option>
                                    <option value="off" {{ readConfig('PAYPAL_ACTIVE') == 'off' ? 'selected' : null }}>
                                        Off
                                    </option>
                                </select>
                            </div>

                            <div class="form-group  mb-2">
                                <label class="col-form-label" for="paypalId">Paypal Client Id</label>
                                <input class="form-control custom-input" name="PAYPAL_CLIENT_ID" id="paypalId"
                                    value="{{ readConfig('PAYPAL_CLIENT_ID') }}" placeholder="PAYPAL_CLIENT_ID">
                            </div>

                            <div class="form-group mb-2">
                                <label class="col-form-label" for="paypalSecret">Paypal App Secret </label>
                                <input class="form-control custom-input" name="PAYPAL_APP_SECRET" id="paypalSecret"
                                    value="{{ readConfig('PAYPAL_APP_SECRET') }}" placeholder="PAYPAL_APP_SECRET">
                            </div>

                            <div class="text-center">
                                <div class="generate-btn-wrapper">
                                        <button type="submit" class="generate-btn px-4">Save</button>
                                    </div>
                            </div>


                        </form>
                    </div>
                    <div class="col-md-5">
                        <h6>Here are the general steps to get PayPal client ID and app secret:</h6>
                        <ol class="m-4 fz-14 gray-800">
                            <li>Log in to your PayPal developer account. If you don't have one, create a new account at <a
                                    href="https://developer.paypal.com/" target="_new">https://developer.paypal.com/</a>.
                            </li>
                            <li>Once you are logged in, go to the "Dashboard" tab.</li>
                            <li>In the left sidebar, click on "My Apps &amp; Credentials."</li>
                            <li>Under the "REST API apps" section, click the "Create App" button.</li>
                            <li>Enter a name for your app and select the Sandbox environment if you are testing or the Live
                                environment if you are ready to go live.</li>
                            <li>Click the "Create App" button.</li>
                            <li>You will now see your new app's "Client ID" and "Secret" listed under the "App Credentials"
                                section.</li>
                            <li>Copy the client ID and secret and save them in a secure location. These will be used to
                                authenticate your PayPal API requests.</li>
                        </ol>
                        <p class="fz-14">Note that the steps above are for obtaining PayPal REST API credentials, which are used for
                            integrating PayPal payment functionality into your web or mobile application. If you need to
                            obtain other types of PayPal credentials, such as the Classic API credentials, the process may
                            be different. Be sure to consult the PayPal documentation or support resources for more detailed
                            instructions.</p>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade @if (isset($tab) && $tab == 'stripe') show active @endif" id="Stripe-tab-pane"
                role="tabpanel" aria-labelledby="Stripe-tab" tabindex="0">

                <div class="row">
                    <div class="col-md-7">
                        <form action="{{ route('payment.stripe.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-2">
                                <label class="col-form-label gray-800 font-500 fz-14 ">Stripe Active<span class="text-danger">*</span></label>
                                <select class="form-control custom-input select2 w-100" name="STRIPE_ACTIVE">
                                    <option value="on" {{ readConfig('STRIPE_ACTIVE') == 'on' ? 'selected' : null }}>ON
                                    </option>
                                    <option value="off" {{ readConfig('STRIPE_ACTIVE') == 'off' ? 'selected' : null }}>
                                        Off
                                    </option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="col-form-label gray-800 font-500 fz-14" for="stripeKey">Stripe Key </label>
                                <input class="form-control custom-input" name="STRIPE_KEY" value="{{ readConfig('STRIPE_KEY') }}"
                                    placeholder="STRIPE_KEY" id="stripeKey">
                            </div>

                            <div class="form-group mb-2">
                                <label class="col-form-label gray-800 font-500 fz-14" for="stripe-secret">Stripe Secret</label>
                                <input class="form-control custom-input" name="STRIPE_SECRET"
                                    value="{{ readConfig('STRIPE_SECRET') }}" placeholder="STRIPE_SECRET"  id="stripe-secret">
                            </div>


                            <div class="text-center mt-2">
                                <div class="generate-btn-wrapper">
                                    <button type="submit" class="generate-btn px-4">Save</button>
                                </div>
                            </div>


                        </form>
                    </div>
                    <div class="col-md-5">
                        <h6>Here are the general steps to get Stripe client ID and secret:</h6>
                        <ol class="m-4 fz-14">
                            <li>Log in to your Stripe account. If you don't have one, sign up for a new account at <a
                                    href="https://dashboard.stripe.com/register"
                                    target="_new">https://dashboard.stripe.com/register</a>.</li>
                            <li>Once you are logged in, go to the "Developers" section of the Stripe Dashboard.</li>
                            <li>In the left sidebar, click on "API keys."</li>
                            <li>Under the "Standard keys" section, you will see your "Publishable key" and "Secret key."
                            </li>
                            <li>If you have not yet done so, generate a new "Restricted API key" by clicking the "Generate
                                new key" button under the "Restricted keys" section.</li>
                            <li>Enter a name for your key, and choose the permissions that you want to grant to the key.
                            </li>
                            <li>Click the "Generate" button to create the new key.</li>
                            <li>You will now see your new Restricted API key listed under the "Restricted keys" section.
                            </li>
                            <li>Copy the publishable key, secret key, and restricted API key and save them in a secure
                                location. These will be used to authenticate your Stripe API requests.</li>
                        </ol>
                        <p class="fz-14">Note that the steps above are for obtaining Stripe REST API credentials, which are used for
                            integrating Stripe payment functionality into your web or mobile application. If you need to
                            obtain other types of Stripe credentials, such as the Connect platform credentials, the process
                            may be different. Be sure to consult the Stripe documentation or support resources for more
                            detailed instructions</p>
                    </div>
                </div>


            </div>
            <div class="tab-pane fade @if (isset($tab) && $tab == 'rezor') show active @endif" id="RazorPay-tab-pane"
                role="tabpanel" aria-labelledby="RazorPay-tab" tabindex="0">

                <div class="row">
                    <div class="col-md-7">
                        <form action="{{ route('payment.rezor.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-2">
                                <label class="col-form-label" >RAZORPAY_ACTIVE <span class="text-danger">*</span></label>
                                <select class="form-control select2 w-100" name="RAZORPAY_ACTIVE">
                                    <option value="on"
                                        {{ readConfig('RAZORPAY_ACTIVE') == 'on' ? 'selected' : null }}>ON
                                    </option>
                                    <option value="off"
                                        {{ readConfig('RAZORPAY_ACTIVE') == 'off' ? 'selected' : null }}>Off
                                    </option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="col-form-label" for="razorpayKey">RAZORPAY_KEY</label>
                                <input class="form-control" name="RAZORPAY_KEY" value="{{ readConfig('RAZORPAY_KEY') }}"
                                    placeholder="RAZORPAY_KEY" id="razorpayKey">
                            </div>

                            <div class="form-group mb-2">
                                <label class="col-form-label" for="razorpaySecret">RAZORPAY_SECRET</label>
                                <input class="form-control" name="RAZORPAY_SECRET"
                                    value="{{ readConfig('RAZORPAY_SECRET') }}" placeholder="RAZORPAY_SECRET" id="razorpaySecret">
                            </div>


                            <div class="text-center">
                            <div class="generate-btn-wrapper">
                                    <button type="submit" class="generate-btn px-4">Save</button>
                                </div>
                            </div>


                        </form>
                    </div>
                    <div class="col-md-5">
                        <h6>Here are the general steps to get Stripe client ID and secret:</h6>
                        <ol class="m-4 fz-14">
                            <li>Log in to your Stripe account. If you don't have one, sign up for a new account at <a
                                    href="https://dashboard.stripe.com/register"
                                    target="_new">https://dashboard.stripe.com/register</a>.</li>
                            <li>Once you are logged in, go to the "Developers" section of the Stripe Dashboard.</li>
                            <li>In the left sidebar, click on "API keys."</li>
                            <li>Under the "Standard keys" section, you will see your "Publishable key" and "Secret key."
                            </li>
                            <li>If you have not yet done so, generate a new "Restricted API key" by clicking the "Generate
                                new key" button under the "Restricted keys" section.</li>
                            <li>Enter a name for your key, and choose the permissions that you want to grant to the key.
                            </li>
                            <li>Click the "Generate" button to create the new key.</li>
                            <li>You will now see your new Restricted API key listed under the "Restricted keys" section.
                            </li>
                            <li>Copy the publishable key, secret key, and restricted API key and save them in a secure
                                location. These will be used to authenticate your Stripe API requests.</li>
                        </ol>
                        <p class="fz-14">Note that the steps above are for obtaining Stripe REST API credentials, which are used for
                            integrating Stripe payment functionality into your web or mobile application. If you need to
                            obtain other types of Stripe credentials, such as the Connect platform credentials, the process
                            may be different. Be sure to consult the Stripe documentation or support resources for more
                            detailed instructions.</p>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade d-none" id="Mollie-tab-pane" role="tabpanel" aria-labelledby="Mollie-tab"
                tabindex="0">

                <div class="row">
                    <div class="col-md-7">
                        <form action="{{ route('payment.mollie.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-2">
                                <label class="col-form-label">MOLLIE_ACTIVE <span class="text-danger">*</span></label>
                                <select class="form-control select2 w-100" name="MOLLIE_ACTIVE">
                                    <option value="on" {{ readConfig('MOLLIE_ACTIVE') == 'on' ? 'selected' : null }}>
                                        ON
                                    </option>
                                    <option value="off" {{ readConfig('MOLLIE_ACTIVE') == 'off' ? 'selected' : null }}>
                                        Off
                                    </option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="col-form-label">MOLLIE_KEY</label>
                                <input class="form-control" name="MOLLIE_KEY" value="{{ readConfig('MOLLIE_KEY') }}"
                                    placeholder="MOLLIE_KEY">
                            </div>

                            <div class="form-group mb-2">
                                <label class="col-form-label">MOLLIE_Partner_ID</label>
                                <input class="form-control" name="MOLLIE_Partner_ID"
                                    value="{{ readConfig('MOLLIE_Partner_ID') }}" placeholder="MOLLIE_Partner_ID">
                            </div>


                            <div class="form-group mb-2">
                                <label class="col-form-label">MOLLIE_Profile_ID</label>
                                <input class="form-control" name="MOLLIE_Profile_ID"
                                    value="{{ readConfig('MOLLIE_Profile_ID') }}" placeholder="MOLLIE_Profile_ID">
                            </div>


                            <div class="text-center">
                                <div class="generate-btn-wrapper">
                                    <button type="submit" class="generate-btn px-4">Save</button>
                                </div>
                            </div>


                        </form>

                    </div>
                    <div class="col-md-5">

                    </div>
                </div>

            </div>

            <div class="tab-pane fade @if (isset($tab) && $tab == 'bank') show active @endif" id="bank-tab-pane" role="tabpanel" aria
            -labelledby="bank-tab"
            tabindex="0">

            <div class="row">
                <div class="col-md-7">
                    <form action="{{ route('payment.bank.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-2">
                            <label class="col-form-label" for="bankPayment">Bank Payment Active <span class="text-danger">*</span></label>
                            <select class="form-control select2 w-100" name="bank_status" id="bankPayment">
                                <option value="on" {{ readConfig('bank_status') == 'on' ? 'selected' : null }}>
                                    ON
                                </option>
                                <option value="off" {{ readConfig('bank_status') == 'off' ? 'selected' : null }}>
                                    Off
                                </option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label class="col-form-label" for="aboutBank">About the Bank</label>
                            <input class="form-control" name="about_bank" value="{{ readConfig('about_bank') }}"
                                placeholder="About the Bank" id="aboutBank">
                        </div>

                        <div class="form-group mb-2">
                            <label class="col-form-label" for="bankName">Bank Name</label>
                            <input class="form-control" name="bank_name"
                                value="{{ readConfig('bank_name') }}" placeholder="Bank Name" id="bankName">
                        </div>


                        <div class="form-group mb-2">
                            <label class="col-form-label" for="bankNumber">Account Number</label>
                            <input class="form-control" name="account_number"
                                value="{{ readConfig('account_number') }}" placeholder="Account Number" id="bankNumber">
                        </div>


                        <div class="form-group mb-2">
                            <label class="col-form-label" for="accountName">Account Name</label>
                            <input class="form-control" name="account_name"
                                value="{{ readConfig('account_name') }}" placeholder="Account Name" id="accountName">
                        </div>

                        <div class="form-group mb-2">
                            <label class="col-form-label" for="swiftCode">Swift Code</label>
                            <input class="form-control" name="swift_code"
                                value="{{ readConfig('swift_code') }}" placeholder="Swift Code" id="swiftCode">
                        </div>

                        <div class="form-group mb-2">
                            <label class="col-form-label" for="routingNumber">Routing number</label>
                            <input class="form-control" name="routing_number"
                                value="{{ readConfig('routing_number') }}" placeholder="Routing Number" id="routingNumber">
                        </div>


                        <div class="text-center">
                            <div class="generate-btn-wrapper">
                                        <button type="submit" class="generate-btn px-4">Save</button>
                            </div>
                        </div>


                    </form>

                </div>
                <div class="col-md-5">

                </div>
            </div>

        </div>


        </div>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="Papal-tab" data-bs-toggle="tab" data-bs-target="#Papal-tab-pane"
                    type="button" role="tab" aria-controls="Papal-tab-pane" aria-selected="true">Papal Setup</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Stripe-tab" data-bs-toggle="tab" data-bs-target="#Stripe-tab-pane"
                    type="button" role="tab" aria-controls="Stripe-tab-pane" aria-selected="false">Stripe
                    Setup</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="RazorPay-tab" data-bs-toggle="tab" data-bs-target="#RazorPay-tab-pane"
                    type="button" role="tab" aria-controls="RazorPay-tab-pane" aria-selected="false">RazorPay
                    Setup</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="FlutterWave-tab" data-bs-toggle="tab" data-bs-target="#FlutterWave-tab-pane"
                    type="button" role="tab" aria-controls="FlutterWave-tab-pane" aria-selected="false">FlutterWave
                    Setup</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Mollie-tab" data-bs-toggle="tab" data-bs-target="#Mollie-tab-pane"
                    type="button" role="tab" aria-controls="Mollie-tab-pane" aria-selected="false">Mollie
                    Setup</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Crepto-tab" data-bs-toggle="tab" data-bs-target="#Crepto-tab-pane"
                    type="button" role="tab" aria-controls="Crepto-tab-pane" aria-selected="false">Crepto
                    Setup</button>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Papal-tab-pane" role="tabpanel" aria-labelledby="Papal-tab"
                tabindex="0">
                <div>
                    <form action="{{ route('payment.paypal.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
            
                        <div class="form-group mb-2">
                            <label  class="col-form-label">@translate(Paypal active) <span class="text-danger">*</span></label>
                            <select class="form-control select2 w-100" name="PAYPAL_ACTIVE">
                                <option value="on" {{ getSystemSetting('PAYPAL_ACTIVE') == 'on' ? 'selected' : null }}>ON
                                </option>
                                <option value="off" {{ getSystemSetting('PAYPAL_ACTIVE') == 'off' ? 'selected' : null }}>Off
                                </option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label  class="col-form-label">@translate(PAYPAL_CLIENT_ID)</label>
                            <input class="form-control" name="PAYPAL_CLIENT_ID"
                                value="{{ getSystemSetting('PAYPAL_CLIENT_ID') }}" placeholder="PAYPAL_CLIENT_ID">
                        </div>
            
                        <div class="form-group mb-2">
                            <label  class="col-form-label">@translate(PAYPAL_APP_SECRET)</label>
                            <input class="form-control" name="PAYPAL_APP_SECRET"
                                value="{{ getSystemSetting('PAYPAL_APP_SECRET') }}" placeholder="PAYPAL_APP_SECRET">
                        </div>
                
                        <div class="text-center">
                            <button class="btn btn-success " type="submit" name="action"
                                value="published">@translate(Save)</button>
                        </div>
            
            
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="Stripe-tab-pane" role="tabpanel" aria-labelledby="Stripe-tab" tabindex="0">

                <form action="{{ route('payment.stripe.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
    
                    <div class="form-group mb-2">
                        <label class="col-form-label">@translate(STRIPE_ACTIVE) <span class="text-danger">*</span></label>
                        <select class="form-control select2 w-100" name="STRIPE_ACTIVE">
                            <option value="on" {{ getSystemSetting('STRIPE_ACTIVE') == 'on' ? 'selected' : null }}>ON
                            </option>
                            <option value="off" {{ getSystemSetting('STRIPE_ACTIVE') == 'off' ? 'selected' : null }}>Off
                            </option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label  class="col-form-label">@translate(STRIPE_KEY)</label>
                        <input class="form-control" name="STRIPE_KEY" value="{{ getSystemSetting('STRIPE_KEY') }}"
                            placeholder="STRIPE_KEY">
                    </div>
    
                    <div class="form-group mb-2">
                        <label  class="col-form-label">@translate(STRIPE_SECRET)</label>
                        <input class="form-control" name="STRIPE_SECRET" value="{{ getSystemSetting('STRIPE_SECRET') }}"
                            placeholder="STRIPE_SECRET">
                    </div>

    
                    <div class="text-center mt-2">
                        <button class="btn btn-success float-left" type="submit" name="action"
                            value="published">@translate(Save)</button>
                    </div>
    
    
                </form>

            </div>
            <div class="tab-pane fade" id="RazorPay-tab-pane" role="tabpanel" aria-labelledby="RazorPay-tab"
                tabindex="0">

                <form action="{{ route('payment.rezor.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
    
                    <div class="form-group mb-2">
                        <label class="col-form-label">@translate(RAZORPAY_ACTIVE) <span class="text-danger">*</span></label>
                        <select class="form-control select2 w-100" name="RAZORPAY_ACTIVE">
                            <option value="on" {{ getSystemSetting('RAZORPAY_ACTIVE') == 'on' ? 'selected' : null }}>ON
                            </option>
                            <option value="off" {{ getSystemSetting('RAZORPAY_ACTIVE') == 'off' ? 'selected' : null }}>Off
                            </option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label class="col-form-label">@translate(RAZORPAY_KEY)</label>
                        <input class="form-control" name="RAZORPAY_KEY" value="{{ getSystemSetting('RAZORPAY_KEY') }}"
                            placeholder="RAZORPAY_KEY">
                    </div>
    
                    <div class="form-group mb-2">
                        <label class="col-form-label">@translate(RAZORPAY_SECRET)</label>
                        <input class="form-control" name="RAZORPAY_SECRET" value="{{ getSystemSetting('RAZORPAY_SECRET') }}"
                            placeholder="RAZORPAY_SECRET">
                    </div>

    
                    <div class="text-center">
                        <button class="btn btn-success float-left" type="submit" name="action"
                            value="published">@translate(Save)</button>
                    </div>
    
    
                </form>

            </div>
            <div class="tab-pane fade" id="FlutterWave-tab-pane" role="tabpanel" aria-labelledby="FlutterWave-tab"
                tabindex="0">

                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">FlutterWave Submit</button>
                </form>

            </div>
            <div class="tab-pane fade" id="Mollie-tab-pane" role="tabpanel" aria-labelledby="Mollie-tab"
                tabindex="0">

                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary"> Mollie Submit</button>
                </form>

            </div>
            <div class="tab-pane fade" id="Crepto-tab-pane" role="tabpanel" aria-labelledby="Crepto-tab"
                tabindex="0">

                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Crepto Submit</button>
                </form>

            </div>

        </div>
    </div>
@endsection

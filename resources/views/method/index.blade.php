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
                <button class="nav-link" id="Mollie-tab" data-bs-toggle="tab" data-bs-target="#Mollie-tab-pane"
                    type="button" role="tab" aria-controls="Mollie-tab-pane" aria-selected="false">Mollie
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
                            <label  class="col-form-label">Paypal active <span class="text-danger">*</span></label>
                            <select class="form-control select2 w-100" name="PAYPAL_ACTIVE">
                                <option value="on" {{  App\Http\Controllers\readConfig('PAYPAL_ACTIVE') == 'on' ? 'selected' : null }}>ON
                                </option>
                                <option value="off" {{ App\Http\Controllers\readConfig('PAYPAL_ACTIVE') == 'off' ? 'selected' : null }}>Off
                                </option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label  class="col-form-label">PAYPAL_CLIENT_ID</label>
                            <input class="form-control" name="PAYPAL_CLIENT_ID"
                                value="{{ App\Http\Controllers\readConfig('PAYPAL_CLIENT_ID') }}" placeholder="PAYPAL_CLIENT_ID">
                        </div>
            
                        <div class="form-group mb-2">
                            <label  class="col-form-label">PAYPAL_APP_SECRET</label>
                            <input class="form-control" name="PAYPAL_APP_SECRET"
                                value="{{ App\Http\Controllers\readConfig('PAYPAL_APP_SECRET') }}" placeholder="PAYPAL_APP_SECRET">
                        </div>
                
                        <div class="text-center">
                            <button class="btn btn-success " type="submit" name="action"
                                value="published">Save</button>
                        </div>
            
            
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="Stripe-tab-pane" role="tabpanel" aria-labelledby="Stripe-tab" tabindex="0">

                <form action="{{ route('payment.stripe.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
    
                    <div class="form-group mb-2">
                        <label class="col-form-label">STRIPE_ACTIVE<span class="text-danger">*</span></label>
                        <select class="form-control select2 w-100" name="STRIPE_ACTIVE">
                            <option value="on" {{ App\Http\Controllers\readConfig('STRIPE_ACTIVE') == 'on' ? 'selected' : null }}>ON
                            </option>
                            <option value="off" {{ App\Http\Controllers\readConfig('STRIPE_ACTIVE') == 'off' ? 'selected' : null }}>Off
                            </option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label  class="col-form-label">STRIPE_KEY</label>
                        <input class="form-control" name="STRIPE_KEY" value="{{ App\Http\Controllers\readConfig('STRIPE_KEY') }}"
                            placeholder="STRIPE_KEY">
                    </div>
    
                    <div class="form-group mb-2">
                        <label  class="col-form-label">STRIPE_SECRET</label>
                        <input class="form-control" name="STRIPE_SECRET" value="{{ App\Http\Controllers\readConfig('STRIPE_SECRET') }}"
                            placeholder="STRIPE_SECRET">
                    </div>

    
                    <div class="text-center mt-2">
                        <button class="btn btn-success float-left" type="submit" name="action"
                            value="published">Save</button>
                    </div>
    
    
                </form>

            </div>
            <div class="tab-pane fade" id="RazorPay-tab-pane" role="tabpanel" aria-labelledby="RazorPay-tab"
                tabindex="0">

                <form action="{{ route('payment.rezor.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
    
                    <div class="form-group mb-2">
                        <label class="col-form-label">RAZORPAY_ACTIVE <span class="text-danger">*</span></label>
                        <select class="form-control select2 w-100" name="RAZORPAY_ACTIVE">
                            <option value="on" {{ App\Http\Controllers\readConfig('RAZORPAY_ACTIVE') == 'on' ? 'selected' : null }}>ON
                            </option>
                            <option value="off" {{ App\Http\Controllers\readConfig('RAZORPAY_ACTIVE') == 'off' ? 'selected' : null }}>Off
                            </option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label class="col-form-label">RAZORPAY_KEY</label>
                        <input class="form-control" name="RAZORPAY_KEY" value="{{ App\Http\Controllers\readConfig('RAZORPAY_KEY') }}"
                            placeholder="RAZORPAY_KEY">
                    </div>
    
                    <div class="form-group mb-2">
                        <label class="col-form-label">RAZORPAY_SECRET</label>
                        <input class="form-control" name="RAZORPAY_SECRET" value="{{ App\Http\Controllers\readConfig('RAZORPAY_SECRET') }}"
                            placeholder="RAZORPAY_SECRET">
                    </div>

    
                    <div class="text-center">
                        <button class="btn btn-success float-left" type="submit" name="action"
                            value="published">Save</button>
                    </div>
    
    
                </form>

            </div>
           
            <div class="tab-pane fade" id="Mollie-tab-pane" role="tabpanel" aria-labelledby="Mollie-tab"
                tabindex="0">

                <form action="{{ route('payment.mollie.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
    
                    <div class="form-group mb-2">
                        <label class="col-form-label">MOLLIE_ACTIVE <span class="text-danger">*</span></label>
                        <select class="form-control select2 w-100" name="MOLLIE_ACTIVE">
                            <option value="on" {{ App\Http\Controllers\readConfig('MOLLIE_ACTIVE') == 'on' ? 'selected' : null }}>ON
                            </option>
                            <option value="off" {{ App\Http\Controllers\readConfig('MOLLIE_ACTIVE') == 'off' ? 'selected' : null }}>Off
                            </option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label class="col-form-label">MOLLIE_KEY</label>
                        <input class="form-control" name="MOLLIE_KEY" value="{{ App\Http\Controllers\readConfig('MOLLIE_KEY') }}"
                            placeholder="MOLLIE_KEY">
                    </div>
    
                    <div class="form-group mb-2">
                        <label class="col-form-label">MOLLIE_Partner_ID</label>
                        <input class="form-control" name="MOLLIE_Partner_ID" value="{{ App\Http\Controllers\readConfig('MOLLIE_Partner_ID') }}"
                            placeholder="MOLLIE_Partner_ID">
                    </div>


                    <div class="form-group mb-2">
                        <label class="col-form-label">MOLLIE_Profile_ID</label>
                        <input class="form-control" name="MOLLIE_Profile_ID" value="{{ App\Http\Controllers\readConfig('MOLLIE_Profile_ID') }}"
                            placeholder="MOLLIE_Profile_ID">
                    </div>

    
                    <div class="text-center">
                        <button class="btn btn-success float-left" type="submit" name="action"
                            value="published">Save</button>
                    </div>
    
    
                </form>

            </div>
            

        </div>
    </div>
@endsection

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->has('tab')) {
            $tab = $request->tab;
        } else {
            $tab = 'paypal';
        }
        return view('method.index',compact('tab'));
    }

    public function paypalSettingStore(Request $request)
    {

        if ($request->has('PAYPAL_ACTIVE')) {
            writeConfig('PAYPAL_ACTIVE', $request->PAYPAL_ACTIVE);
        }

        if ($request->has('PAYPAL_CLIENT_ID')) {
            writeConfig('PAYPAL_CLIENT_ID', $request->PAYPAL_CLIENT_ID);
        }

        if ($request->has('PAYPAL_APP_SECRET')) {
            writeConfig('PAYPAL_APP_SECRET', $request->PAYPAL_APP_SECRET);
        }

       

        toast('Paypal payment method setup', 'success');
        return redirect()->route('payment.method', ['tab' => "paypal"]);
    }


    public function stripeSettingStore(Request $request)
    {
        if ($request->has('STRIPE_ACTIVE')) {
            writeConfig('STRIPE_ACTIVE', $request->STRIPE_ACTIVE);
        }

        if ($request->has('STRIPE_KEY')) {
            writeConfig('STRIPE_KEY', $request->STRIPE_KEY);
        }

        if ($request->has('STRIPE_SECRET')) {
            writeConfig('STRIPE_SECRET', $request->STRIPE_SECRET);
        }

      

        toast('Stripe payment method setup', 'success');
        return redirect()->route('payment.method', ['tab' => "stripe"]);

    }

    public function mollieSettingStore(Request $request)
    {
        if ($request->has('MOLLIE_ACTIVE')) {
            writeConfig('MOLLIE_ACTIVE', $request->MOLLIE_ACTIVE);
        }

        if ($request->has('MOLLIE_KEY')) {
            writeConfig('MOLLIE_KEY', $request->MOLLIE_KEY);
        }

        if ($request->has('MOLLIE_Partner_ID')) {
            writeConfig('MOLLIE_Partner_ID', $request->MOLLIE_Partner_ID);
        }

        if ($request->has('MOLLIE_Profile_ID')) {
            writeConfig('MOLLIE_Profile_ID', $request->MOLLIE_Profile_ID);
        }

     
        toast('Mollie payment method setup', 'success');
        return redirect()->route('payment.method', ['tab' => "mollie"]);
    }

    public function rezorSettingStore(Request $request)
    {
        if ($request->has('RAZORPAY_ACTIVE')) {
            writeConfig('RAZORPAY_ACTIVE', $request->RAZORPAY_ACTIVE);
        }

        if ($request->has('RAZORPAY_KEY')) {
            writeConfig('RAZORPAY_KEY', $request->RAZORPAY_KEY);
        }

        if ($request->has('RAZORPAY_SECRET')) {
            writeConfig('RAZORPAY_SECRET', $request->RAZORPAY_SECRET);
        }

        toast('Razorpay payment method setup', 'success');
        return redirect()->route('payment.method', ['tab' => "rezor"]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Plan;
use App\Models\PlanExpanse;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mollie\Laravel\Facades\Mollie;
use Razorpay\Api\Api;
use Stripe;
use Omnipay\Omnipay;

class PurchaseController extends Controller
{

    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_APP_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function purchase($id)
    {
        $plan = Plan::where('id', $id)->first();
        $user = Auth::user();
        return view('plan.purchase', compact('plan', 'user'));
    }
    public function stripeLoad($id)
    {
        $plan = Plan::where('id', $id)->first();
        $user = Auth::user();
        return view('plan.stripePay', compact('plan', 'user'));
    }

    public function paypalPayLoad(Request $request)
    {
        $plan = Plan::where('id', $request->plan_id)->first();
        $user = Auth::user();
        return view('plan.paypal', compact('plan', 'user'));
    }


    public function bankPayLoad(Request $request)
    {
        $plan = Plan::where('id', $request->plan_id)->first();
        $user = Auth::user();
        return view('plan.bank', compact('plan', 'user'));
    }

    public function purchaseDone(Request $request)
    {
        $request->validate([
            'paymentMethod' => 'required',
            'paymentAmount' => 'required',
        ]);
        // return $request;
        $user = Auth::user();
        $plan = Plan::where('id', $request->plan_id)->first();
        $orderInformationUpdate = false;
        $message = '';


        if ($plan->price <= $request->paymentAmount) {

            // payment get ways the data

            $order = new Order();
            $order->invoice = invoiceGenerator();
            $order->user_id = $user->id;
            $order->plan_id = $plan->id;
            $order->total = $request->paymentAmount;
            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->save();


            //done stripe
            if ($request->paymentMethod == 'stripe') {
                try {
                    Stripe\Stripe::setApiKey(readConfig('STRIPE_SECRET'));
                    Stripe\Charge::create([
                        "amount" => 100 * $request->paymentAmount,
                        "currency" => "usd",
                        "source" => $request->stripeToken,
                        "description" => $plan->title . ' Purchase',
                    ]);
                    $orderInformationUpdate = true;
                    $message = 'Stripe payment is successfully done';
                } catch (Exception $e) {
                    $message = $e->getMessage();
                }
            } else if ($request->paymentMethod == 'rezorpay') {
                $input = $request->all();
                $api = new Api(readConfig('RAZORPAY_KEY'), readConfig('RAZORPAY_SECRET'));

                $payment = $api->payment->fetch($input['razorpay_payment_id']);

                if (count($input)  && !empty($input['razorpay_payment_id'])) {
                    try {
                        $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                        $orderInformationUpdate = true;
                        $message = 'Rezorpay payment is successfully done';
                    } catch (Exception $e) {
                        $message = $e->getMessage();
                    }
                }
            } else if ($request->paymentMethod == 'mollie') {
                $payment = Mollie::api()->payments->create([
                    "amount" => [
                        "currency" => "EUR",
                        "value" => "10.00" // You must send the correct number of decimals, thus we enforce the use of strings
                    ],
                    "description" => '1 Method',
                    "redirectUrl" => 'http://127.0.0.1:8000/payment/success',
                    "webhookUrl" => 'http://127.0.0.1:8000/handle',
                    "metadata" => [
                        "order_id" => "1-rumon",
                    ],
                ]);
                // redirect customer to Mollie checkout page
                return redirect($payment->getCheckoutUrl(), 303);
            } else if ($request->paymentMethod == 'paypal') {

                try {

                    $response = $this->gateway->purchase(array(
                        'amount' => $request->paymentAmount,
                        'currency' => 'USD',
                        'returnUrl' => route('paypal.pay.success', $order->id),
                        'cancelUrl' => route('paypal.pay.error', $order->id)
                    ))->send();

                    if ($response->isRedirect()) {
                        $response->redirect();
                    } else {
                        return $response->getMessage();
                    }
                } catch (\Throwable $th) {
                    return $th->getMessage();
                }
            } else if ($request->paymentMethod == 'bank') {
                if ($request->has('value_1')) {
                    $order->other = fileUpload($request->value_1, 'payment', 'bank');
                }
                $order->is_paid = false;
                $order->payment_method = $request->paymentMethod;
                $order->save();

                $user->plan_id = $plan->id;
                $user->save();
                $orderInformationUpdate = false;

                toast('Plan is successfully subscribed  Wating for approvel', 'success');
                return redirect()->route('plan.expanse', $order->id);
            } else {
                //it's free
                $orderInformationUpdate = true;
            }

            if ($orderInformationUpdate) {
                // here save the order
                $order->is_paid = true;
                $order->payment_method = $request->paymentMethod;
                $order->save();

                //get old expnase
                $oldExpanse = PlanExpanse::where('id', $user->plan_expanse_id)->first();

                if ($oldExpanse != null) {
                    //eassign the plan expanse
                    $expanse = new PlanExpanse();
                    $expanse->user_id = $user->id;
                    $expanse->order_id = $order->id;
                    $expanse->plan_id = $plan->id;
                    $expanse->word_count = $plan->word_count;
                    $expanse->call_api_count = $plan->call_api_count + ($oldExpanse->call_api_count - $oldExpanse->current_api_count);
                    $expanse->documet_count = $plan->documet_count + ($oldExpanse->documet_count - $oldExpanse->current_documet_count);
                    $expanse->image_count = $plan->image_count + ($oldExpanse->image_count - $oldExpanse->current_image_count);
                    $expanse->activated_at = Carbon::now();
                    $expanse->expire_at =  Carbon::now()->addDay(30);
                    $expanse->save();
                } else {
                    //eassign the plan expanse
                    $expanse = new PlanExpanse();
                    $expanse->user_id = $user->id;
                    $expanse->order_id = $order->id;
                    $expanse->plan_id = $plan->id;
                    $expanse->word_count = $plan->word_count;
                    $expanse->call_api_count = $plan->call_api_count;
                    $expanse->documet_count = $plan->documet_count;
                    $expanse->image_count = $plan->image_count;
                    $expanse->activated_at = Carbon::now();
                    $expanse->expire_at =  Carbon::now()->addDay(30);
                    $expanse->save();
                }



                //update user active plane
                $user->plan_id = $plan->id;
                $user->plan_expanse_id = $expanse->id;
                $user->save();

                myAlert('success', 'Plan is successfully subscribed  enjoy the service');
                return redirect()->route('plan.expanse', $order->id);
            } else {
                toast('There are some problem, please try again', 'error');
                return back();
            }
        } else {
            myAlert('error', 'Your payabol amount is lower the the plan purchase price, please try again');
            return back();
        }
    }

    public function paySuccess(Request $request, $id)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();
                $order = Order::where('id', $id)->first();
                $user = Auth::user();
                $plan = Plan::where('id', $order->plan_id)->first();
                $order->is_paid = true;
                $order->other = $arr['id'];
                $order->payment_method = 'paypal';
                $order->save();

                //get old expnase
                $oldExpanse = PlanExpanse::where('id', $user->plan_expanse_id)->first();

                if ($oldExpanse != null) {
                    //eassign the plan expanse
                    $expanse = new PlanExpanse();
                    $expanse->user_id = $user->id;
                    $expanse->order_id = $order->id;
                    $expanse->plan_id = $plan->id;
                    $expanse->word_count = $plan->word_count;
                    $expanse->call_api_count = $plan->call_api_count + ($oldExpanse->call_api_count - $oldExpanse->current_api_count);
                    $expanse->documet_count = $plan->documet_count + ($oldExpanse->documet_count - $oldExpanse->current_documet_count);
                    $expanse->image_count = $plan->image_count + ($oldExpanse->image_count - $oldExpanse->current_image_count);
                    $expanse->activated_at = Carbon::now();
                    $expanse->expire_at =  Carbon::now()->addDay(30);
                    $expanse->save();
                } else {
                    //eassign the plan expanse
                    $expanse = new PlanExpanse();
                    $expanse->user_id = $user->id;
                    $expanse->order_id = $order->id;
                    $expanse->plan_id = $plan->id;
                    $expanse->word_count = $plan->word_count;
                    $expanse->call_api_count = $plan->call_api_count;
                    $expanse->documet_count = $plan->documet_count;
                    $expanse->image_count = $plan->image_count;
                    $expanse->activated_at = Carbon::now();
                    $expanse->expire_at =  Carbon::now()->addDay(30);
                    $expanse->save();
                }



                //update user active plane
                $user->plan_id = $plan->id;
                $user->plan_expanse_id = $expanse->id;
                $user->save();

                myAlert('success', 'Payment is Successfull. Your Transaction Id is : ' . $arr['id']);
                return redirect()->route('plan.expanse', $order->id);
            } else {
                myAlert('success', $response->getMessage());
                return back();
            }
        } else {
            myAlert('success', 'Payment declined!');
            return back();
        }
    }

    public function error()
    {
        myAlert('error', 'User declined the payment!');
        return back();
    }

    public function expanse($id)
    {
        //id is order id

        $user = Auth::user();
        $order = Order::where('id', $id)->first();
        $plan = Plan::where('id', $order->plan_id)->first();

        $expanse = PlanExpanse::where('user_id', $user->id)->where('order_id', $order->id)->first();
        return view('plan.expanse', compact('plan', 'expanse', 'order'));
    }

    public function expanseBasePlan($id)
    {
        //id is plan id

        $user = Auth::user();
        $plan = Plan::where('id', $user->plan_id)->first();
        $expanse = PlanExpanse::where('id', $user->plan_expanse_id)->first();
        $order = Order::where('id', $expanse->order_id)->first();
        return view('plan.expanse', compact('plan', 'expanse', 'order'));
    }


    /**
     * After the customer has completed the transaction,
     * you can fetch, check and process the payment.
     * This logic typically goes into the controller handling the inbound webhook request.
     * See the webhook docs in /docs and on mollie.com for more information.
     */
    public function handleWebhookNotification(Request $request)
    {
        $paymentId = $request->input('id');
        $payment = Mollie::api()->payments->get($paymentId);

        if ($payment->isPaid()) {
            echo 'Payment received.';
            // Do your thing ...
        }
    }
}

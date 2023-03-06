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

class PurchaseController extends Controller
{
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

    public function purchaseDone(Request $request)
    {
        // $request->validate([
        //     'paymentMethod'=>'required',
        
        // ]);
        // return $request;
        $user = Auth::user();
        $plan = Plan::where('id', $request->plan_id)->first();
        $orderInformationUpdate = false;
        $message = '';


        if ($plan->price <= $request->paymentAmount) {

            // payment get ways the data

            $order = new Order();
            $order->invoice = 'invoice id';
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
                $order->other = $request->value_1;
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
                    $expanse->expire_at =  $plan->duration == 0 ? null : Carbon::now()->addDay($plan->duration);
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
                    $expanse->expire_at =  $plan->duration == 0 ? null : Carbon::now()->addDay($plan->duration);
                    $expanse->save();
                }



                //update user active plane
                $user->plan_id = $plan->id;
                $user->plan_expanse_id = $expanse->id;
                $user->save();

                myAlert('success', 'Plan is successfully subscribed  enjoy the service');
                return redirect()->route('plan.expanse', $plan->id);
            } else {
                toast('There are some problem, please try again','error');
                return back();
            }
        } else {
            myAlert('error','Your payabol amount is lower the the plan purchase price, please try again');
            return back();
        }
        return $request;
    }

    public function expanse($id,ExpansesChart $expanseChart)
    {

        $expanseChart = $expanseChart->build();
        $user = Auth::user();
        $plan = Plan::where('id', $id)->first();
        $order = Order::where('user_id', $user->id)->where('plan_id', $id)->first();
        $expanse = PlanExpanse::where('user_id', $user->id)
            ->where('plan_id', $id)->where('order_id', $order->id)->first();
        return view('plan.expanse', compact('plan', 'expanse', 'order','expanseChart'));
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

<?php

namespace App\Http\Controllers;

use App\Charts\ExpansesChart;
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

use function Termwind\render;

class PlanController extends Controller
{
    //


    public function userIndex()
    {
        $user = Auth::user();
        $plans = Plan::where('is_published', true)->latest()->get();
        return view('plan.userIndex', compact('plans', 'user'));
    }

    public function index()
    {
        $plans = Plan::latest()->get();
        return view('plan.index', compact('plans'));
    }

    public function create()
    {
        return view('plan.create');
    }


    public function store(Request $request)
    {
        $plan = new Plan();
        $plan->user_id = Auth::id();
        $plan->name = $request->name;
        $plan->word_count = $request->word_count;
        $plan->call_api_count = $request->call_api_count;
        $plan->documet_count = $request->documet_count;
        $plan->lang = $request->lang;
        $plan->image_count = $request->image_count;
        $plan->price = $request->price;
        $plan->duration = $request->duration;
        $plan->save();
        alert('Plan', 'Plan Created Succssfully', 'success');
        return back();
    }


    public function edit($id)
    {
        $plan = Plan::where('id', $id)->first();
        return view('plan.edit', compact('plan'));
    }


    public function update(Request $request)
    {
        $plan = Plan::where('id', $request->id);
        $plan->user_id = Auth::id();
        $plan->name = $request->name;
        $plan->word_count = $request->word_count;
        $plan->call_api_count = $request->call_api_count;
        $plan->documet_count = $request->documet_count;
        $plan->lang = $request->lang;
        $plan->duration = $request->duration;
        $plan->image_count = $request->image_count;
        $plan->price = $request->price;
        $plan->save();
        alert('Plan', 'Plan Update Succssfully', 'success');
        return back();
    }

    public function status($id, $status)
    {
        $plan = Plan::where('id', $id)->first();
        if ($status == 'active') {
            $plan->is_published = true;
        } else {
            $plan->is_published = false;
        }
        $plan->save();
        alert('Plan', 'Plan Status is updated Succssfully', 'success');
        return back();
    }


    public function purchase($id)
    {
        $plan = Plan::where('id', $id)->first();
        $user = Auth::user();
        return view('plan.purchase', compact('plan', 'user'));
    }

    public function purchaseDone(Request $request)
    {
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

                alert('Plan', 'Plan is successfully subscribed  enjoy the service', 'success');
                return redirect()->route('plan.expanse', $plan->id);
            } else {
                alert('Plan', 'There are some problem, please try again', 'success');
                return back();
            }
        } else {
            alert('Plan', 'Your payabol amount is lower the the plan purchase price, please try again', 'success');
            return back();
        }
        return $request;
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
}

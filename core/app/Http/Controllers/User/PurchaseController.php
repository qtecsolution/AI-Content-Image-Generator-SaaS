<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Plan;
use App\Models\PlanExpense;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if($plan->price <= 0){
            $oldPurchase = PlanExpense::where(['user_id'=>$user->id,'plan_id'=>$plan->id])->first();
            if($oldPurchase!=''){
                myAlert('success', "You've already taken advantage of this free package");
                return redirect()->route('user.purchase');
            }
        }
        return view('user.purchase.purchase', compact('plan', 'user'));
    }
    public function stripeLoad(Request $request,$id)
    {
        $plan = Plan::where('id', $id)->first();
        $user = Auth::user();
        $type =$request->type == 2 ? 2 : 1;
        return view('user.purchase.stripePay', compact('plan', 'user','type'));
    }

    public function paypalPayLoad(Request $request)
    {
        $plan = Plan::where('id', $request->plan_id)->first();
        $user = Auth::user();
        return view('user.purchase.paypal', compact('plan', 'user'));
    }


    public function bankPayLoad(Request $request)
    {
        $plan = Plan::where('id', $request->plan_id)->first();
        $user = Auth::user();
        $type =$request->type == 2 ? 2 : 1;
        return view('user.purchase.bank', compact('plan', 'user','type'));
    }

    public function purchaseDone(Request $request)
    {
        //return $request->all();
        $request->validate([
            'paymentMethod' => 'required',
            'paymentAmount' => 'required',
        ]);
        // return $request;
        $user = Auth::user();
        $plan = Plan::where('id', $request->plan_id)->first();
        $orderInformationUpdate = false;
        $price = $request->type == 2 ? 2 : 1;
        if($price <= 0){
            $oldPurchase = PlanExpense::where(['user_id'=>$user->id,'plan_id'=>$plan->id])->where('activated_at', '<=', now())
            ->where(function ($query) {
                $query->whereNull('expire_at')
                    ->orWhere('expire_at', '>', now());
            })->first();
            if($oldPurchase!=''){
                myAlert('success', "You've already taken advantage of this free package");
                return redirect()->route('user.purchase');
            }
        }


        if ($price <= $request->paymentAmount) {

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
            $order->type = $request->type;
            if(isset($request->payment_id) && $request->payment_id !== ''){
                $order->payment_id = $request->payment_id;
            }
            if(isset($request->stripeToken) && $request->stripeToken !== ''){
                $order->payment_id = $request->stripeToken;
            }
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
            }  else if ($request->paymentMethod == 'paypal') {

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
                return redirect()->route('plan.expense', $order->id);
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
                $oldexpense = showBalance();
                $totalDays = $request->type == 2? 365: 30;
                $months = $order->type == 2? 12: 1;
                if(isset(demoPlan()->word)){
                    $expense = new PlanExpense();
                    $expense->user_id = $user->id;
                    $expense->order_id = $order->id;
                    $expense->plan_id = $plan->id;
                    $expense->word_count = demoPlan()->word;
                    $expense->call_api_count = demoPlan()->api_call;
                    $expense->documet_count = demoPlan()->document;
                    $expense->image_count = demoPlan()->image;
                    $expense->type = 1;
                    $expense->activated_at = Carbon::now();
                    $expense->expire_at =  Carbon::now()->addDay(30);
                    $expense->save();
                }else{
                    if ($oldexpense != "") {
                        $totalDays += $oldexpense->remaining_days; // Add the previous remaining days 
                        //eassign the plan expense
                        $expense = new PlanExpense();
                        $expense->user_id = $user->id;
                        $expense->order_id = $order->id;
                        $expense->plan_id = $plan->id;
                        $expense->word_count = $plan->word_count;
                        $expense->call_api_count = ($plan->call_api_count*$months) + $oldexpense->api_call;
                        $expense->documet_count = ($plan->documet_count*$months) + $oldexpense->document;
                        $expense->image_count = ($plan->image_count*$months) + $oldexpense->image;
                        $expense->type = $request->type;
                        $expense->activated_at = Carbon::now();
                        $expense->expire_at =  Carbon::now()->addDay($totalDays);
                        $expense->save();
                    } else {
                        //eassign the plan expense
                        $expense = new PlanExpense();
                        $expense->user_id = $user->id;
                        $expense->order_id = $order->id;
                        $expense->plan_id = $plan->id;
                        $expense->word_count = $plan->word_count;
                        $expense->call_api_count = $plan->call_api_count*$months;
                        $expense->documet_count = $plan->documet_count*$months;
                        $expense->image_count = $plan->image_count*$months;
                        $expense->type = $request->type;
                        $expense->activated_at = Carbon::now();
                        $expense->expire_at =  Carbon::now()->addDay($totalDays);
                        $expense->save();
                    }

                }

                //update user active plane
                $user->plan_id = $plan->id;
                $user->plan_expense_id = $expense->id;
                $user->save();

                myAlert('success', 'Plan is successfully subscribed  enjoy the service');
                return redirect()->route('plan.userexpense');
            } else {
                myAlert('error','There are some problem, please try again');
                return back();
            }
        } else {
            myAlert('error', 'Your payable amount is lower the the plan purchase price, please try again');
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
               $oldexpense = showBalance();
               $totalDays = $order->type == 2? 365: 30;
               $months = $order->type == 2? 12: 1;

                if ($oldexpense != null) {
                    $totalDays += $oldexpense->remaining_days; // Add previous remaining days
                    //eassign the plan expense
                    $expense = new PlanExpense();
                    $expense->user_id = $user->id;
                    $expense->order_id = $order->id;
                    $expense->plan_id = $plan->id;
                    $expense->word_count = $plan->word_count;
                    $expense->call_api_count = ($plan->call_api_count*$months) + $oldexpense->api_call;
                    $expense->documet_count = ($plan->documet_count*$months) + $oldexpense->document;
                    $expense->image_count = ($plan->image_count*$months) + $oldexpense->image;
                    $expense->type = $request->type;
                    $expense->activated_at = Carbon::now();
                    $expense->expire_at =  Carbon::now()->addDay($totalDays);
                    $expense->save();
                } else {
                    //eassign the plan expense
                    $expense = new PlanExpense();
                    $expense->user_id = $user->id;
                    $expense->order_id = $order->id;
                    $expense->plan_id = $plan->id;
                    $expense->word_count = $plan->word_count;
                    $expense->call_api_count = $plan->call_api_count*$months;
                    $expense->documet_count = $plan->documet_count*$months;
                    $expense->image_count = $plan->image_count*$months;
                    $expense->activated_at = Carbon::now();
                    $expense->expire_at =  Carbon::now()->addDay($totalDays);
                    $expense->save();
                }



                //update user active plane
                $user->plan_id = $plan->id;
                $user->plan_expense_id = $expense->id;
                $user->save();

                myAlert('success', 'Payment is Successfull. Your Transaction Id is : ' . $arr['id']);
                return redirect()->route('plan.expense', $order->id);
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


    // User Plan expense
    public function userexpense()
    {

        $user = Auth::user();
        $plan = Plan::where('id', $user->plan_id)->first();
        $expense = PlanExpense::where('id', $user->plan_expense_id)->first();
        $order = Order::where('id', $expense->order_id)->first();
        return view('user.purchase.userExpense', compact('plan', 'expense', 'order'));
    }
    public function userPurchase()
    {
        $user = Auth::user();
        $plans = Plan::where('is_published', true)->orderBy('id','ASC')->get();
        return view('user.purchase.userPurchase', compact('plans', 'user'));
    }

    // User Transaction History
    public function userTransactions(){
        $user = Auth::user();
        $allData = Order::with(['user', 'plan'])->where('user_id',$user->id)->orderBy('orders.id', 'DESC')->paginate(12);
        return view('user.purchase.transactions',compact('allData'));
    }
    public function userTransactionDetails($orderId){
        $order = Order::where(['id'=> $orderId,'user_id'=>Auth::user()->id])->firstOrFail();
        $plan = Plan::where('id', $order->plan_id)->first();
        $expense = PlanExpense::where('order_id', $order->id)->first();
        return view('user.purchase.transactionDetails', compact('plan', 'expense', 'order'));
    }

}

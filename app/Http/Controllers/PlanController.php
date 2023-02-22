<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Plan;
use App\Models\PlanExpanse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('plan.purchase', compact('plan'));
    }

    public function purchaseDone(Request $request)
    {
        $user = Auth::user();
        $plan = Plan::where('id' , $request->plan_id)->first();
        if ($plan->price <= $request->paymentAmount) {
            // here save the order
            $order = new Order();
            $order->invoice = 'invoice id';
            $order->user_id = $user->id;
            $order->plan_id = $plan->id;
            $order->is_paid = true;
            $order->total = $request->paymentAmount;
            $order->payment_method = $request->payment_method;
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
            return redirect()->route('plan.expanse',$plan->id);
        } else {
            alert('Plan', 'Your payabol amount is lower the the plan purchase price, please try again', 'success');
            return back();
        }
        return $request;
    }

    public function expanse($id)
    {

        $user = Auth::user();
        $plan = Plan::where('id', $id)->first();
        $order = Order::where('user_id', $user->id)->where('plan_id', $id)->first();
        $expanse = PlanExpanse::where('user_id', $user->id)
            ->where('plan_id', $id)->where('order_id', $order->id)->first();
        return view('plan.expanse', compact('plan', 'expanse', 'order'));
    }
}

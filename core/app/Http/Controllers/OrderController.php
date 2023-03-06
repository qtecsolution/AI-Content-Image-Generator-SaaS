<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Plan;
use App\Models\PlanExpanse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $sales = Order::latest()->paginate(10);
        return view('order.index', compact('sales'));
    }

    function approved($id)
    {
        $order = Order::where('id', $id)->first();
        $user = Auth::user();
        $plan = Plan::where('id', $order->plan_id)->first();
        $order->is_paid = true;
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
        // return $expanse;
        $user->plan_expanse_id = $expanse->id;
        $user->save();
      
        $order->save();

        toast('This Order is approved', 'success');
        return redirect()->route('plan.expanse', $order->id);
    }
}

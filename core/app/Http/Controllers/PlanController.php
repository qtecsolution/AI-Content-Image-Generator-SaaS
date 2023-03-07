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
        $plan->image_count = $request->image_count;
        $plan->price = $request->price;
        $plan->save();
        myAlert('success', 'Plan Created Succssfully');
        return back();
    }


    public function edit($id)
    {
        $plan = Plan::where('id', $id)->first();
        return view('plan.edit', compact('plan'));
    }


    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
            'word_count' => 'required',
            'documet_count' => 'required',
        ]);

        try {
            $data = Plan::findOrFail($id);
            $input = $request->except(['_token', '_method']);
            $input['user_id'] = Auth::user()->id;
            
            $data->update($input);
            myAlert('success', 'Plan Update updated successfully.');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return back();
        }
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
        myAlert('success', 'Plan Status is updated Succssfully');
        return back();
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

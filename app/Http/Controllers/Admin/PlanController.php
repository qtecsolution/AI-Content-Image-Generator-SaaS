<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\Plan;
use App\Models\PlanExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{

    public function index()
    {
        $plans = Plan::orderBy('id','ASC')->get();
        return view('admin.plan.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.plan.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'word_count' => 'required',
            'max_words' => 'required',
            'image_count' => 'required',
            'price' => 'required',
            'yearly_price' => 'required',
            'image_count' => 'required',
        ]);

        try {
            $input = $request->except('_token');
            $input['user_id'] = Auth::user()->id;
            $input['templates'] = in_array('0', $request->templates) ? 0 : implode(',',$request->templates);
            if(isset($request->code_generate_enabled)){
                $input['code_generate_enabled'] = 1;
            }
            if(isset($request->chat_enabled)){
                $input['chat_enabled'] = 1;
            }
            if(isset($request->support_enabled)){
                $input['support_enabled'] = 1;
            }

            Plan::create($input);
            myAlert('success', 'Plan Created Succssfully');
            return redirect()->route('plan.index');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return back();
        }
    }


    public function edit($id)
    {
        $plan = Plan::where('id', $id)->first();
        $planTemplates = explode(',',$plan->templates);
        return view('admin.plan.edit', compact('plan','planTemplates'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'word_count' => 'required',
            'max_words' => 'required',
            'image_count' => 'required',
            'price' => 'required',
            'yearly_price' => 'required',
            'image_count' => 'required',
        ]);

        try {
            $data = Plan::findOrFail($id);
            $input = $request->except(['_token', '_method']);
            $input['user_id'] = Auth::user()->id;
            $input['templates'] = in_array('0', $request->templates) ? 0 : implode(',',$request->templates);
            if(!isset($request->code_generate_enabled)){
                 $input['code_generate_enabled'] = 0;
            }
            if(!isset($request->chat_enabled)){
                 $input['chat_enabled'] = 0;
            }
            if(!isset($request->support_enabled)){
                 $input['support_enabled'] = 0;
            }
           // return $input;

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

    public function expense($id)
    {
        //id is order id
        $order = Order::where('id', $id)->first();
        $plan = Plan::where('id', $order->plan_id)->first();

        $expense = PlanExpense::where('order_id', $order->id)->first();
        return view('admin.plan.expense', compact('plan', 'expense', 'order'));
    }
}

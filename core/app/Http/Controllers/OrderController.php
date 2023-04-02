<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Plan;
use App\Models\PlanExpense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        if (request()->ajax()) {
            $allData = Order::with(['user', 'plan'])->orderBy('orders.id', 'DESC');
            if(isset($request->status)){
                if($request->status==0){
                    $allData = $allData->where('is_paid', false);
                }
            }
            return DataTables::of($allData)
                ->addIndexColumn()
                ->addColumn('user_name', function ($data) {
                    return $data->user->name ?? '';
                })
                ->addColumn('plan_name', function ($data) {
                    return $data->plan->name ?? '';
                })
                ->addColumn('added_date', function ($data) {
                    return dateTimeFormat($data->created_at);
                })
                ->addColumn('payment_status','
                    @if ($is_paid)
                        <a href="{{ route(\'plan.expense\', $id) }}"
                            class="status-expenses">Expenses</a>
                    @else
                    <a href="{{ route(\'plan.expense\', $id) }}"
                            class="status-panding">Pending</a>
                    @endif')
                ->rawColumns(['payment_status','added_date'])
                ->toJson();
        }


        return view('order.index', compact('request'));
    }

    function pending()
    {
        $sales = Order::where('is_paid', false)->latest()->paginate(10);
        return view('order.index', compact('sales'));
    }

    function approved($id)
    {
        $order = Order::where('id', $id)->first();
        $user = Auth::user();
        $plan = Plan::where('id', $order->plan_id)->first();
        $order->is_paid = true;
        //get old expnase
        $oldexpense = PlanExpense::where('id', $user->plan_expense_id)->first();

        if ($oldexpense != null) {
            //eassign the plan expense
            $expense = new PlanExpense();
            $expense->user_id = $user->id;
            $expense->order_id = $order->id;
            $expense->plan_id = $plan->id;
            $expense->word_count = $plan->word_count;
            $expense->call_api_count = $plan->call_api_count + ($oldexpense->call_api_count - $oldexpense->current_api_count);
            $expense->documet_count = $plan->documet_count + ($oldexpense->documet_count - $oldexpense->current_documet_count);
            $expense->image_count = $plan->image_count + ($oldexpense->image_count - $oldexpense->current_image_count);
            $expense->activated_at = Carbon::now();
            $expense->expire_at =  Carbon::now()->addDay(30);
            $expense->save();
        } else {
            //eassign the plan expense
            $expense = new PlanExpense();
            $expense->user_id = $user->id;
            $expense->order_id = $order->id;
            $expense->plan_id = $plan->id;
            $expense->word_count = $plan->word_count;
            $expense->call_api_count = $plan->call_api_count;
            $expense->documet_count = $plan->documet_count;
            $expense->image_count = $plan->image_count;
            $expense->activated_at = Carbon::now();
            $expense->expire_at =  Carbon::now()->addDay(30);
            $expense->save();
        }
        // return $expense;
        $user->plan_expense_id = $expense->id;
        $user->save();

        $order->save();

        toast('This Order is approved', 'success');
        return redirect()->route('plan.expense', $order->id);
    }

    // User Transaction History
    public function userTransactions(){
        $user = Auth::user();
        $allData = Order::with(['user', 'plan'])->where('user_id',$user->id)->orderBy('orders.id', 'DESC')->paginate(12);
        return view('userArea.purchase.transactions',compact('allData'));
    }
    public function userTransactionDetails($orderId){
        $order = Order::where(['id'=> $orderId,'user_id'=>Auth::user()->id])->firstOrFail();
        $plan = Plan::where('id', $order->plan_id)->first();
        $expense = PlanExpense::where('order_id', $order->id)->first();
        return view('userArea.purchase.transactionDetails', compact('plan', 'expense', 'order'));
    }
}

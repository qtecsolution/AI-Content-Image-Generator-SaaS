<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\Plan;
use App\Models\PlanExpense;
use App\Models\User;
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


        return view('admin.order.index', compact('request'));
    }

    function pending()
    {
        $sales = Order::where('is_paid', false)->latest()->paginate(10);
        return view('admin.order.index', compact('sales'));
    }

    function approved($id)
    {
        $order = Order::where('id', $id)->first();
        $user = User::where('id',$order->user_id)->first();
        $plan = Plan::where('id', $order->plan_id)->first();
        $order->is_paid = true;
        //get old expnase
        $oldexpense = PlanExpense::where('id', $user->plan_expense_id)
             ->where('activated_at', '<=', now())
             ->where(function ($query) {
                 $query->whereNull('expire_at')
                     ->orWhere('expire_at', '>', now());
             })->where('user_id', $user->id)->first();
         //remaining days
         $activeDate = Carbon::parse($oldexpense->activated_at);
         $expireDate = Carbon::parse($oldexpense->expire_at);
         $remainingDays = $activeDate->diffInDays($expireDate);
        $totalDays = $order->type == 2? 365: 30;
        $months = $order->type == 2? 12: 1;
        if ($oldexpense != null) {
            $totalDays += $remainingDays; // Add previous remaining days
            //eassign the plan expense
            $expense = new PlanExpense();
            $expense->user_id = $user->id;
            $expense->order_id = $order->id;
            $expense->plan_id = $plan->id;
            $expense->word_count = ($plan->word_count*$months) + ($oldexpense->word_count - $oldexpense->current_word_count);
            $expense->image_count = ($plan->image_count*$months) + ($oldexpense->image_count - $oldexpense->current_image_count);
            $expense->type = $order->type;
            $expense->activated_at = Carbon::now();
            $expense->expire_at =  Carbon::now()->addDay($totalDays);
            $expense->save();
        } else {
            //eassign the plan expense
            $expense = new PlanExpense();
            $expense->user_id = $user->id;
            $expense->order_id = $order->id;
            $expense->plan_id = $plan->id;
            $expense->word_count = $plan->word_count*$months;
            $expense->image_count = $plan->image_count*$months;
            $expense->type = $order->type;
            $expense->activated_at = Carbon::now();
            $expense->expire_at =  Carbon::now()->addDay($totalDays);
            $expense->save();
        }
        // return $expense;
        $user->plan_expense_id = $expense->id;
        $user->save();

        $order->save();

        toast('This Order is approved', 'success');
        return redirect()->route('plan.expense', $order->id);
    }

}

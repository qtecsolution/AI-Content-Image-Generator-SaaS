<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalUser = User::where('type', 'user')->count();
        $recentUsers = User::where('type', 'user')->limit(10)->latest()->get();
        $orders = Order::limit(10)->latest()->get();

        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();

        $salesData = Order::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd]);

        return view('admin.dashboard.index', compact('totalUser', 'orders', 'recentUsers','salesData'));
    }
}

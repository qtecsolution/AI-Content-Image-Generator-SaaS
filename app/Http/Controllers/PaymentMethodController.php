<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    //
    public function index()
    {
        return view('method.index');
    }
}

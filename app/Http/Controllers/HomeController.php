<?php

namespace App\Http\Controllers;

use App\Models\UseCase;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cases = UseCase::where('is_published',1)->get();
        return view('index',compact('cases'));
    }


    public static function readConfig($key)
    {
        return config('system.'.$key);
    }

    public static function writeConfig($key,$value)
    {
        return config(['system.'.$key => $value]);
    }
}

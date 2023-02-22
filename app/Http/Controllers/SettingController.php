<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    //

    public function seoSetup()
    {
        return view('setting.seo');
    }

    public function setting()
    {
        return view('setting.setting');
    }
}

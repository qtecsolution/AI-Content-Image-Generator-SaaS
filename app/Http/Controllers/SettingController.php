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


    public function seoStore(Request $request)
    {
        if ($request->has('meta_key')) {
            HomeController::writeConfig('meta_key', $request->meta_key);
        }

        if ($request->has('meta_title')) {
            HomeController::writeConfig('meta_title', $request->meta_title);
        }

        if ($request->has('meta_desc')) {
            HomeController::writeConfig('meta_desc', $request->meta_desc);
        }

        if ($request->hasFile('meta_image')) {
            $imag = HomeController::fileUpload($request->meta_image,'','');
            HomeController::writeConfig('meta_image', $request->meta_image);
        }

        alert('Seo', 'Seo Setup Succssfully', 'success');
        return back();
    }
}

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
            $imag = HomeController::fileUpload($request->meta_image, '', '');
            HomeController::writeConfig('meta_image', $request->meta_image);
        }

        alert('Seo', 'Seo Setup Succssfully', 'success');
        return back();
    }

    public function smtpStore(Request $request)
    {
        foreach ($request->types as $key => $type) {
            HomeController::overWriteEnvFile($type, $request[$type]);
        }
        alert('SMTP', 'Mail setup  successfully', 'success');
        return back();
    }

    public  function siteSettingUpdate(Request $request)
    {

        // return $request;
        if ($request->hasFile('logo')) {
            $logo = HomeController::fileUpload($request->logo, 'site', 'own_site');
            HomeController::writeConfig('type_logo', $logo);
        }
        if ($request->hasFile('f_icon')) {
            $f_icon = HomeController::fileUpload($request->f_icon, 'site', 'f_icon');
            HomeController::writeConfig('favicon_icon', $f_icon);
        }

        if ($request->hasFile('f_logo')) {
            $f_logo = HomeController::fileUpload($request->f_logo, 'site', 'footer_logo');
            HomeController::writeConfig('footer_logo', $f_logo);
        }

        if ($request->has('name')) {
            HomeController::writeConfig($request->type_name, $request->name);
        }

        if ($request->has('footer')) {
            HomeController::writeConfig($request->type_footer, $request->footer);
        }

        if ($request->has('fb')) {
            HomeController::writeConfig($request->type_fb, $request->fb);
        }

        if ($request->has('tw')) {
            HomeController::writeConfig($request->type_tw, $request->tw);
        }

        if ($request->has('google')) {
            HomeController::writeConfig($request->type_google, $request->google);
        }

        if ($request->has('address')) {
            HomeController::writeConfig($request->type_address, $request->address);
        }

        if ($request->has('number')) {
            HomeController::writeConfig($request->type_number, $request->number);
        }

        if ($request->has('mail')) {
            HomeController::writeConfig($request->type_mail, $request->mail);
        }
        
        alert('CMS', 'Site Setting Is  Setup  Successfully', 'success');
        return back();
    }
}

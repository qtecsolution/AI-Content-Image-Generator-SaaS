<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{

    public function setting(Request $request)
    {
        if ($request->has('tab')) {
            $tab = $request->tab;
        } else {
            $tab = 'openai';
        }
        return view('setting.setting', compact('tab'));
    }

    public function openAiStore(Request $request)
    {
        overWriteEnvFile('OPENAI_API_KEY', $request->OPENAI_API_KEY);
        toast('Open Ai API key is saved', 'success');
        return redirect()->route('setting', ['tab' => "openai"]);
    }

    public function tawkToStore(Request $request)
    {

        writeConfig('tawk_to', $request->tawk_to);

        $fileName = 'tawk_to.blade.php';
        $fileContents = $request->code;
        File::put($fileName, $fileContents);
        copy(asset('tawk_to.blade.php'), base_path('resources/views/layouts/tawk_to.blade.php'));
        toast('Tawk to is setup', 'success');
        return redirect()->route('setting', ['tab' => "tawkto"]);
    }

    public function socialStore(Request $request)
    {
        overWriteEnvFile('GOOGLE_CLIENT_ID', $request->GOOGLE_CLIENT_ID);
        overWriteEnvFile('GOOGLE_CLIENT_SECRET', $request->GOOGLE_CLIENT_SECRET);
        overWriteEnvFile('GOOGLE_REDIRECT_URL', $request->GOOGLE_REDIRECT_URL);

        toast('Google Login Credential is setup', 'success');
        return redirect()->route('setting', ['tab' => "login"]);
    }


    public function seoStore(Request $request)
    {
        if ($request->has('meta_key')) {
            writeConfig('meta_key', $request->meta_key);
        }

        if ($request->has('meta_title')) {
            writeConfig('meta_title', $request->meta_title);
        }

        if ($request->has('meta_desc')) {
            writeConfig('meta_desc', $request->meta_desc);
        }

        if ($request->hasFile('meta_image')) {
            $imag = fileUpload($request->file('meta_image'), 'seo', '');
            writeConfig('meta_image', $imag);
        }

        toast('Seo Setup Succssfully', 'success');
        return redirect()->route('setting', ['tab' => "seo"]);
    }

    public function smtpStore(Request $request)
    {

        foreach ($request->types as $key => $type) {
            overWriteEnvFile($type, $request[$type]);
        }

        toast('Mail setup  successfully', 'success');
        return redirect()->route('setting', ['tab' => "smtp"]);
    }

    public  function siteSettingUpdate(Request $request)
    {

        // return $request;
        if ($request->hasFile('logo')) {
            $oldFile = readConfig('type_logo');
            fileDelete($oldFile);
            $logo = fileUpload($request->file('logo'), 'site', 'logo');
            iconGenerate($logo);
            writeConfig('type_logo', $logo);
        }
        if ($request->hasFile('f_icon')) {
            $oldFile = readConfig('favicon_icon');
            fileDelete($oldFile);
            $f_icon = fileUpload($request->f_icon, 'site', 'f_icon');
            writeConfig('favicon_icon', $f_icon);
        }

        if ($request->hasFile('f_logo')) {
            $oldFile = readConfig('footer_logo');
            fileDelete($oldFile);
            $f_logo = fileUpload($request->f_logo, 'site', 'footer_logo');
            writeConfig('footer_logo', $f_logo);
        }

        if ($request->has('name')) {
            writeConfig($request->type_name, $request->name);
            writeConfig('name', $request->name);
        }

        if ($request->has('footer')) {
            writeConfig($request->type_footer, $request->footer);
        }

        if ($request->has('fb')) {
            writeConfig($request->type_fb, $request->fb);
        }

        if ($request->has('tw')) {
            writeConfig($request->type_tw, $request->tw);
        }

        if ($request->has('google')) {
            writeConfig($request->type_google, $request->google);
        }

        if ($request->has('address')) {
            writeConfig($request->type_address, $request->address);
        }

        if ($request->has('number')) {
            writeConfig($request->type_number, $request->number);
        }

        if ($request->has('mail')) {
            writeConfig($request->type_mail, $request->mail);
        }
        toast('Site Setting Is  Setup  Successfully', 'success');
        return redirect()->route('setting', ['tab' => "cms"]);
    }





    public function pwaSetupStore(Request $request)
    {



        if ($request->has('pwa_active')) {
            writeConfig('pwa_active', $request->pwa_active);
        }

        if ($request->has('pwa_name')) {
            // setSystemSetting('pwa_name', $request->pwa_name);
            writePwaConfig('name', $request->pwa_name);
        }

        if ($request->has('short_name')) {
            // setSystemSetting('short_name', $request->short_name);
            writePwaConfig('manifest.short_name', $request->short_name);
        }

        if ($request->has('background_color')) {
            // setSystemSetting('background_color', $request->background_color);
            writePwaConfig('manifest.background_color', $request->background_color);
        }

        if ($request->has('theme_color')) {
            // setSystemSetting('theme_color', $request->theme_color);
            writePwaConfig('manifest.theme_color', $request->theme_color);
        }

        if ($request->has('x72x72_icon')) {
            $path = 'public/' . fileUpload($request->x72x72_icon, 'site', 'pwx');
            writePwaConfig('manifest.icons.72x72.path', $path);
            // setSystemSetting('x72x72_icon', $path);
        }

        if ($request->has('x96x96_icon')) {
            $path = 'public/' . fileUpload($request->x96x96_icon, 'site', 'pwx');
            writePwaConfig('manifest.icons.96x96.path', $path);
            // setSystemSetting('x96x96_icon', $path);
        }
        if ($request->has('x128x128_icon')) {
            $path = 'public/' . fileUpload($request->x128x128_icon, 'site', 'pwx');
            writePwaConfig('manifest.icons.128x128.path', $path);
            // setSystemSetting('x128x128_icon', $path);
        }
        if ($request->has('x144x144_icon')) {
            $path = 'public/' . fileUpload($request->x144x144_icon, 'site', 'pwx');
            writePwaConfig('manifest.icons.144x144.path', $path);
            // setSystemSetting('x144x144_icon', $path);
        }
        if ($request->has('x152x152_icon')) {
            $path = 'public/' . fileUpload($request->x152x152_icon, 'site', 'pwx');
            writePwaConfig('manifest.icons.152x152.path', $path);
            // setSystemSetting('x152x152_icon', $path);
        }
        if ($request->has('x192x192_icon')) {
            $path = 'public/' . fileUpload($request->x192x192_icon, 'site', 'pwx');
            writePwaConfig('manifest.icons.192x192.path', $path);
            // setSystemSetting('x192x192_icon', $path);
        }
        if ($request->has('x384x384_icon')) {
            $path = 'public/' . fileUpload($request->x384x384_icon, 'site', 'pwx');
            writePwaConfig('manifest.icons.384x384.path', $path);
            // setSystemSetting('x384x384_icon', $path);
        }
        if ($request->has('x512x512_icon')) {
            $path = fileUpload($request->x512x512_icon, 'site', 'pwx');
            writePwaConfig('manifest.icons.512x512.path', $path);
            // setSystemSetting('x512x512_icon', $path);
        }
        if ($request->has('x640x1136_splash')) {
            $path = 'public/' . fileUpload($request->x640x1136_splash, 'site', 'pwx');
            writePwaConfig('manifest.splash.640x1136', $path);
            // setSystemSetting('x640x1136_splash', $path);
        }
        if ($request->has('x750x1334_splash')) {
            $path = 'public/' . fileUpload($request->x750x1334_splash, 'site', 'pwx');
            writePwaConfig('manifest.splash.750x1334', $path);
            // setSystemSetting('x750x1334_splash', $path);
        }
        if ($request->has('x828x1792_splash')) {
            $path = 'public/' . fileUpload($request->x828x1792_splash, 'site', 'pwx');
            writePwaConfig('manifest.splash.828x1792', $path);
            // setSystemSetting('x828x1792_splash', $path);
        }
        if ($request->has('x1536x2048_splash')) {
            $path = 'public/' . fileUpload($request->x1536x2048_splash, 'site', 'pwx');
            writePwaConfig('manifest.splash.1536x2048', $path);
            // setSystemSetting('x1536x2048_splash', $path);
        }
        if ($request->has('x1125x2436_splash')) {
            $path = 'public/' . fileUpload($request->x1125x2436_splash, 'site', 'pwx');
            writePwaConfig('manifest.splash.1125x2436', $path);
            // setSystemSetting('x1125x2436_splash', $path);
        }
        if ($request->has('x1242x2208_splash')) {
            $path = 'public/' . fileUpload($request->x1242x2208_splash, 'site', 'pwx');
            writePwaConfig('manifest.splash.1242x2208', $path);
            // setSystemSetting('x1242x2208_splash', $path);
        }
        if ($request->has('x1242x2688_splash')) {
            $path = 'public/' . fileUpload($request->x1242x2688_splash, 'site', 'pwx');
            writePwaConfig('manifest.splash.1242x2688', $path);
            // setSystemSetting('x1242x2688_splash', $path);
        }
        if ($request->has('x1668x2224_splash')) {
            $path = 'public/' . fileUpload($request->x1668x2224_splash, 'site', 'pwx');
            writePwaConfig('manifest.splash.1668x2224', $path);
            // setSystemSetting('x1668x2224_splash', $path);
        }
        if ($request->has('x1668x2388_splash')) {
            $path = 'public/' . fileUpload($request->x1668x2388_splash, 'site', 'pwx');
            writePwaConfig('manifest.splash.1668x2388', $path);
            // setSystemSetting('x1668x2388_splash', $path);
        }
        if ($request->has('x2048x2732_splash')) {
            $path = 'public/' . fileUpload($request->x2048x2732_splash, 'site', 'pwx');
            writePwaConfig('manifest.splash.2048x2732', $path);
            // setSystemSetting('x2048x2732_splash', $path);
        }
        Artisan::call('optimize:clear');

        toast('Pwa Is  Setup  Successfully', 'success');
        return redirect()->route('setting', ['tab' => "pwa"]);
    }
}

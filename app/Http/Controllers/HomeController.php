<?php

namespace App\Http\Controllers;

use App\Models\UseCase;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $cases = UseCase::where('is_published', 1)->get();
        return view('index', compact('cases'));
    }



    public static function overWriteEnvFile($type, $val)
    {
        $path = base_path('.env'); // get file ENV path
        if (file_exists($path)) {
            $val = '"' . trim($val) . '"';
            if (is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0) {
                file_put_contents($path, str_replace($type . '="' . env($type) . '"', $type . '=' . $val, file_get_contents($path)));
            } else {
                file_put_contents($path, file_get_contents($path) . "\r\n" . $type . '=' . $val);
            }
        }
    }


    public static function readConfig($key)
    {
        return config('system.' . $key);
    }

    public static function writeConfig($key, $value)
    {
        return config(['system.' . $key => $value]);
    }


    public static  function fileDelete($file)
    {
        if ($file != null) {
            if (file_exists(public_path($file))) {
                unlink(public_path($file));
            }
        }
    }


    //uploads file
    // uploads/folder
    public static function fileUpload($file, $folder, $name)
    {
        $imageName = Str::slug($name) . rand(0, 9999) . '.' . $file->extension();
        $file->move(public_path('uploads/' . $folder), $imageName);
        $path = 'uploads/' . $folder . '/' . $imageName;
        return $path;
    }

    public static function filePath($file)
    {

        if ($file == null) {
            return asset('placeholder.png');
        }
        /*check here file is exxist*/
        $path = public_path() . '/' . $file;
        if (file_exists($path)) {
            return asset($file);
        } else {
            return asset('placeholder.png');
        }
    }
}

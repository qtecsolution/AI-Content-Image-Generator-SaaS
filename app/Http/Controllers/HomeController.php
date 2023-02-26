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

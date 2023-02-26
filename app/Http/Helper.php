<?php

use Illuminate\Support\Str;
use Winter\LaravelConfigWriter\ArrayFile;

function fileUpload($file, $folder, $name = '')
{
    if ($name == '') {
        $name = date('Ymd');
    }
    $imageName = Str::slug($name) . rand(0, 9999) . '.' . $file->extension();
    $file->move(public_path('uploads/' . $folder), $imageName);
    $path = 'uploads/' . $folder . '/' . $imageName;
    return $path;
}
function fileDelete($file)
{
    if ($file != null) {
        if (file_exists(public_path($file))) {
            unlink(public_path($file));
        }
    }
}

function filePath($file)
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

function readConfig($key)
{
    return config('system.' . $key);
}

function writeConfig($key, $value)
{
    $config = ArrayFile::open(base_path('config/system.php'));
    $config->set($key, $value);
    $config->write();
    return $value;
}

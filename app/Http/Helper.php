<?php

use Illuminate\Support\Str;
use Winter\LaravelConfigWriter\ArrayFile;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;

function fileUpload($file, $folder, $name = null)
{
    if ($name == null) {
        $name = date('Ymd');
    }
    $imageName = Str::slug($name) . rand(0, 9999) . '.' . $file->extension();
    $file->move(public_path('uploads/' . $folder), $imageName);
    $path = 'uploads/' . $folder . '/' . $imageName;
    return $path;
}

function fileUploadFromUrl($url, $folder, $name = null)
{
    $extension = getExtensionFromUrl($url);
    $client = new Client();
    $response = $client->get($url);
    $imageData = $response->getBody()->getContents();
    if ($name == null) {
        $name = date('Ymd');
    }
    $imageName = Str::slug($name) . rand(0, 9999) . '.' . $extension;
    $path = 'uploads/' . $folder.date('Y/m/d');
    if (!File::exists($path)) {
        File::makeDirectory($path, 0755, true);
    }
    file_put_contents($path.'/'.$imageName, $imageData);
    $imagePath = $path. '/' . $imageName;
    return $imagePath;
}

function getExtensionFromUrl($url){
    $url_parts = parse_url($url);
    if(isset($url_parts['path'])){
       $extension = explode('.',$url_parts['path']);
       return end($extension);
    }
    return '';
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

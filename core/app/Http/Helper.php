<?php

use App\Models\UseCase;
use Illuminate\Support\Str;
use Winter\LaravelConfigWriter\ArrayFile;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;


function strUpperCase($data)
{
    return $data;
}

function invoiceGenerator()
{
    return $invoiceNumber = time() . '-' . rand(10000, 99999);
}

function overWriteEnvFile($type, $val)
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

function fileUpload($file, $folder, $name = null)
{
    if ($name == null) {
        $name = date('Ymd');
    }
    $imageName = Str::slug($name) . rand(0, 9999) . '.' . $file->extension();
    $path = 'assets/uploads/' . $folder.date('/Y/m/d');
    if (!File::exists($path)) {
        File::makeDirectory($path, 0755, true);
    }
    $file->move($path, $imageName);
    return $path. '/' . $imageName;
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
    $path = 'assets/uploads/' . $folder.date('/Y/m/d');
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
        if (file_exists($file)) {
            unlink($file);
        }
    }
}

function filePath($file)
{
    if ($file != null && file_exists($file)) {
        return asset($file);
    } else {
        return asset('assets/images/placeholder.png');
    }
}


function filePathRoot($file)
{

    return asset(str_replace("public/", "", $file));
}


function readConfig($key)
{
    return config('system.' . $key);
}

function dateTimeFormat($data)
{
    return $data;
}

function writeConfig($key, $value)
{
    $config = ArrayFile::open(base_path('config/system.php'));
    $config->set($key, $value);
    $config->write();
    return $value;
}


function writePwaConfig($key, $value)
{
    $config = ArrayFile::open(base_path('config/laravelpwa.php'));
    $config->set($key, $value);
    $config->write();
    return $value;
}
function myAlert($status,$message){
    if($status=='success'){
        toast($message,'success');
    }else{
        toast($message,'warning');
    }

}

function totalUseCase()
{
    return UseCase::where('is_published',1)->count();
}

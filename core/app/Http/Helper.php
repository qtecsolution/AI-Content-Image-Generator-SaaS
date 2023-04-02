<?php

use App\Models\Plan;
use App\Models\PlanExpense;
use App\Models\UseCase;
use Illuminate\Support\Str;
use Winter\LaravelConfigWriter\ArrayFile;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
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
    $path = 'assets/uploads/' . $folder . date('/Y/m/d');
    if (!File::exists($path)) {
        File::makeDirectory($path, 0755, true);
    }
    $file->move($path, $imageName);
    return $path . '/' . $imageName;
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
    $path = 'assets/uploads/' . $folder . date('/Y/m/d');
    if (!File::exists($path)) {
        File::makeDirectory($path, 0755, true);
    }
    file_put_contents($path . '/' . $imageName, $imageData);
    $imagePath = $path . '/' . $imageName;
    return $imagePath;
}
function getExtensionFromUrl($url)
{
    $url_parts = parse_url($url);
    if (isset($url_parts['path'])) {
        $extension = explode('.', $url_parts['path']);
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


function showBalance()
{
    $user = Auth::user();
    if(isset($user->plan_expense_id)){
        $expense = PlanExpense::where('id', $user->plan_expense_id)
             ->where('activated_at', '<=', now())
             ->where(function ($query) {
                 $query->whereNull('expire_at')
                     ->orWhere('expire_at', '>', now());
             })->where('user_id', $user->id)->first();
        if($expense !== ''){
            $restApiCall = $expense->call_api_count - $expense->current_api_count;
            $restImage = $expense->image_count - $expense->current_image_count;
            $restDoc = $expense->documet_count - $expense->current_documet_count;
            return (object) [
                'api_call'=> $restApiCall,
                'image'=> $restImage,
                'document'=> $restDoc,
                'word'=> $expense->word_count,
            ];
        }else{
            return "";
        }
    }else{
        return "";
    }
}

function balanceDeduction($type, $n=1)
{
    // call_api,document,image
    $status = false;
    $user = Auth::user();
    $planExpenses = PlanExpense::where('id', $user->plan_expense_id)
        ->where('activated_at', '<=', now())
        ->where(function ($query) {
            $query->whereNull('expire_at')
                ->orWhere('expire_at', '>', now());
        })
        ->where('user_id', $user->id)->first();
    if ($planExpenses == null) {
        return false;
    } else {
        switch ($type) {
            case 'call_api':
                if ($planExpenses->call_api_count > $planExpenses->current_api_count) {
                    $planExpenses->current_api_count++;
                    $planExpenses->save();
                    $status =  true;
                } else {
                    $status = false;
                }
                break;

            case 'document':
                if ($planExpenses->documet_count > $planExpenses->current_documet_count) {
                    $planExpenses->current_documet_count++;
                    $planExpenses->save();
                    $status =  true;
                } else {
                    $status = false;
                }
                break;
            case 'document-delete':
                if ($$planExpenses->current_documet_count>0) {
                    $planExpenses->current_documet_count--;
                    $planExpenses->save();
                    $status =  true;
                } else {
                    $status = false;
                }
                break;

            case 'image':
                if ($planExpenses->image_count > $planExpenses->current_image_count) {
                    $planExpenses->current_image_count += $n;
                    $planExpenses->save();
                    $status =  true;
                } else {
                    $status = false;
                }
                break;

            default:
                $status = false;
                break;
        }
        return $status;
    }
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
function myAlert($status, $message)
{
    if ($status == 'success') {
        toast($message, 'success');
    } else {
        toast($message, 'warning');
    }
}

function totalUseCase()
{
    return UseCase::where('is_published', 1)->count();
}


function translate($data)
{
    return $data;
}
function menuActive($data)
{
    if(!is_array($data)){
        $data = explode(', ', $data);
    }
    foreach($data as $value){
        if(request()->routeIs($value)){
            return true;
        }
    }
    return false;
}
function freePlan(){
   return Plan::where('price','<=', 0)->first();
}
function demoPlan(){
    if(readConfig('demo')){
        return (object) [
            'api_call'=> 10,
            'image'=> 5,
            'document'=> 5,
            'word'=> 500,
        ];
    }else{
        return "";
    }
}
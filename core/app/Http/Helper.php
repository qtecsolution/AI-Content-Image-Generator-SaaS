<?php

use App\Models\Blog;
use App\Models\Page;
use App\Models\Plan;
use App\Models\PlanExpense;
use App\Models\UseCase;
use Illuminate\Support\Str;
use Winter\LaravelConfigWriter\ArrayFile;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

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
        File::makeDirectory($path, 0777, true,true);
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
function favicon($file)
{
    if ($file != null && file_exists($file)) {
        return asset($file);
    } else {
        return asset('assets/images/favicon.ico');
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
        if($expense != ''){
            $restImage = $expense->image_count - $expense->current_image_count;
            $restWord = $expense->word_count - $expense->current_word_count;
            //remaining days
            $today = Carbon::parse(date("Y-m-d"));
            $expireDate = Carbon::parse($expense->expire_at);
            $remainingDays = $expireDate->diffInDays($today);
            // templates type
            $templates = explode(',',$expense->plan->templates);
            return (object) [
                'image'=> $restImage,
                'max_words'=> $expense->plan->max_words,
                'word_count'=> $restWord,
                'remaining_days'=>$remainingDays,
                'templates' =>  $templates,
                'code_generate_enabled'=>$expense->plan->code_generate_enabled,
                'chat_enabled'=>$expense->plan->chat_enabled,
                'support_enabled'=>$expense->plan->support_enabled,
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
            case 'word':
                if ($planExpenses->word_count > $planExpenses->current_word_count) {
                    $planExpenses->current_word_count += $n;
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
            'max_words'=> 200,
            'image'=> 5,
            'word_count'=> 500,
        ];
    }else{
        return "";
    }
}
function iconGenerate($photo){
    $path = 'assets/uploads/pwaIcons';
    if (!File::exists($path)) {
        File::makeDirectory($path, 0755, true, true);
    }

    $img= Image::make($photo);
    $img->resize(512,512);
    $img->save($path.'/icon-512x512.png');
    $img->resize(384,384);
    $img->save($path.'/icon-384x384.png');
    $img->resize(192,192);
    $img->save($path.'/icon-192x192.png');
    $img->resize(152,152);
    $img->save($path.'/icon-152x152.png');
    $img->resize(144,144);
    $img->save($path.'/icon-144x144.png');
    $img->resize(128,128);
    $img->save($path.'/icon-128x128.png');
    $img->resize(96,96);
    $img->save($path.'/icon-96x96.png');
    $img->resize(72,72);
    $img->save($path.'/icon-72x72.png');

    $white = 'assets/images/default/white.png';
    $splash = Image::make($white);
    $splash->insert($photo, 'center');
    $splash->resize(2048,2732);
    $splash->save($path."/splash-2048x2732.png");
    $splash->resize(1668,2388);
    $splash->save($path."/splash-1668x2388.png");
    $splash->resize(1668,2224);
    $splash->save($path."/splash-1668x2224.png");
    $splash->resize(1668,2224);
    $splash->save($path."/splash-1668x2224.png");
    $splash->resize(1536,2048);
    $splash->save($path."/splash-1536x2048.png");
    $splash->resize(1242,2688);
    $splash->save($path."/splash-1242x2688.png");
    $splash->resize(1242,2208);
    $splash->save($path."/splash-1242x2208.png");
    $splash->resize(1125,2436);
    $splash->save($path."/splash-1125x2436.png");
    $splash->resize(828,1792);
    $splash->save($path."/splash-828x1792.png");
    $splash->resize(750,1334);
    $splash->save($path."/splash-750x1334.png");
    $splash->resize(640,1136);
    $splash->save($path."/splash-640x1136.png");
    return "Yes";
}
function footerBlog()
{
    $blogs = Blog::where('is_published',true)->take(3)->get();
    return $blogs;
}


function pages()
{
    return Page::where('active',true)->get();
}

function footerUseCase()
{
    return UseCase::where('is_published',1)->limit(3)->get();
}

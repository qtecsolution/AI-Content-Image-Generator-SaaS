<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PlanController;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

// Route::get()
Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback')->name('auth.google.callback');
});


Route::group(['middleware' => ['auth']], function() {
    Route::get('/','HomeController@index')->name('home');
    Route::get('/content-create','OpenAiController@content')->name('content.create');
    Route::post('/content-generate','OpenAiController@contentGenerate')->name('content.generate');
    Route::get('/image-create','OpenAiController@image')->name('image.create');
    Route::get('/image-all','OpenAiController@allImages')->name('image.all');
    Route::post('/image-generate','OpenAiController@imageGenrate')->name('image.generate');
    Route::get('/default','OpenAiController@default');
    Route::resource('/contents','UserDocumentController');
    Route::delete('/contents-multiple-delete','UserDocumentController@multipleDelete')->name('contents-multiple-delete');
    Route::resource('/use-case','UseCaseController');

    Route::resource('/user','UserController');
    // Route::get('/plan/index','PlanController@index')->name('plan.index');
    // Route::get('/plan/create','PlanController@create')->name('plan.create');
    // Route::post('/plan/store','PlanController@store')->name('plan.store');
    Route::resource('plan','PlanController');
    Route::get('/plan/status/{id}/{status}','PlanController@status')->name('plan.status');
    Route::get('/plan/user/index','PlanController@userIndex')->name('plan.userIndex');
    Route::get('/plan/purchase/{id}','PlanController@purchase')->name('plan.purchase');
    Route::get('/plan/expanse/{id}','PlanController@expanse')->name('plan.expanse');

    Route::post('/plan/purchase','PlanController@purchaseDone')->name('plan.purchase.store');
    Route::get('/payment/method','PaymentMethodController@index')->name('payment.method');
    Route::post('payment/paypal/store', 'PaymentMethodController@paypalSettingStore')->name('payment.paypal.store');
    Route::post('payment/stripe/store', 'PaymentMethodController@stripeSettingStore')->name('payment.stripe.store');
    Route::post('payment/rezor/store', 'PaymentMethodController@rezorSettingStore')->name('payment.rezor.store');
    Route::post('payment/mollie/store', 'PaymentMethodController@mollieSettingStore')->name('payment.mollie.store');
    Route::get('/seo/setup','SettingController@seoSetup')->name('seo.setup');
    Route::post('/seo/store','SettingController@seoStore')->name('seo.store');
    Route::get('/setting/setup','SettingController@setting')->name('setting');   
    Route::post('/setting/setup/update','SettingController@siteSettingUpdate')->name('site.update');   
    Route::post('/setting/smtp/update','SettingController@smtpStore')->name('smtp.store');   
   
});

Route::get('payment/success',function(Request $request){
    return $request;
})->name('order.success');
Route::get('handle',[PlanController::class,'handleWebhookNotification'])->name('webhooks.mollie');

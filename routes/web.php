<?php

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


Route::group(['middleware' => ['auth']], function() {
    Route::get('/','HomeController@index')->name('home');
    Route::get('/posts/create','PostController@create')->name('posts.create');
    Route::post('/posts','PostController@store')->name('posts.store');
    Route::post('/content-openai','PostController@openAi')->name('content.openai');
    Route::get('/image-openai','PostController@imageGenrate')->name('image.openai');
    Route::get('/default','PostController@default');

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

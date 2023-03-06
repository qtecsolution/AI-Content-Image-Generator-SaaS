<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PageController;
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
// Frontend Route
Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'FrontendController@index')->name('/');
    Route::get('/blogs', 'FrontendController@blogs')->name('blogs.index');
    Route::get('/blogs/{slug}', 'FrontendController@blogDetails')->name('blogs.show');
});
Auth::routes();

//  Backend Route
Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback')->name('auth.google.callback');
});

// User Route
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::post('/profile', 'HomeController@profileUpdate')->name('profile.update');

    Route::get('/profile/password', 'HomeController@password')->name('profile.password');
    Route::post('/profile/password', 'HomeController@updatePassword')->name('profile.password.update');

    Route::get('/content-create', 'OpenAiController@content')->name('content.create');
    Route::post('/content-generate', 'OpenAiController@contentGenerate')->name('content.generate');

    Route::get('/image-create','OpenAiController@image')->name('image.create');
    Route::post('/image-generate','OpenAiController@imageGenerate')->name('image.generate');
    Route::get('/image-regenerate/{id}','OpenAiController@imageReGenerate')->name('image.regenerate');
    Route::get('/use-case-input-fields', 'UseCaseController@getInputFields')->name('use-case.input-fields');

    Route::get('/image-variation','OpenAiController@imageVariation')->name('image.variation');
    Route::post('/image-variation','OpenAiController@imageGenerateVariation')->name('image.generate.variation');

    Route::get('/image-all','OpenAiController@allImages')->name('image.all');
    Route::delete('/image-delete/{id}','OpenAiController@imageDelete')->name('image.destroy');

    Route::get('/content-history', 'ContentHistoryController@index')->name('content-history.index');
    Route::get('/content-history/all', 'ContentHistoryController@viewAll')->name('content-history.all');
    Route::get('/content-history/{id}', 'ContentHistoryController@show')->name('content-history.show');
    Route::delete('/content-history/{id}', 'ContentHistoryController@destroy')->name('content-history.destroy');
    Route::delete('/content-history-multiple-delete', 'ContentHistoryController@multipleDelete')->name('content-history.multiple-delete');

    Route::resource('contents', 'UserDocumentController');
    Route::delete('/contents-multiple-delete', 'UserDocumentController@multipleDelete')->name('contents-multiple-delete');
    Route::get('stripe-pay-load/{id}', 'PurchaseController@stripeLoad')->name('plan.stripe.load');
    Route::get('razor-pay-load/{id}', 'PurchaseController@razorPayLoad')->name('plan.razorpay.load');
    Route::get('paypal-pay-load', 'PurchaseController@paypalPayLoad')->name('checkout.paypal');
    Route::get('bank-pay-load', 'PurchaseController@bankPayLoad')->name('checkout.bank');
    Route::get('paypal/pay/success/{id}', 'PurchaseController@paySuccess')->name('paypal.pay.success');
    Route::get('paypal/pay/cancle/{id}', 'PurchaseController@payCancle')->name('paypal.pay.error');
    Route::get('/plan/user/index', 'PlanController@userIndex')->name('plan.userIndex');
    Route::get('/plan/purchase/{id}', 'PurchaseController@purchase')->name('plan.purchase');
    Route::get('/plan/expanse/{id}', 'PurchaseController@expanse')->name('plan.expanse');
    Route::get('/plan/expanse/base/{id}', 'PurchaseController@expanseBasePlan')->name('plan.expanse.2');

    Route::post('/plan/purchase', 'PurchaseController@purchaseDone')->name('plan.purchase.store');
});
// Admin Route
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::resource('/use-case', 'UseCaseController');
    Route::resource('/manage-faq', 'FaqController');
    Route::resource('/blog-category', 'BlogCategoryController');
    Route::resource('/manage-blogs', 'BlogController');
    Route::get('/manage-blogs-all', 'BlogController@viewAll')->name('manage-blogs.all');
    Route::resource('/users', 'UserController');
    Route::get('/users-all', 'UserController@viewAll')->name('users.all');
    Route::get('/admin-all', 'UserController@allAdmin')->name('admin.all');
    Route::resource('plan', 'PlanController');
    Route::get('plan/{id}/edit', 'PlanController@edit')->name('plan.edit');
    Route::get('/plan/status/{id}/{status}', 'PlanController@status')->name('plan.status');

    Route::get('/payment/method', 'PaymentMethodController@index')->name('payment.method');
    Route::post('payment/paypal/store', 'PaymentMethodController@paypalSettingStore')->name('payment.paypal.store');
    Route::post('payment/stripe/store', 'PaymentMethodController@stripeSettingStore')->name('payment.stripe.store');
    Route::post('payment/rezor/store', 'PaymentMethodController@rezorSettingStore')->name('payment.rezor.store');
    Route::post('payment/bank/store', 'PaymentMethodController@bankSettingStore')->name('payment.bank.store');
    Route::post('payment/mollie/store', 'PaymentMethodController@mollieSettingStore')->name('payment.mollie.store');
    Route::post('/seo/store', 'SettingController@seoStore')->name('seo.store');
    Route::get('/setting/setup', 'SettingController@setting')->name('setting');
    Route::post('/setting/setup/update', 'SettingController@siteSettingUpdate')->name('site.update');
    Route::post('/setting/smtp/update', 'SettingController@smtpStore')->name('smtp.store');
    Route::post('/open/ai/store', 'SettingController@openAiStore')->name('open.ai.store');
    Route::post('/tawkto/store', 'SettingController@tawkToStore')->name('tawkto.store');
    Route::post('/social/store', 'SettingController@socialStore')->name('social.store');
    Route::post('/pwa/configer', 'SettingController@pwaSetupStore')->name('pwa.setup.store');

    // order get data
    Route::get('orders','OrderController@index')->name('order.index');
    Route::get('order/pending','OrderController@pending')->name('order.pending');
    Route::get('order/approved/{id}','OrderController@approved')->name('order.approved');

    Route::get('pages', [PageController::class, 'pageIndex'])->name('pages.index');
    Route::get('pages/create', [PageController::class, 'pageCreate'])->name('pages.create');
    Route::get('pages/delete/{id}', [PageController::class, 'pageDestroy'])->name('pages.destroy');
    Route::post('pages/store', [PageController::class, 'pageStore'])->name('pages.store');
    Route::get('pages/edit/{id}', [PageController::class, 'pageEdit'])->name('pages.edit');
    Route::post('pages/update', [PageController::class, 'pageUpdate'])->name('pages.update');
    Route::get('pages/active', [PageController::class, 'pageActive'])->name('pages.active');
    Route::get('pages/authorize', [PageController::class, 'pageAuthorize'])->name('pages.authorize');
    Route::get('content/{id}', [PageController::class, 'contentIndex'])->name('pages.content.index');
    Route::get('pages/content/create/{id}', [PageController::class, 'contentCreate'])->name('pages.content.create');
    Route::post('pages/content/store', [PageController::class, 'contentStore'])->name('pages.content.store');
    Route::get('pages/content/active', [PageController::class, 'contentActive'])->name('pages.content.active');
    Route::get('pages/content/edit/{id}', [PageController::class, 'contentEdit'])->name('pages.content.edit');
    Route::post('pages/content/update', [PageController::class, 'contentUpdate'])->name('pages.content.update');
    Route::get('pages/content/delete/{id}', [PageController::class, 'contentDestroy'])->name('pages.content.destroy');

});

Route::get('payment/success', function (Request $request) {
    return $request;
})->name('order.success');
Route::get('handle', [PlanController::class, 'handleWebhookNotification'])->name('webhooks.mollie');

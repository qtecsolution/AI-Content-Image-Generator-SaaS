<?php

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
    Route::post('/content-openai','PostController@openAi')->name('content.openai');
    Route::get('/image-openai','PostController@imageGenrate')->name('image.openai');
    Route::get('/default','PostController@default');
});
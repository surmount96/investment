<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes(['verify'=>true]);

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group(['prefix'=>'user','middleware' =>['role:Member','verified']], function(){
    Route::get('/payment','PaymentController@index')->name('payment');
    Route::get('/transaction','ClientController@transaction');
    Route::get('/wallet','ClientController@wallet');
    Route::get('/investment','ClientController@investment');
    Route::get('/investment/{name}','ClientController@showInvest');
    Route::get('/profile/{id}','ClientController@profile');
    Route::post('/profile/{id}','ClientController@storeProfile');
    Route::post('/referral','ClientController@referral');
    Route::get('/terms','ClientController@terms');
});

Route::group(['prefix'=>'admin','middleware' =>'role:Administrator'], function(){
    Route::get('/transaction','AdminController@transaction');
    Route::get('/investment','AdminController@investment');
    Route::get('/users','AdminController@users');
    Route::patch('/user/{id}','AdminController@edit');
    Route::post('/profile/{id}','ClientController@storeProfile');
    Route::get('/user/{id}','AdminController@show');
});

Route::delete('/user/{id}','AdminController@delete');

Route::group(['middleware' =>['auth','verified']], function(){
    Route::get('/user/chat','ChatController@index');
    Route::post('/store/chat','ChatController@store');
    Route::get('/chat','ChatController@chat');
    Route::get('/user','ChatController@user');
    Route::get('/username','ChatController@userName');
});

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');

Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

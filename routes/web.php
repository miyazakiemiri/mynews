<?php

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
//     if (date("h") < "20") {
//     return '<html><body><h1></h1><p>こんにちは</p></body></html>';
//   }else{
//     return '<html><body><h1></h1><p>こんばんは</p></body></html>';
//  }
return view('welcome');
});

Route::group(['prefix' => 'admin' , 'middleware' => 'auth'], function(){
    Route::get('news/create','Admin\NewsController@add');
    Route::post('news/create','Admin\NewsController@create');//追記
    Route::get('profile/create','Admin\ProfileController@add');
    Route::post('profile/create','Admin\ProfileController@create');//追記
    Route::get('profile/edit','Admin\ProfileController@edit');
    Route::post('profile/edit','Admin\ProfileController@update');//追記　profileController.phpと記入の順番は連動するべきなのか
});

//　↑にまとめる事ができた！
// Route::group(['prefix' => 'admin'], function(){
//     Route::get('profile/create','Admin\ProfileController@add')->middleware('auth');
//     Route::get('profile/edit','Admin\ProfileController@edit')->middleware('auth');
// });

// なぜ勝手についかされているのか疑問
//答え：$ php artisan make:authを実行したから
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

?>
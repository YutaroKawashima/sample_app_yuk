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
    return view('welcome');
});

Route::get( '/other', function () {
    return 'other';
});

Route::get( '/view_sample', function () {
    return view( 'sample' );
});

Route::get( '/profile', function () {
    return view( 'profile' );
});

Route::get( '/blade_sample', function () {
    $title = 'bladeテンプレートのサンプルです';
    $description = 'bladeテンプレートを利用すると、<br>HTML内にPHPの変数を埋め込むことができます。';

    return view( 'blade_sample' , [
        'title' => $title,
        'description' => $description,
    ]);
});

Route::get( '/sample_action', 'SampleController@sample_action' );

Route::get( '/practice', 'SampleController@practice' );

Route::get( '/message_sample', 'SampleController@message_sample');

Route::get( '/message_practice', 'SampleController@message_practice' );

Route::get( '/blade_example', 'SampleController@blade_example' );


//ミニ掲示板
Route::get( '/messages', 'MessagesController@index');

Route::post( '/messages', 'MessagesController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ログイン認証
Route::prefix('admin')->name('admin::')->group(function () {
    //ログインフォーム
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

    //ログイン処理
    Route::get('login', 'Auth\LoginController@login');

    //ログアウト処理
    Route::get('logout', 'Auth\LoginController@logout');
});

//Admin認証
Route::middleware('auth:admin')->group(function () {
    Route::get('admin', 'AdminController@index');
});

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

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return session_save_path();//phpinfo();//view('welcome');
});

Route::get('login',array('uses' => 'Auth\LoginController@showLogin'));

Route::post('login',array('uses' => 'Auth\LoginController@doLogin'));

//Route::group(['middleware' => 'auth'], function () {
//
//    //Route::get('/test/{id}','Dashboard\DashboardController@test');
//    
//    Route::get('test/{id}', array('uses' => 'Dashboard\DashboardController@test'));
//
//    //App\Http\Controllers\Dashboard\DashboardController
//
//    Route::get('/home' , array('uses' => 'DashboardController@home'));
//
//});
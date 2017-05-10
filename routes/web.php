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

Route::get('auth/login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('auth/login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@login']);
Route::get('auth/logout', [ 'as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

//Route::get('/logout', 'Auth\LoginController@logout');



//Route::get('login',array('as' => 'login' , 'uses' => 'Auth\LoginController@showLogin'));

//Route::post('login',array('as' => 'login' , 'uses' => 'Auth\LoginController@doLogin'));

  //Route::get('/', function () {
  //      return session_save_path();//phpinfo();//view('welcome');
   // });
    
Route::group(['middleware' => 'auth'], function () {
  
    //Route::get('/', function () {
    //    $d = Auth::check();
    //    return view('home');//session_save_path();//phpinfo();//view('welcome');
    //});
//
    Route::get('/', array('as' => 'home' , 'uses' => 'Dashboard\DashboardController@home'));
    Route::get('/assignment', array('as' => 'assignment' , 'uses' => 'Review\ReviewController@home'));
//    
//    Route::get('test/{id}', array('uses' => 'Dashboard\DashboardController@test'));
//
//    //App\Http\Controllers\Dashboard\DashboardController
//
//    Route::get('/home' , array('uses' => 'DashboardController@home'));
//
});

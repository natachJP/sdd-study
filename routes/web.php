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
    Route::get('/', array('as' => 'home' , 'uses' => 'Dashboard\DashboardController@Index'));
    Route::get('/assignment', array('as' => 'assignment' , 'uses' => 'Review\AssignmentController@Index'));
    Route::get('/question/{id}', array('as' => 'assignment-question' , 'uses' => 'Review\QuestionController@Index'));
    Route::get('/answer/{id}', array('as' => 'assignment-question-answer' , 'uses' => 'Review\AnswerController@Index'));
    //Route::post('comment', array('as' => 'comment' , 'uses' => 'Review\AnswerController@ShowComment'));
    Route::post('/comment/{id}', array('as' => 'comment' , 'uses' => 'Review\AnswerController@Comment'));
    Route::post('/comment/{id}/{commentid}', array('as' => 'subcomment' , 'uses' => 'Review\AnswerController@SubComment'));

    Route::put('/update/comment/{id}', array('as' => 'update-comment' , 'uses' => 'Review\AnswerController@UpdateComment'));
    Route::put('/update/subcomment/{id}', array('as' => 'update-subcomment' , 'uses' => 'Review\AnswerController@UpdateSubComment'));

    Route::delete('/delete/comment/{id}', array('as' => 'delete-comment' , 'uses' => 'Review\AnswerController@DeleteComment'));
    Route::delete('/delete/subcomment/{id}', array('as' => 'delete-subcomment' , 'uses' => 'Review\AnswerController@DeleteSubComment'));
    
    Route::match(['get', 'post'],'/report/comment', array('as' => 'comment-report' , 'uses' => 'Review\ReportController@CommentReport'));
    Route::get('/report/score', array('as' => 'score-report' , 'uses' => 'Review\ReportController@ScoreReport'));

    
//    
//    Route::get('test/{id}', array('uses' => 'Dashboard\DashboardController@test'));
//
//    //App\Http\Controllers\Dashboard\DashboardController
//
//    Route::get('/home' , array('uses' => 'DashboardController@home'));
//
});

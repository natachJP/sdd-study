<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use App\Comment;
use App\StudentAnswer;
use DB;

class DashboardController extends Controller
{
	
	/**
	* Create a new controller instance.
	     *
	     * @return void
	     */
	public function __construct()
	{
		//
	}

	public function Index(){
		$commentMonthTotal = Comment::whereMonth('created_at','=',date('m'))->count();
		$commentMonth = StudentAnswer::select(DB::raw('count(*) as total'))->groupby('created_at')->whereMonth('created_at','=',date('m'))->pluck('total');
		
		// ->groupBy(function($date) {
        // 	return date_format($date->created_at,'d'); //Carbon::parse($date->created_at)->format('d'); // grouping by years
        // });

		return view('home');
		
	}
	
	//public function test($id){
	//	
	//	
	//	return User::findOrFail($id);
	//	//return $results = app('db')->select("SELECT * FROM user WHERE id=".$id);
	//}
	
	//
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;

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

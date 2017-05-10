<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\User;

class ReviewController extends Controller
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

	public function home(){
		return view('assignment');
	}
	
	
	//
}

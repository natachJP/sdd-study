<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Assignment;
use App\Question;
use App\StudentAnswer;

class AssignmentController extends Controller
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
		$data =  Assignment::get();
		return view('assignment', ['assign_data' => $data]);
	}
	
	
	//
}

<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Assignment;
use App\User;
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
		$total =  User::where('role_id','=','2')->count();
		$data =  Assignment::get()->each(function($item,$key) use ($total) {
			$receive = Question::getStudentAnswerByAssignmentId($item->id);
			$item->receivePercentage = ($receive/$total)*100;
			$future = strtotime( date("Y-m-d") ); 
			$timefromdb = strtotime("2017-05-19"); //Future date.
			$diff = ($timefromdb - $future)/(60 * 60 * 24); 
			$item->remainingText = ($diff < 0 ? "Time's Up!" : ($diff = 0  ? "Send it now!!" : $diff." day remaining"));
			$item->remainingDay = $diff;

			 


			
			//Question::where('assignment_id','=',$item->id)->withCount('student_answer')->get();
		});
		$qqq = Assignment::cursor();
		
		return view('assignment', ['assign_data' => $data]);
	}
	
	
	//
}

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

	public function Index(){
		$total =  User::where('role_id','=','2')->count();
		$data =  Assignment::get()->each(function($item,$key) use ($total) {
			$receive = $this->GetNumberOfStudent($total,$item);
			//$receive = Question::getStudentAnswerByAssignmentId($item->id);
			$item->receivePercentage = $this->CalculateReceivePerentage($receive,$total);
			$diff = $this->CalculateRemainingDay($item->duedate); 
			$item->remainingText = ($diff < 0 ? "Time's Up!" : ($diff = 0  ? "Send it now!!" : $diff." day remaining"));
			$item->remainingDay = $diff;
		});
		return view('assignment', ['assign_data' => $data->sortBy('remainingDay')]);
	}

	public function GetNumberOfStudent($total,$item){
		return StudentAnswer::with('question')->whereHas('question', function($query) use ($item){
				$query->where('question.assignment_id','=',$item->id);
			})->select('user_id')->distinct('user_id')->count('user_id');
	}

	public function CalculateReceivePerentage($receive,$total){
		return ($receive/$total)*100;
	}

	public function CalculateRemainingDay($duedate){
		$future = strtotime( date("Y-m-d") ); 
		$timefromdb = strtotime($duedate); //Future date.
		return $diff = ($timefromdb - $future)/(60 * 60 * 24); 
	}
}

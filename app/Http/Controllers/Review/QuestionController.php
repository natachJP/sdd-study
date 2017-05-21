<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Assignment;
use App\User;
use App\Question;
use App\StudentAnswer;

class QuestionController extends Controller
{
	public function __construct()
	{
		//
	}

    public function Index($id){
		$instruction = Assignment::find($id)->description;
		$data = Question::where('assignment_id','=',$id)->with('student_answer.user')->get()->each(function($item,$key){
			$first = $item->student_answer->sortByDesc('updated_at')->first();
			if($first == null){
				$item->lastperson = "-";
				$item->lasttime = "-";
			}else{
				$item->lastperson = $first->user->firstname.' '.$first->user->lastname;
				$item->lasttime = date_format($first->updated_at,'g:i a - d.m.Y');
			}
		});
		return view('question', ['question_data' => $data , 'instruction' => $instruction]);
    }

}
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
		$instruction = Assignment::find($id)->first()->description;
		$data = Question::with('student_answer.user')->get()->each(function($item,$key){
			$first = $item->student_answer->sortByDesc('updated_at')->first();
			$item->lastperson = $first->user->firstname.' '.$first->user->lastname;
			$item->lasttime = date_format($first->updated_at,'g:i a - d.m.Y');
		});
		return view('question', ['question_data' => $data , 'instruction' => $instruction]);
    }

}
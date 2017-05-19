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
			$user = $item->student_answer->sortBy('updated_at')->first()->user;
			$item->lastperson = $user->firstname.' '.$user->lastname;
			$item->lasttime = date_format($item->student_answer->sortByDesc('updated_at')->first()->updated_at,'g:i a - d.m.Y');
		});
		return view('question', ['question_data' => $data , 'instruction' => $instruction]);
    }

}
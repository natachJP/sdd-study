<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Assignment;
use App\User;
use App\Question;
use App\StudentAnswer;

class AnswerController extends Controller
{
	public function __construct()
	{
		//
	}

    public function Index($id){
		$data = StudentAnswer::with('question')->find($id);
		return view('answer', ['data' => $data]);
    }

}
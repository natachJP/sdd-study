<?php

namespace App\Http\Controllers\Review;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Assignment;
use App\User;
use App\Question;
use App\SubComment;
use App\Comment;
use App\StudentAnswer;
use Auth;


class AnswerController extends Controller
{
	public function __construct()
	{
		//
	}

    public function Index($id){
		$data = StudentAnswer::with('comments.subcomments.user','comments.user','question')->find($id);
		return view('answer', ['data' => $data]);
    }

	public function Comment($id,Request $request){
		$comment =  new Comment;

		$comment->comment = $request->comment;
		$comment->user_id = Auth::user()->id;
		$comment->student_answer_id = $id;

		$comment->save();
		
		return redirect()->route('assignment-question-answer', ['id' => $id]);
	}

	public function SubComment($id,$commentid,Request $request){
		$subcomment =  new SubComment;

		$subcomment->comment = $request->comment;
		$subcomment->user_id = Auth::user()->id;
		$subcomment->comment_id = $commentid;

		$subcomment->save();

		return redirect()->route('assignment-question-answer', ['id' => $id]);
	}

}
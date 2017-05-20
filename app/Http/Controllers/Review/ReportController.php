<?php

namespace App\Http\Controllers\Review;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\User;
use App\Question;
use App\StudentAnswer;

class ReportController extends Controller
{
	public function __construct()
	{
		//
	}

    public function CommentReport(Request $request){
        $date = $request->date;
        if($date == null){
            $date = date('Y-m-d');
        }
        $data = $this->getDataCommentReportByDate($date);
        return view('commentreport', ['data' => $data , 'date'=> $date]);
    }

    public function ScoreReport(){
        $data = User::where('role_id','=','2')->get()->each(function($item,$key){
            $item->score = $item->studentanswer()->sum('score');
        });
        return view('scorereport', ['data' => $data ]);
    }



    public function getDataCommentReportByDate($date){
        return Comment::with('user','studentanswer.user','studentanswer.question')->whereDate('created_at','=',$date)->get();
    }

}
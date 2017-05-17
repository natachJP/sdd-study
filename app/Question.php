<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    protected $table = "question";

    protected $fillable = ['id','assignment_id','name','description','guideline','score','active','deleted','created_at','updated_at'];

    public function assignment(){
        $this->belongsTo('App\Assignment');
    }

    public function student_answer(){
        return $this->hasMany('App\StudentAnswer');
    }

    public static function getStudentAnswerByAssignmentId($id){
        return DB::table('question')
        ->join('student_answer','question.id','=','student_answer.question_id')
        ->where('question.assignment_id','=',$id)->select(DB::raw('COUNT(DISTINCT student_answer.user_id) as Total'))->first()->Total;

        //select a.* , COUNT(DISTINCT c.user_id) as UserCount from assignment as a join question as b on a.id = b.assignment_id join student_answer as c on b.id = c.question_id
    }
}
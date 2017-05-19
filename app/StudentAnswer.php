<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    protected $table = "student_answer";

    protected $fillable = ['id','question_id','user_id','script','score','result','message','created_at','updated_at'];

    public function question(){
        return $this->belongsTo('App\Question','question_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
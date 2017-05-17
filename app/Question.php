<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "question";

    protected $fillable = ['id','assignment_id','name','description','guideline','score','active','deleted','created_at','updated_at'];

    public function student_answer(){
        return $this->hasMany('App\StudentAnswer');
    }
}
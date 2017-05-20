<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = true;

    protected $table = "comment";

    protected $fillable = ['id','student_answer_id','user_id','comment','created_at','updated_at'];

    public function studentanswer(){
        return $this->belongsTo('App\StudentAnswer','student_answer_id');
    }

    public function subcomments(){
        return $this->hasMany('App\SubComment');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
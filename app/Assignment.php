<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $table = "assignment";

    protected $fillable = ['id','name','description','duedate','active','deleted','created_at','updated_at'];

    public function questions(){
        return $this->hasMany('App\Question');
    }
}
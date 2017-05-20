<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubComment extends Model
{
    public $timestamps = true;

    protected $table = "sub_comment";

    protected $fillable = ['id','comment_id','user_id','comment','created_at','updated_at'];

    public function comment(){
        return $this->belongsTo('App\Comment','comment_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
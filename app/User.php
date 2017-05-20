<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = true;

    protected $table = "user";

    protected $fillable = [
        'id','role_id','user','firstname','lastname', 'email','active','deleted','regisdate','created_at','updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function studentanswer(){
        return $this->hasMany('App\StudentAnswer');
    }
}

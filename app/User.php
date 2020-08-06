<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;

    protected $table="users";

    protected $fillable = ['*'];

    public function comment(){
        return $this->hasMany('App\Comment');
    }
    public function bill(){
        return $this->hasMany('App\Bill');
    }
}

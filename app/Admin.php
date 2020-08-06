<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table="admin";

    protected $fillable = ['fullname','username', 'password','phone','address','avatar', 'email','gender','status','level'];
	public function post(){
        $this->hasMany('App\Post');
    }
    public function product(){
        $this->hasMany('App\Product');
    }
    public function slider(){
        $this->hasMany('App\Slider');
    }
    public function page(){
        $this->hasMany('App\Page');
    }
}

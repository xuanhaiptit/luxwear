<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table="bill";

    protected $fillable = ['user_id','fullname','phone','address', 'email','note','status'];

    public function bill_detail(){
   		return $this->hasMany('App\Bill_detail');
   	}
   	public function user(){
   		return $this->hasMany('App\User');
   	}
}

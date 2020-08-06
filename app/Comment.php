<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table="comment";

    protected $fillable = ['name','image','message','user_id','product_id','status'];

    public function product(){
   		return $this->belongsTo('App\Product');
   	}
   	public function user(){
   		return $this->belongsTo('App\User');
   	}
}

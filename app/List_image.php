<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List_image extends Model
{
    protected $table="list_image";

    protected $fillable = ['image','product_id','position'];

    public function product(){
   		return $this->belongsTo('App\Product');
   	}
}

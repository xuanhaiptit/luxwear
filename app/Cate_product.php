<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate_product extends Model
{
    protected $table="cate_product";

    protected $fillable = ['name','name_en','alias','keyword','status'];

    public function cate_product_detail(){
   		return $this->hasMany('App\Cate_Product_Detail');
   	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    protected $table = 'bill_detail';
   	protected $fillable = ['bill_id','product_id','product_name','product_name_en','price_new','image','quality','sub_total','status'];

   	public function product(){
   		return $this->belongsTo('App\Product');
   	}
   	public function bill(){
   		return $this->belongsTo('App\Bill');
   	}
}

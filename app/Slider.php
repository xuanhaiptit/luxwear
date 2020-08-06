<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table="slider";

    protected $fillable = ['name','image','admin_id','status'];

    public function admin(){
   		return $this->belongsTo('App\Admin');
   	}
}

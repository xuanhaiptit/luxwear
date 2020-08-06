<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table="page";

    protected $fillable = ['page_title_en','alias','desc','content','desc_en','content_en','admin_id','status'];

    public function admin(){
   		return $this->belongsTo('App\Admin');
   	}
}

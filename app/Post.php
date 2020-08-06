<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table="post";

    protected $fillable = ['post_name','post_name_en','alias','image','desc','content','desc_en','content_en','admin_id','cate_post_id','featured_post','status'];

    public function admin(){
   		return $this->belongsTo('App\Admin');
   	}
   	public function cate_post(){
   		return $this->belongsTo('App\Cate_post');
   	}
}

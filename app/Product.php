<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = [
        '*'];

    public function fimage()
    {
        return $this->hasMany('App\List_image');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function cate_product()
    {
        return $this->belongsTo('App\Cate_product');
    }

    public function bill_detail()
    {
        return $this->belongsTo('App\Bill_detail');
    }

}

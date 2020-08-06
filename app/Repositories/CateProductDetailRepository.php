<?php


namespace App\Repositories;
use Bosnadev\Repositories\Eloquent\Repository;


class CateProductDetailRepository extends Repository
{
    public function model(){
        return "App\Cate_Product_Detail";
    }

    public function findById(int $id)
    {
        return $this->model->where('id', $id)->first();
    }

}

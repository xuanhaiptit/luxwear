<?php


namespace App\Repositories;
use App\List_image;
use Bosnadev\Repositories\Eloquent\Repository;
use App\Product;

class ImageRepository extends Repository
{
    public function model()
    {
        return "App\List_image";
    }
}

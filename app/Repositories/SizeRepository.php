<?php


namespace App\Repositories;

use App\List_image;
use App\Size;
use Bosnadev\Repositories\Eloquent\Repository;
use App\Repositories\BaseRepository;
use File;
use Input;

class SizeRepository extends Repository implements RepositoryInterface
{
    public function model()
    {
        return "App\Size";
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id)
    {
        // TODO: Implement findById() method.
    }

    /**
     * @inheritDoc
     */
    public function findOrFail($id, $columns = array('*'))
    {
        // TODO: Implement findOrFail() method.
    }

    public function getchangeStatus($request)
    {
        // TODO: Implement getchangeStatus() method.
    }
}

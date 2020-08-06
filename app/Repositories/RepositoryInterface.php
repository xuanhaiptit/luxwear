<?php

namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function findById(int $id);

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function findOrFail($id, $columns = array('*'));

    public function getchangeStatus($request);
}

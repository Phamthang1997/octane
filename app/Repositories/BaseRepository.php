<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use \Prettus\Repository\Eloquent\BaseRepository as PrettusBaseRepository;

class BaseRepository extends PrettusBaseRepository implements BaseRepositoryInterface
{
    /**
     * getModel
     *
     * @return string
     */
    public function model(): string
    {
        return Model::class;
    }
}
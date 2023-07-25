<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

interface BaseRepositoryInterface extends RepositoryInterface
{

    /**
     * getModel
     *
     * @return string
     */
    public function model() : string;
}

<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * getLogin
     *
     * @param $username
     * @param $password
     * @param $applicationId
     * @return mixed
     */
    public function getLogin($username, $password, $applicationId): mixed;
}
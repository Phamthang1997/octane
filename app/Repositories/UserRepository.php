<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * getModel
     *
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }

    /**
     * getLogin
     *
     * @param $username
     * @param $password
     * @param $applicationId
     * @return mixed
     */
    public function getLogin($username, $password, $applicationId): mixed
    {
        $user = $this->model()
            ::where('username', $username)
            ->where('organization_application_id', $applicationId)
            ->firstOrFail();
        if($user and Hash::check($password, $user->password)) {
            return $user;
        }

        return null;
    }
}

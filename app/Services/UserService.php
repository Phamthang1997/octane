<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UserService implements UserServiceInterface
{
    private UserRepositoryInterface $userRepository;

    /**
     * Constructor
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
    )
    {
        $this->userRepository = $userRepository;
    }
    /**
     * getLogin
     *
     * @param Request $request
     * @return mixed
     */
    public function getLogin(Request $request): mixed
    {
        $user = $this->userRepository->getLogin($request->username, $request->password, $request->application_id);

        # Cache user info to redis
        //Redis::set($user->id, json_encode($user));

        return [
            'token' => $user->createToken($user->email)->plainTextToken,
            'user_info' => $user
        ];
    }
}

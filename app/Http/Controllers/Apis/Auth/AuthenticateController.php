<?php

namespace App\Http\Controllers\Apis\Auth;

use App\Http\Controllers\Controller;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    protected UserServiceInterface $userService;

    /**
     * __construct
     *
     * @param UserServiceInterface $userService
     */
    public function __construct(
        UserServiceInterface $userService,
    ) {
        $this->userService = $userService;
    }

    /**
     * login
     *
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request): mixed
    {
        $data = $this->userService->getLogin($request);

        return $this->successResponse($data);
    }
}

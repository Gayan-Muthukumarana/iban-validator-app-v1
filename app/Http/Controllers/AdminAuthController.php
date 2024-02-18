<?php

namespace App\Http\Controllers;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private UserRepositoryInterface $userRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        try {
            if (Auth::attempt($request->only('email', 'password')) && $this->userRepository->checkAdminUser($request->get('email'))) {
                $user = $this->userRepository->getAuthUser();
                $token = $user->createToken('app')->accessToken;

                return $this->successJsonResponse(
                    [
                        'token' => $token,
                        'user' => $user
                    ],
                    config('messages.success_login_message'),
                    200
                );
            }
        } catch (\Exception $exception) {
            return $this->errorJsonResponse($exception->getMessage(), 400);
        }

        return $this->errorJsonResponse(config('messages.invalid_login_message'),401);
    }

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->userRepository->getAuthUser();
    }
}

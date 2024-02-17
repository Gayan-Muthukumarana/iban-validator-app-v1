<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
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

    public function login(Request $request)
    {
        try {
            if (Auth::attempt($request->only('email', 'password'))) {
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

    public function register(CreateUserRequest $request)
    {
        try {
            $userDetails['name'] = $request->get('name');
            $userDetails['email'] = $request->get('email');
            $userDetails['password'] = Hash::make($request->get('password'));

            return $this->userRepository->createUser($userDetails);
        } catch (\Exception $exception) {
            return $this->errorJsonResponse($exception->getMessage(), 400);
        }
    }
}

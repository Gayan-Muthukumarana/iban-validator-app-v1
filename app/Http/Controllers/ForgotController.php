<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Interfaces\PasswordResetRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ForgotController extends Controller
{
    private UserRepositoryInterface $userRepository;
    private PasswordResetRepositoryInterface $passwordResetRepository;

    public function __construct(UserRepositoryInterface $userRepository, PasswordResetRepositoryInterface $passwordResetRepository)
    {
        $this->userRepository = $userRepository;
        $this->passwordResetRepository = $passwordResetRepository;
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $email = $request->get('email');

        if (!$this->userRepository->checkUserExistByEmail($email)) {
            return $this->errorJsonResponse(config('messages.user_not_exist'),404);
        }

        try {
            $this->passwordResetRepository->create([
                'email' => $email,
                'token' => Str::random(config('system-settings.token_string_count'))
            ]);

            //Email
            return $this->successJsonResponse([], config('messages.check_email'), 200);
        } catch (\Exception $exception) {
            return $this->errorJsonResponse($exception->getMessage(), 400);
        }
    }
}

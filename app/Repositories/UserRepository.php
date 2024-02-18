<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @return User|\Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function getAuthUser()
    {
        return Auth::user();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllUsers()
    {
        return User::all();
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function getUserById($userId)
    {
        return User::findOrFail($userId);
    }

    /**
     * @param array $userDetails
     * @return mixed
     */
    public function createUser(array $userDetails)
    {
        return User::create($userDetails);
    }

    /**
     * @param $email
     * @return mixed
     */
    public function checkUserExistByEmail($email)
    {
        return User::where('email', $email)->exists();
    }

    /**
     * @param $email
     * @return mixed
     */
    public function checkAdminUser($email)
    {
        return User::where('email', $email)->where('is_admin', true)->exists();
    }
}

<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function getAuthUser();
    public function getAllUsers();
    public function getUserById($userId);
    public function createUser(array $userDetails);
    public function checkUserExistByEmail($email);
}

<?php

namespace App\Interfaces;

interface PasswordResetRepositoryInterface
{
    public function create(array $data);
}

<?php

namespace App\Repositories;

use App\Interfaces\PasswordResetRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PasswordResetRepository implements PasswordResetRepositoryInterface
{
    /**
     * @param array $data
     * @return bool
     */
    public function create(array $data)
    {
        return DB::table('password_reset_tokens')->insert($data);
    }
}

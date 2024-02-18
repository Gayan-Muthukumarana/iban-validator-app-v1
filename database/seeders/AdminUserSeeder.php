<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => config('system-settings.admin_name'),
            'email' => config('system-settings.admin_email'),
            'password' => Hash::make(config('system-settings.admin_password')),
            'is_admin' => true
        ]);
    }
}

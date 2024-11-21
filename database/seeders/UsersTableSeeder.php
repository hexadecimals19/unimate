<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'studentid' => '11111111',
            'studentemail' => 'admin@unimate.com',
            'password' => Hash::make('adminpassword'),
            'role' => 'admin',
            'email_verified_at' => now(), // Add current timestamp to verify email
        ]);

    }
}

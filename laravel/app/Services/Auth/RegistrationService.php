<?php

namespace App\Services\Auth;

use App\Models\{
    User,
};

class RegistrationService
{
    public function registration(string $email, string $password, string $gender): array
    {
        $user = User::create([
            'email' => $email,
            'password' => $password,
            'gender' => $gender
        ]);

        $token = $user->getFreshToken();

        return [
            'access_token' => $token,
            'token_type' => 'Bearer'
        ];
    }
}

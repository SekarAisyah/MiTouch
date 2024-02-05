<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; // Impor facade DB jika Anda ingin mengakses database secara langsung.

class CustomUserProvider implements UserProvider
{
    public function retrieveById($identifier)
    {
        // Implementasikan untuk mengambil pengguna berdasarkan ID
        return null;
    }

    public function retrieveByToken($identifier, $token)
    {
        // Implementasikan untuk mengambil pengguna berdasarkan token
        return null;
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        // Implementasikan untuk mengupdate remember token
    }

    public function retrieveByCredentials(array $credentials)
    {
        // Implementasikan untuk mengambil pengguna berdasarkan kredensial
        $user = DB::table('users')
                    ->where('email', $credentials['email'])
                    ->first();

        return $user;
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        if (!$user) {
            return false;
        }

        return Hash::check($credentials['password'], $user->password);
    }
}

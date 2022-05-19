<?php

namespace App\Support;

use App\Http\Model\User;

class Auth
{
    public static function attempt($email, $password)
    {
        $user = new User();
        if (!$user->find_by(['email' => $email]))
        {
            return false;
        }

        if ($password !== $user->password) {
            return false;
        }

        $_SESSION['user'] = [
            'id' => $user->id,
            'email' => $user->email,
            'password' => $user->password,
        ];

        return true;
    }

    public static function logout()
    {
        $_SESSION['user'] = [
            'id' => null,
            'email' => null,
            'password' => null,
        ];

        return self::guest();
    }

    public static function user()
    {
        $userInSession = isset($_SESSION['user']);

        if (!$userInSession) {
            return false;
        }

        $user = new User();
        return $user->find_by($_SESSION['user']);
    }

    public static function check(): bool
    {
        return (bool) self::user();
    }

    public static function guest(): bool
    {
        return !self::check();
    }
}
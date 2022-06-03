<?php

namespace App\Support;

use App\Http\Model\User;

class Auth
{
    public static function attempt($username, $password, $action = '')
    {
        $user = (new User())->find_by(['username' => $username, 'password' => $password]);

        if (!$user) {
            session()->flash()->set('success', []);
            session()->flash()->set('errors', ['Log in failed']);

            return false;
        }

        if ($action == "login" && !$user->confirmed) {
            session()->flash()->set('success', []);
            session()->flash()->set('errors', ['Please confirm your mail first']);
            return false;
        }

        $id = $user->id;
        $email = $user->email;
        $password = $user->password;
        $confirmed = $user->confirmed;

        session()->set('user', compact('id', 'email', 'password', 'confirmed'));

        return true;
    }

    public static function logout()
    {
        session()->remove('user');
    }

    public static function user()
    {
        if (!session()->has('user')) return false;

        return session()->get('user');

    }

    public static function isConfirmed(): bool
    {
        if (!session()->has('user')) return false;

        return session()->get('user')["confirmed"];
    }

    public static function isCompleted(): bool
    {
        if (!session()->has('user')) return false;

        return session()->get('user')->completed;
    }

    public static function isConnected(): bool
    {
        return session()->has('user');
    }

    public static function isNotConnected(): bool
    {
        return !self::isConnected();
    }
}
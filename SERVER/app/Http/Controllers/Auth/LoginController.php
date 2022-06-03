<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\StoreLoginRequest;
use App\Support\View;
use Auth;
use function back;
use function redirect;

class LoginController
{
    public function show(View $view)
    {
        return $view('auth.login');
    }

    public function store(StoreLoginRequest $input)
    {
        if ($input->failed()) return back();

        return Auth::attempt($input->username, $input->password, "login")
            ? redirect('/home')
            : back();
    }

    public function logout()
    {
        Auth::logout();

        if (Auth::isNotConnected()) {
            return redirect('/login');
        }
    }
}
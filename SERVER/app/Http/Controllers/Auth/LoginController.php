<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\StoreLoginRequest;
use App\Support\View;
use Auth;
use function back;
use function redirect;
use function session;

class LoginController
{
    public function show(View $view)
    {
        return $view('auth.login');
    }

    public function store(StoreLoginRequest $input)
    {
        if ($input->failed()) return back();

        return Auth::attempt($input->email, $input->password)
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
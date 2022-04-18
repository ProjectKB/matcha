<?php

namespace App\Http\Controllers;

use App\Support\RequestInput;
use Auth;
use App\Support\View;

class LoginController
{
    public function show(View $view)
    {
        return $view('auth.login');
    }

    public function store(RequestInput $input)
    {
        $successful = Auth::attempt($input->email, sha1($input->password));
        if (!$successful) {
            dd("Unsuccessful Login Attempt");
        }

        return redirect('/home');
    }

    public function logout()
    {
        Auth::logout();

        if (Auth::guest()) {
            return redirect('/login');
        }
    }
}
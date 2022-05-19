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
        $validator = session()->validator($input->all(), [
            'email' => 'string|email|required',
            'password' => 'required',
        ]);

        if ($validator->fails()) return back();

        if (!Auth::attempt($input->email, sha1($input->password))) {
            session()->flash()->set('errors', ['Log in failed']);

            return back();
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
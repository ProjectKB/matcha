<?php

namespace App\Http\Controllers;

use App\Http\Model\User;
use App\Support\Auth;
use App\Support\RequestInput;
use App\Support\View;

class RegisterController
{
    public function show(View $view)
    {
        return $view('auth.register');
    }

    public function store(RequestInput $input, User $user)
    {
        $validator = session()->validator($input->all(), [
            'email' => 'unique:users,email|email|required',
            'password' => 'required_with:confirm_password|same:confirm_password|min:5',
            'confirm_password' => 'string|required',
        ]);

        if ($validator->fails()) return back();

        $input->forget('confirm_password');
        $input->password = sha1($input->password);

        $user->create($input->all());

        Auth::attempt($user->email, $input->password);

        return redirect('/home');
    }
}
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
        if ($input->password != $input->confirm_password) {
            dd("Password and Confirm Password Do Not Match");
        }

        $input->forget('confirm_password');
        $input->password = sha1($input->password);

        if ($user->find_by(['email' => $input->email])) {
            dd("This email already exist.");
        }

        $user->create($input->all());

        Auth::attempt($user->email, $input->password);

        return redirect('/home');
    }
}
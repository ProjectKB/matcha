<?php

namespace App\Http\Controllers\Auth;

use App\Http\Model\User;
use App\Http\Requests\StoreRegisterRequest;
use App\Support\Auth;
use App\Support\View;
use function back;
use function redirect;

class RegisterController
{
    public function show(View $view)
    {
        return $view('auth.register');
    }

    public function store(StoreRegisterRequest $input, User $user)
    {
        if ($input->failed()) return back();

        $user->create($input->all());

        return Auth::attempt($user->email, $input->password)
            ? redirect('/home')
            : back();
    }
}
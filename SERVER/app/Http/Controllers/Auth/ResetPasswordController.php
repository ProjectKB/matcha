<?php

namespace App\Http\Controllers\Auth;

use App\Support\View;

class ResetPasswordController
{
    public function send(View $view)
    {
        return $view('auth.send-reset-password-link');
    }

    public function store()
    {

    }

    public function confirm(View $view)
    {
        return $view('auth.sent-reset-password-link-successfully');
    }

    public function show(View $view, string $key)
    {
        return $view('auth.reset-password', compact('key'));
    }

    public function update()
    {

    }
}
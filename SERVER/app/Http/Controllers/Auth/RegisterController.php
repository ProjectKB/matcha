<?php

namespace App\Http\Controllers\Auth;

use App\Http\Model\ConfirmEmail;
use App\Http\Model\User;
use App\Http\Requests\StoreRegisterRequest;
use App\Support\Auth;
use App\Support\View;
use Boot\Foundation\Mail\Mailable;
use Carbon\Carbon;
use function back;
use function redirect;

class RegisterController
{
    public function show(View $view)
    {
        return $view('auth.register');
    }

    public function store(StoreRegisterRequest $input, User $user, Mailable $mail, ConfirmEmail $confirmEmail)
    {
        if ($input->failed()) return back();

        $user->create($input->all());

        $now = Carbon::now();
        $url = config('app.url');

        $username = $user->username;
        $key = sha1($user->email . $user->password . $now);

        $confirmEmail->create(compact('key', 'username'));

        $mail->to($user->email, $user->firstName)
            ->from('admin@slim.auth', 'Slim Authentication')
            ->view('mail.auth.confirm', [
                'url' => "{$url}/confirm-email/{$key}"
            ]);

        $mail->subject('Confirm Mail')->send();

        return Auth::attempt($user->username, $input->password)
            ? redirect('/login')
            : back();
    }

    public function confirm(View $view, $key)
    {
        $confirm = (new ConfirmEmail)->find_by(['key' => $key]);

        $user = $confirm->user();

        $user->update(['confirmed' => true]);
        $confirm->delete('key', $confirm->key);

        return $view('auth.mail-confirmed');
    }
}
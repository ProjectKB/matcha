<?php

namespace App\Http\Controllers\Auth;

use App\Http\Model\ResetPassword;
use App\Http\Model\User;
use App\Http\Requests\StoreResetPasswordRequest;
use App\Http\Requests\UpdateResetPasswordRequest;
use App\Support\View;
use Boot\Foundation\Mail\Mailable;
use Carbon\Carbon;

class ResetPasswordController
{
    public function send(View $view)
    {
        return $view('auth.send-reset-password-link');
    }

    public function store(StoreResetPasswordRequest $input, Mailable $mail, ResetPassword $resetPassword)
    {
        if ($input->failed()) {
            return back();
        }

        $now = Carbon::now();
        $url = config('app.url');
        $user = (new User())->find_by(['email' => $input->email]);

        $user_id = $user->id;
        $key = sha1($user->email . $user->password . $now);

        $resetPassword->create(compact('key', 'user_id'));

        $mail->to($user->email, $user->firstName)
            ->from('admin@slim.auth', 'Slim Authentication')
            ->view('mail.auth.reset', [
                'url' => "{$url}/reset-password/{$key}"
            ]);

        $mail->subject('Reset Your Password')->send();
        return redirect('/reset-password/confirm');
    }

    public function confirm(View $view)
    {
        return $view('auth.sent-reset-password-link-successfully');
    }

    public function show(View $view, string $key)
    {
        return $view('auth.reset-password', compact('key'));
    }

    public function update(UpdateResetPasswordRequest $input, $key)
    {
        if ($input->failed()) return back();

        $reset = (new ResetPassword)->find_by(['key' => $key]);

        $user = $reset->user();

        $user->update(['password' => $input->password]);
        $reset->delete('key', $reset->key);

        return redirect('/login');
    }
}
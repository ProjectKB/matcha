<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompleteUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Support\View;

class UserController
{
    public function complete(View $view)
    {
        $user = getUser();

        return $view('user.complete', compact('user'));
    }

    public function completeAction(CompleteUserRequest $input)
    {
        if ($input->failed()) return redirect('/complete');

        getUser()->update($input->all());

        return redirect('/home');
    }

    public function update(View $view)
    {
        $user = getUser();
        $inversedGender = $user->gender == "man" ? "woman" : "man";
        $inversedOrientations = array_diff(['heterosexual', 'homosexual', 'bisexual'], [$user->orientation]);
        $firstOrientation = current($inversedOrientations);
        $lastOrientation = end($inversedOrientations);

        return $view('user.update', compact('user', 'firstOrientation', 'lastOrientation', 'inversedGender'));
    }

    public function updateAction(UpdateUserRequest $input)
    {
        if ($input->failed()) return redirect('/update');

        getUser()->update($input->all());

        return redirect('/home');
    }
}
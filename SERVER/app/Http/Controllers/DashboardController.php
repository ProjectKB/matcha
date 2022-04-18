<?php

namespace App\Http\Controllers;

use App\Http\Model\User;
use App\Support\RequestInput;
use Auth;
use App\Support\View;

class DashboardController
{
    public function home(View $view, User $user)
    {
        $user = Auth::user();

        return $view('dashboard.home', compact('user'));
    }
}
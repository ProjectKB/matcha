<?php

use App\Support\Route;
use App\Http\Middleware\RedirectIfAuthenticatedMiddleware as RedirectIfAuthenticated;
use App\Http\Middleware\RedirectIfGuestMiddleware as RedirectIfGuest;
use App\Support\View;

Route::get('/', fn (View $view) => $view('welcome'));

Route::get('/login', 'LoginController@show')->add(RedirectIfAuthenticated::class);
Route::post('/login', 'LoginController@store')->add(RedirectIfAuthenticated::class);
Route::get('/logout', 'LoginController@logout')->add(RedirectIfGuest::class);

Route::get('/home', 'DashboardController@home')->add(RedirectIfGuest::class);

Route::get('/register', 'RegisterController@show')->add(RedirectIfAuthenticated::class);
Route::post('/register', 'RegisterController@store')->add(RedirectIfAuthenticated::class);

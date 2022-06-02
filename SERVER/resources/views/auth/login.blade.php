@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <div>
        <form method="POST" action="/login">

            {!! csrf_input() !!}

            @old

            <h1>Login</h1>

            <input
                    {{--                    required--}}
                    name="username"
                    value="{{ old('username') }}"
                    placeholder="Username"
            />

            <input
                    {{--                    required--}}
                    {{--                    type="password"--}}
                    name="password"
                    value="{{ old('password') }}"
                    placeholder="Password"
            />

            <button type="submit">Login</button>

            <div>
                <div>
                    <a href="/register">
                        You're new? Register
                    </a>
                </div>
                <div>
                    <a href="/reset-password">
                        Forgot Password?
                    </a>
                </div>
            </div>

        </form>
    </div>
@endsection


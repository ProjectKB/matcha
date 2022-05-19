@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    @include('sections.errors')
    <div>
        <form method="POST" action="/login">
            {!! csrf_input() !!}
            @old
            <h1>Login</h1>
            <input
                    {{--                    required--}}
                    {{--                    type="email"--}}
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Email"
            />
            <input
                    {{--                    required--}}
                    {{--                    type="password"--}}
                    name="password"
                    value="{{ old('password') }}"
                    placeholder="Password"
            />
            <button type="submit">Login</button>
        </form>
    </div>
@endsection


@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    @include('sections.errors')
    <div>
        <form method="POST" action="/login">
            {!! csrf_input() !!}
            <h1>Login</h1>
            <input
                    required
                    type="email"
                    name="email"
                    placeholder="Email"
            />
            <input
                    required
                    type="password"
                    name="password"
                    placeholder="Password"
            />
            <button type="submit">Login</button>
        </form>
    </div>
@endsection


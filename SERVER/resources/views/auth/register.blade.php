@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    @include('sections.errors')
    <div>
        <form method="POST" action="/register">
            <h1>Register</h1>
            {!! csrf_input() !!}
            @old
            <input
{{--                    required--}}
                    type="text"
                    name="first_name"
                    value="{{ old("first_name")  }}"
                    placeholder="First Name"
            />
            <input
{{--                    required--}}
                    type="text"
                    name="last_name"
                    value="{{ old("last_name")  }}"

                    placeholder="Last Name"
            />
            <input
{{--                    required--}}
                    type="email"
                    name="email"
                    value="{{ old("email")  }}"
                    placeholder="Email"
            />
            <input
{{--                    required--}}
                    type="password"
                    name="password"
                    placeholder="Password"
            />
            <input
{{--                    required--}}
                    type="password"
                    name="confirm_password"
                    placeholder="Confirm Password"
            />
            <button type="submit">Register</button>
        </form>
    </div>
@endsection


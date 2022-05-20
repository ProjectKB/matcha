@extends('layouts.app')

@section('title')
    Reset Password
@endsection

@section('content')
    @include('sections.errors')
    <div>
        <form method="POST" action="/reset-password/{{ $key }}">
            {!! csrf_input() !!}
            <input
                    {{--                    required--}}
                    type="password"
                    name="password"
                    placeholder="New Password"
            />
            <input
                    {{--                    required--}}
                    type="password"
                    name="confirm_password"
                    placeholder="Confirm New Password"
            />
            <button type="submit">Reset Password</button>
        </form>
    </div>
@endsection


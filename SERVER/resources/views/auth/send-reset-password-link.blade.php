@extends('layouts.app')

@section('content')
    <div>
        <form method="POST" action="/reset-password">
            {!! csrf_input() !!}
            @old
            <input
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Email Address"
            />

            <button type="submit">
                Send Reset Password Link
            </button>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('title')
    Update
@endsection

@section('content')
    <div>
        <h1>Complete</h1>
        <form method="POST" action="/completeAction">

            {!! csrf_input() !!}

            @old

            <input
                    {{--                    required--}}
                    type="radio"
                    name="gender"
                    value="man"
            />
            <label for="man">Man</label><br>
            <input
                    {{--                    required--}}
                    type="radio"
                    name="gender"
                    value="woman"
            />
            <label for="woman">Woman</label><br>

            <input
                    {{--                    required--}}
                    type="text"
                    name="bio"
                    value="{{ old("bio") ?? $user->bio }}"
                    placeholder="Bio"
            /><br/>

            <input
                    {{--                    required--}}
                    type="radio"
                    name="orientation"
                    value="heterosexual"
            />
            <label for="heterosexual">Heterosexual</label><br>
            <input
                    {{--                    required--}}
                    type="radio"
                    name="orientation"
                    value="homosexual"
            />
            <label for="homosexual">Homosexual</label><br>
            <input
                    {{--                    required--}}
                    type="radio"
                    name="orientation"
                    value="bisexual"
            />
            <label for="bisexual">Bisexual</label><br>

            <input
                    {{--                    required--}}
                    type="text"
                    name="interests"
                    value="{{ old("interests") ?? $user->interests  }}"
                    placeholder="Interests"
            /><br/>

            <input
                    {{--                    required--}}
                    type="text"
                    name="localisation"
                    value="{{ old("localisation") ?? $user->localisation }}"
                    placeholder="Localisation"
            /><br/><br/>

            <button type="submit">Finalize Profile</button>

        </form>
    </div>
@endsection


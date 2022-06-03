@extends('layouts.app')

@section('title')
    Update
@endsection

@section('content')
    <div>
        <h1>Update</h1>
        <form method="POST" action="/updateAction">

            {!! csrf_input() !!}

            @old

            <input
                    type="text"
                    name="first_name"
                    value="{{ old("first_name") ?? $user->firstName }}"
                    placeholder="First Name"
            /><br/>

            <input
                    type="text"
                    name="last_name"
                    value="{{ old("last_name") ?? $user->lastName  }}"
                    placeholder="Last Name"
            /><br/>

            <input
                    type="email"
                    name="email"
                    value="{{ old("email") ?? $user->email  }}"
                    placeholder="Email"
            /><br/>

            <input
                    type="password"
                    name="password"
                    placeholder="Password"
            /><br/>

            <input
                    type="password"
                    name="confirm_password"
                    placeholder="Confirm Password"
            /><br/>

            <input
                    checked
                    type="radio"
                    name="gender"
                    value={{ $user->gender }}
            />
            <label for={{ $user->gender }}>{{ ucfirst($user->gender) }}</label><br>
            <input
                    type="radio"
                    name="gender"
                    value={{ $inversedGender }}
            />
            <label for={{ $inversedGender }}>{{ ucfirst($inversedGender) }}</label><br>

            <input
                    type="text"
                    name="bio"
                    value="{{ old("bio") ?? $user->bio }}"
                    placeholder="Bio"
            /><br/>

            <input
                    checked
                    type="radio"
                    name="orientation"
                    value={{ $user->orientation }}
            />
            <label for={{ $user->orientation }}>{{ ucfirst($user->orientation) }}</label><br>
            <input
                    type="radio"
                    name="orientation"
                    value={{ $firstOrientation }}
            />
            <label for={{ $firstOrientation }}>{{ ucfirst($firstOrientation) }}</label><br>
            <input
                    type="radio"
                    name="orientation"
                    value={{ $lastOrientation }}
            />
            <label for={{ $lastOrientation }}>{{ ucfirst($lastOrientation) }}</label><br>

            <input
                    type="text"
                    name="interests"
                    value="{{ old("interests") ?? $user->interests  }}"
                    placeholder="Interests"
            /><br/>

            <input
                    type="text"
                    name="localisation"
                    value="{{ old("localisation") ?? $user->localisation }}"
                    placeholder="Localisation"
            /><br/><br/>

            <button type="submit">Update</button>

        </form>
    </div>
@endsection


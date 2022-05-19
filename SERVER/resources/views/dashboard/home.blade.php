@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <h1>Home Dashboard!</h1>
    <h2>Welcome {{ $user['email'] }}</h2>
@endsection
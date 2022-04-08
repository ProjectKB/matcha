@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <div style="padding:10px">
        <h1>{{ $name }}</h1>
        <p>Auth Home Page</p>
        <p>{{ env('APP_NAME') }}</p>
    </div>
@endsection

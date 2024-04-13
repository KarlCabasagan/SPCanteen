@extends('layouts.layout')

@section('content')
    @auth
        <form action="/logout" method="POST">
            @csrf
            <input type="submit" value="Logout">
        </form>

    @else
        @section('title', 'SPCanteen - Login')
        <div class="loginForm">
            <form action="/login" method="POST">
                @csrf
                <input type="text" id="name" name="name" placeholder="Username">
                <input type="password" id="password" name="password" placeholder="Password">
                <input type="submit" value="Login">
            </form>
            <p>Don't have an account? <a href="register">Register</a></p>
        </div>

    @endauth
@endsection
@extends('layouts.layout')

@section('content')
    @auth
        <p>Set up profile</p>
        <a href="/">Home</a>
    @else
        @section('title', 'SPCanteen - Register')
        <div class="registrationForm">
            <form action="/register" method="POST">
                @csrf
                <input type="text" id="name" name="name" placeholder="Username">
                <input type="text" id="email" name="email" placeholder="example@example.com">
                <input type="password" id="password" name="password" placeholder="Password">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                <input type="submit" value="Register">
            </form>
            <p>Already have an account? <a href="/">Login</a></p>
        </div>
    @endauth
    
@endsection
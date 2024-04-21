@extends('layouts.layout')

@section('content')
    @auth
        <h1>USER PAGE</h1>
        <form action="/logout" method="POST">
            @csrf
            <input type="submit" value="Logout">
        </form>
    @else
        @section('css', 'css/auth.css')
        @section('title', 'SPCanteen - Login')
        <div class="container">
            <div class="login-form">
                <div class="logo1">
                    <img id="logo" src="/images/SPCanteen.png" alt="SPCanteen.png">
                </div>
                <div class="form">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="input-container">
                            <input type="text" name="email" class="input-field" required>
                            <label>Email</label>
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="input-container">
                            <input type="password" name="password" class="input-field" required>
                            <label>Password</label>
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        <div class="forgot-password">
                            <a id="forgot-password" href="#">Forgot Password?</a>
                        </div>
                        <div class="login">
                            <input type="submit" class="login-btn" value="LOGIN">
                        </div>
                    </form>
                    <div class="register">
                        <p id="register-txt">Don't have an account? <a id="register-btn" href="register">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
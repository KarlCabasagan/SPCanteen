@extends('layouts.layout')

@section('content')
    @auth
        <p>Set up profile</p>
        <a href="/">Home</a>
    @else
        @section('css', 'css/auth.css')
        @section('title', 'SPCanteen - Register')
        <div class="container">
            <div class="registration-form">
                <div class="logo2">
                    <img id="logo" src="/images/SPCanteen.png" alt="SPCanteen.png">
                </div>
                <div class="form">
                    <form action="/register" method="POST">
                        @csrf
                        <div class="input-container">
                            <input type="text" name="username" class="input-field" required>
                            <label>Username</label>
                            <i class="fa-solid fa-user"></i>
                        </div>
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
                        <div class="input-container">
                            <input type="password" name="confirm-password" class="input-field" required>
                            <label>Confirm Password</label>
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        <div class="register">
                            <input type="submit" class="register-btn" value="REGISTER">
                        </div>
                    </form>
                    <div class="login">
                        <p id="login-txt">Already have an account? <a id="login-btn" href="/">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
@extends('layouts.layout')

@section('content')
    @auth
        <p>Set up profile</p>
        <a href="/">Home</a>
    @else
        @section('css', 'css/auth.css')
        @section('title', 'SPCanteen - Register')
        <div class="container">
            <div class="row">
                <div class="registration-form">
                    <div class="logo2">
                        <img id="logo" src="/images/SPCanteen.png" alt="SPCanteen.png">
                    </div>
                    <div class="form">
                        <form action="/register" method="POST">
                            @csrf
                            <div class="input-container">
                                <input type="text" name="name" class="input-field" required>
                                <label>Username</label>
                                <i class="fa-solid fa-user icons"></i>
                            </div>
                            <div class="input-container">
                                <input type="text" name="email" class="input-field" required>
                                <label>Email</label>
                                <i class="fa-solid fa-envelope icons"></i>
                            </div>
                            <div class="input-container">
                                <input type="password" id="password" name="password" class="input-field" required>
                                <label>Password</label>
                                <i class="fa-solid fa-eye icons" onclick="togglePassword(this, 'password')"></i>
                            </div>
                            <div class="input-container">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="input-field" required>
                                <label>Confirm Password</label>
                                <i class="fa-solid fa-eye icons" onclick="togglePassword(this, 'password_confirmation')"></i>
                            </div>
                            <div class="register">
                                <input type="submit" class="btn" value="REGISTER">
                            </div>
                        </form>
                        <div class="login">
                            <p id="login-txt">Already have an account? <a id="login-btn" href="/">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="{{asset('/fontawesome-free-6.5.1-web/css/all.min.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <style>
        body {
            font-family: 'Montserrat';
        }
    </style>

    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <div class="box1">
            <img src="/images/SPCanteen.png" alt="SPCanteen.png">
        </div>
        <div class="box2">
            <div class="username">
                <i class="fa-solid fa-user"></i>
                <input type="text" id="username" placeholder="Username">
            </div>
            <div class="password">
                <div class="passwordLeft">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="password" placeholder="Password">
                    
                </div>
                <div passwordRight>
                    <div class="empty"></div>
                    <i class="fa-solid fa-eye"></i>
                </div>
            </div>
            <a href="" id="forgotPassword">Forgot password?</a>
        </div>
        <div class="box3">
            <button class="loginButton">Login</button>
            <p>Don't have an account? <a href="" id="register">Register</a></p>
        </div>
    </div>
</body>
</html>
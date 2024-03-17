<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="{{asset('/fontawesome-free-6.5.1-web/css/all.min.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <title>Register Page</title>
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
            <div class="username">
                <i class="fa-solid fa-envelope"></i>
                <input type="text" id="username" placeholder="example@example.com">
            </div>
            <div class="password">
                <div class="passwordLeft">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="password" placeholder="Password">    
                    <i class="fa-solid fa-eye"></i>     
                </div>
            </div>
            <div class="confirmpassword">
                <div class="passwordLeft">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="confirmpassword" placeholder="Confirm Password">         
                    <i class="fa-solid fa-eye"></i>
                </div>  
            </div>
        </div>
        <div class="box3">
            <button class="loginButton">Register</button>
            <p>Already have an account? <a href="" id="register">Login</a></p>
        </div>
    </div>
</body>
</html>
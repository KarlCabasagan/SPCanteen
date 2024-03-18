<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/setupprofile.css">
    <link rel="stylesheet" href="{{asset('/fontawesome-free-6.5.1-web/css/all.min.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    
    <title>Profile</title>
</head>
<body>
    <div class="container">
        <h1><b>WELCOME</b></h1>

        <div class="avatar-container">
            <img src="/images/ProfileIcon.png" alt="ProfileIcon" class="avatar">
            <a href="" class="camera-icon"><i class="fas fa-camera"></i></a>
        </div>
        
        <h2><b>Upload Your Profile</b></h2>

        <form action="" method="">
            <div class="radio-btn">
                <div class="student">
                    <input type="radio" id="status_student" name="status" value="Student">
                    <label for="status_student"><b>Student</b></label>
                </div>
                <div class="faculty">
                    <input type="radio" id="status_faculty" name="status" value="Faculty">
                    <label for="status_faculty"><b>Faculty</b></label>
                </div>
            </div>
            <p class="bottom-txt">If done setting up your account, please click the button below to continue.</p>
            <button type="submit" class="upload-btn">Done</button>
        </form>
    </div>
</body>
</html>

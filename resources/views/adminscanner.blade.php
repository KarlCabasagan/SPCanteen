<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/adminscanner.css">
    <link rel="stylesheet" href="/css/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/assets/css/bs-theme-overrides.css">
    <link rel="stylesheet" href="/css/assets/css/styles.css">
    <link rel="stylesheet" href="{{asset('/fontawesome-free-6.5.1-web/css/all.min.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body>
    <div class="container-fluid d-flex flex-column-reverse justify-content-xl-start" style="height: 100vh;margin: 0;padding: 0;background: #e5e4e2;">
        <div class="text-nowrap d-flex flex-column justify-content-start align-items-center align-items-xl-center" style="height: 100vh;width: 18rem;color: var(--bs-body-color);background: var(--bs-body-bg);padding-top: initial;position: fixed;">
            <img src="/css/assets/img/423472445_7120341421354585_5211962867841594211_n.png" width="276" height="186" style="padding-top: 0;margin-top: 40px;">
            <nav class="d-flex flex-column" id="text-column">
                <a href="#"><i class="fa-brands fa-windows"></i>Dashboard</a>
                <a href="#"><i class="fa-solid fa-book"></i>Product List</a>
                <a href="#"><i class="fa-regular fa-file"></i>Transaction History</a>
                <a href="#"><i class="fa-solid fa-qrcode"></i>Order Scanner</a>
                <a href="#"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
            </nav>
        </div>
        <p2>SPC CANTEEN</p2>
        <p>© 2024 All Rights Reserved</p>
    </div>

    <div class="container shadow" style="max-width: 1200px; margin-top: 10px; height: 655px; background-color: lightgray; margin-top: 30px; text-align: center;">
        <h1><b>QR Code Scanner</b></h1>
        <video id="qr-video" width="500" height="400" autoplay></video>
        <div id="qr-result">
            <button type="submit" class="submit" style="width: 150px; text-align: center; font-size: 17px; height: 50px; background-color: maroon; color: #fff; border: none; border-radius: 3px;">SCAN</button>
        </div>
        <script src="/css/assets/bootstrap/js/bootstrap.min.js"></script>
        <script>
            const video = document.getElementById('qr-video');
            const resultContainer = document.getElementById('qr-result');
            navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } })
                .then(stream => {
                    video.srcObject = stream;
                    video.play();
                })
                .catch(err => console.error('Error accessing the camera:', err));
        </script>
    </div>
</body>
</html>



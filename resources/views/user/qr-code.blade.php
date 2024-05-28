@extends('layouts.user')

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/qrcode.js"></script>
@section('content')
<div class="container">
    <div class="cart-content">
        <div class="qr-header">
            <h1 id="mycart-txt">MY QR CODE</h1>
        </div>
        <div class="code-content">
            <img id="code-profile" src="images/profile/{{Auth::user()->image}}" alt="{{Auth::user()->name}}.jpg">
            <span id="code-name">{{Auth::user()->name}}</span>
            <div class="code-container">
                <div id="qrcode"></div>
                <script type="text/javascript">
                new QRCode(document.getElementById("qrcode"), "{{$orderId}}");
            </script>
            </div>
            <span id="code-txt">Scan this code to see your order.</span>
        </div>
    </div>
</div>
@endsection
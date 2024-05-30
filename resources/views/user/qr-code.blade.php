@extends('layouts.user')

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/qrcode.js"></script>
@section('content')
<div class="container">
    <div class="cart-content">
        <div class="code-content">
            <div class="status-order-container">
                <span id="status-order" style="font-size: 34px;">{{$order->status->name}}</span>
            </div>
            @if($order->status_id == 2)
                <div class="code-container">
                    <div id="qrcode"></div>
                    <script type="text/javascript">
                    new QRCode(document.getElementById("qrcode"), "{{$order->id}}");
                    </script>
                </div>
                <span id="code-txt">Scan this code to see your order.</span>
            @else
                <img id="prep-animation" src="images/Preparing.gif" alt="">
                <span id="preparing-txt">We already preparing your order <br> please wait.</span>
            @endif
        </div>
    </div>
</div>
@endsection
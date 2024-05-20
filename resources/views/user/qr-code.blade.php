@extends('layouts.user')

@section('content')
<div class="container">
    <div class="cart-content">
        <div class="cart-header">
            <a href="payment">
                <iconify-icon id="back-btn" icon="material-symbols:arrow-back-ios"></iconify-icon>
            </a>
            <h1 id="mycart-txt">MY QR CODE</h1>
            <a class="close-btn" href="/">
                <iconify-icon id="close-btn" icon="material-symbols-light:close"></iconify-icon>
            </a>
        </div>
        <div class="code-content">
            <img id="code-profile" src="images/profile/{{Auth::user()->image}}" alt="{{Auth::user()->name}}.jpg">
            <span id="code-name">{{Auth::user()->name}}</span>
            <div class="code-container">
                <img id="code-img" src="https://www.pngall.com/wp-content/uploads/2/QR-Code-PNG-Picture.png" alt="">
            </div>
            <span id="code-txt">Scan this code to see your order.</span>
        </div>
    </div>
</div>
@endsection
@extends('layouts.user')

@section('content')
<div class="container">
    <div class="cart-content">
        <div class="cart-header">
            <a href="cart">
                <iconify-icon id="back-btn" icon="material-symbols:arrow-back-ios"></iconify-icon>
            </a>
            <h1 id="mycart-txt">MY CART</h1>
            <a class="close-btn" href="/">
                <iconify-icon id="close-btn" icon="material-symbols-light:close"></iconify-icon>
            </a>
        </div>
        <div class="payment-content">
            <div class="payment-container">
                <div class="payment">
                    <img id="payment-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSMu0uy7QmaOOqFpYfRv6LdinOVhUfJLiEIkvedIA9Ww&s" alt="">
                    <span id="payment-txt">GCASH</span>
                    <iconify-icon id="payment-btn1" icon="vaadin:dot-circle"></iconify-icon>
                </div>
            </div>
            <div class="payment-containers">
                <div class="payment">
                    <img id="payments-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRJXmMbrItPLMTeMbSZzS46aE6JBdUvO6EtTa7dLw8LQ&s" alt="">
                    <span id="payments-txt">School Fee</span>
                    <iconify-icon id="payment-btn2" icon="vaadin:dot-circle"></iconify-icon>
                </div>
            </div>
            <div class="payment-containers">
                <div class="payment">
                    <img id="payments-image" src="/images/cash.png" alt="">
                    <span id="payments-txt">Cash On Hand</span>
                    <iconify-icon id="payment-btn3" icon="vaadin:dot-circle"></iconify-icon>
                </div>
            </div>
        </div>
        <div class="payments-container">
            <div class="price-txt">
                <div class="products-selected">
                    <span>Selected</span>
                    <span>1</span>
                </div>
                <div class="products-total">
                    <span id="total-txt">Total</span>
                    <h2>₱50</h2>
                </div>
            </div>
            <a class="payments-btn" href="qr-code">
                <button class="pay-now">
                    <span id="pay-txt">Pay Now</span>
                </button>
            </a>
        </div>
    </div>
</div>
@endsection
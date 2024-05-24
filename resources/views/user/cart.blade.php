@extends('layouts.user')

@section('content')
<div class="container">
    <div class="cart-content">
        <div class="cart-header">
            <a href="/">
                <iconify-icon id="back-btn" icon="material-symbols:arrow-back-ios"></iconify-icon>
            </a>
            <h1 id="mycart-txt">MY CART</h1>
            <a class="close-btn" href="/">
                <iconify-icon id="close-btn" icon="material-symbols-light:close"></iconify-icon>
            </a>
        </div>
        <div class="cart">
            <div class="cart-info">
                <div class="cart-row">
                @foreach ($carts as $cart)
                    <button class="cart-container">
                        <div class="cart-contents">
                            <div class="cart-infos">
                                <div class="cart-image">
                                    <img id="cart-image" src="images/product/{{$cart->product->image}}" alt="">
                                </div>
                                <div class="content-details">
                                    <div class="cart-details">
                                        <div class="cart-detail">
                                            <h1 id="cart-name">{{$cart->product->name}}</h1>
                                            <span id="cart-time">{{$cart->product->time}} min</span>
                                        </div>
                                        <div class="cart-delete">
                                            <iconify-icon icon="ion:trash-sharp"></iconify-icon>
                                        </div>
                                    </div>
                                    <div class="content-button">
                                        <div class="cart-price">
                                            <h3 id="cart-price">₱{{$cart->sum}}</h3>
                                        </div>
                                        <div class="quantity-button">
                                            <div class="plus-icon">
                                                <iconify-icon id="quantity-icons" icon="mdi:plus"></iconify-icon>
                                            </div>
                                            <span>{{$cart->quantity}}</span>
                                            <div class="minus-icon">
                                                <iconify-icon id="quantity-icons" icon="mdi:minus"></iconify-icon>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </button>
                @endforeach
                </div>
            </div>
            </div>
            <div class="price-container">
                <div class="price-txt">
                    <div class="products-selected">
                        <span>Selected</span>
                        <span>1</span>
                    </div>
                    <div class="products-total">
                        <span id="total-txt">Total</span>
                        <h2>₱{{$total}}</h2>
                    </div>
                </div>
                <a class="order-btn" href="payment">
                    <button class="order-now">
                        <span id="order-txt">Order Now</span>
                    </button>
                </a>
            </div>
    </div>
</div>
@endsection
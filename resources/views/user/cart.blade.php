@extends('layouts.user')

@section('content')
<div class="container">
    <div class="cart-content">
        <div class="cart-header">
            <a href="javascript:void(0);" onclick="goBack()">
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
                    <div class="cart-container" id="cart-container-{{$cart->id}}">
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
                                        <button class="cart-delete" data-cart-id="{{$cart->id}}">
                                            <iconify-icon icon="ion:trash-sharp"></iconify-icon>
                                        </button>
                                    </div>
                                    <div class="content-button">
                                        <div class="cart-price">
                                            <h3 id="cart-price">₱{{$cart->sum}}</h3>
                                        </div>
                                        <div class="quantity-button">
                                            <button class="plus-icon">
                                                <iconify-icon id="quantity-icons" icon="mdi:plus"></iconify-icon>
                                            </button>
                                            <span id="quantity-{{$cart->product->id}}">{{$cart->quantity}}</span>
                                            <button class="minus-icon">
                                                <iconify-icon id="quantity-icons" icon="mdi:minus"></iconify-icon>
                                            </button>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            </div>
            <div class="price-container">
                <div class="price-txt">
                    <div class="products-selected">
                        <span>Total Quantity</span>
                        <span id="total-quantity">{{$totalQuantity}}</span>
                    </div>
                    <div class="products-total">
                        <span id="total-txt">Total Price</span>
                        <h2 id="total-price">₱{{$totalPrice}}</h2>
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
<script>
    function goBack() {
        window.history.back();
    }

    //Modify Cart
    document.addEventListener('DOMContentLoaded', function() {
        //Delete Cart
        const deleteButtons = document.querySelectorAll(".cart-delete");
        deleteButtons.forEach(btn => {
            btn.addEventListener("click", () => {
                const cartId = btn.dataset.cartId;
                console.log(cartId);

                fetch(`/cart/delete/${cartId}`)
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById(`cart-container-${data.deletedCartId}`);
                    container.remove();
                    console.log(data);

                    //update total quantity
                    fetch(`/cart/get/total/quantity`)
                    .then(response => response.json())
                    .then(data => {
                        const quantitySpan = document.getElementById("total-quantity").innerHTML = data;
                    })
                    .catch(error => {
                    console.error('Error:', error);
                    });

                    //update total price
                    fetch(`/cart/get/total/price`)
                    .then(response => response.json())
                    .then(data => {
                        const quantitySpan = document.getElementById("total-price").innerHTML = data;
                    })
                    .catch(error => {
                    console.error('Error:', error);
                    });
                    

                })
                .catch(error => {
                console.error('Error:', error);
                });
            });
        });
    });

</script>
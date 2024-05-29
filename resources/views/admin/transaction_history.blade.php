@extends('layouts.admin')

@section('content1')
<div class="content">
    <h1 style="margin-bottom: 5px;">Transaction History</h1>
    <span style="margin-left: 7px; font-size: 30px;">{{$formattedDate}}</span>
    <div class="add-header-transaction">
        <div class="search-container-transaction">
            <form action="" method="GET">
                <input id="search" type="text" name="search" placeholder="Search...">
                <button type="submit" class="search-button-transaction">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="transaction">
        @foreach($orders as $order)
            <div class="transaction-container">
                <div class="orders-detail">
                    @if($order->status_id === 4)
                        <iconify-icon icon="material-symbols-light:circle" style="color: maroon;"></iconify-icon>
                    @else
                    <iconify-icon icon="material-symbols-light:circle" style="color: #008000;"></iconify-icon>
                    @endif
                </div>
                <div class="orders-details">
                    <span id="orders-header">Status</span>
                    <span>{{$order->status->name}}</span>
                </div>
                <div class="orders-details">
                    <span id="orders-header">Amount</span>
                    <span>₱ {{$order->amount}}</span>
                </div>
                <div class="orders-details">
                    <span id="orders-header">Date</span>
                    <span>{{$order->created_at->format('j F Y')}}</span>
                </div>
                <div class="orders-details">
                    <span id="orders-header">Order ID</span>
                    <span>SPC2024-{{$order->id}}</span>
                </div>
                <div class="orders-detailed open-modal5" data-order-id="{{$order->id}}">
                    <span id="orders-details">Details</span>
                </div>
            </div>
        @endforeach
    </div>

    <!--------- Transaction Details Modal -------->
    <div class="modal_transactions-history">
        <span>Amount</span>
        <div class="order-transactions-details">
            <span id="order-amount">₱135.00 PHP</span>
            <div class="orders-status">
                <iconify-icon id="modal-circle" icon="material-symbols-light:circle" class="orders-pending-icon"></iconify-icon>
                <span id="order-status" data-order-id="">Processing</span>
            </div>
        </div>
        <div class="orders-date-payment">
            <div class="orders-transaction-date">
                <span>Transaction Date</span>
                <span id="order-date">02/11/24</span>
            </div>
        <div class="orders-transaction-payment">
            <span>Payment Type</span>
            <span id="payment-type">GCash</span>
        </div>
        </div>
        <span class="transaction-details-txt">Transaction Details</span>
        <div class="orders-transaction-details">
            <div class="orders-id-username">
                <span>Order ID</span>
                <span>Username</span>
                <span>Role</span>
            </div>
            <div class="orders-order-details">
                <span id="order-id">SPC2024-69</span>
                <span id="user-name">Romarc Bongcaron</span>
                <span id="role-name">STUDENT</span>
            </div>
        </div>
        <span class="transaction-product_list-txt">Product List</span>
        <div class="orders-product_list-qr_code">
            <div id="orders-products-list" class="orders-products-list">
                <!-- <div id="orders-products-txt" class="orders-products-txt">
                    <span></span>
                </div> -->
            </div>
            <div class="orders-qr-code">
                <div id="qrcode"></div>
            </div>
        </div>
        <div class="close-modal5">
            <iconify-icon id="close-details" icon="material-symbols-light:close"></iconify-icon>
        </div>
    </div>
</div>
<script>
    const transactionlistModal = document.querySelector(".modal_transactions-history");

    const openModal5Buttons = document.querySelectorAll(".open-modal5");
    openModal5Buttons.forEach((btn) => {
        btn.addEventListener("click", () => {
            transactionlistModal.classList.add("active");
            
            const orderId = btn.dataset.orderId;

            fetch(`/order/get/details2/${orderId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById("orders-products-list").innerHTML = "";
                document.getElementById("qrcode").innerHTML = "";
                document.getElementById("order-amount").innerHTML = `₱${data.amount}`;
                if (data.status_id === 1) {
                    document.getElementById("modal-circle").style.color = "#FFD700";
                } else {
                    document.getElementById("modal-circle").style.color = "#008000";
                }
                document.getElementById("order-status").innerHTML = data.status_name;
                document.getElementById("order-date").innerHTML = data.date;
                document.getElementById("payment-type").innerHTML = data.payment_type;
                document.getElementById("order-id").innerHTML = `SPC2024-${data.id}`;
                document.getElementById("user-name").innerHTML = data.user.name;
                document.getElementById("role-name").innerHTML = data.user.role.name;
                
                //Get Products
                fetch(`/order/get/product/${orderId}`)
                .then(response => response.json())
                .then(data => {
                    //console.log(data);
                    data.forEach((cart) => {
                        const ordersProductsList = document.getElementById('orders-products-list');

                        if (ordersProductsList) {
                            const newProductItem = document.createElement('div');
                            newProductItem.classList.add('orders-products-txt');

                            const productNameSpan = document.createElement('span');
                            productNameSpan.textContent = `${cart.product_name} x${cart.product_quantity}`;

                            newProductItem.appendChild(productNameSpan);
                            ordersProductsList.appendChild(newProductItem);
                        }
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
                
                var qrcode = new QRCode("qrcode", {
                    text: `${data.id}`,
                    width: 50,
                    height: 50,
                    colorDark : "#000000",
                    colorLight : "#ffffff",
                    correctLevel : QRCode.CorrectLevel.H
                });


            })
            .catch(error => {
            console.error('Error:', error);
            });
        });
    });

    const closeModal5 = document.querySelector(".close-modal5");
    if (closeModal5) {
        closeModal5.addEventListener("click", () => {
            transactionlistModal.classList.remove("active");
        });
    }
</script>
@endsection
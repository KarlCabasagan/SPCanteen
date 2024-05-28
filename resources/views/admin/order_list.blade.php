@extends('layouts.admin')

@section('content1')
<div class="content">
    <h1 style="margin-bottom: 5px;">Order List</h1>
    <span style="margin-left: 7px; font-size: 30px;">{{$formattedDate}}</span>
    <div class="add-header-orders">
        <button class="qr-btn open-modal3">
            <iconify-icon icon="mdi:line-scan" id="qr-code-scanner"></iconify-icon>
            <span>QR Scanner</span>
        </button>
        <div class="search-container-orders">
            <form action="" method="GET">
                <input id="search" type="text" name="search" placeholder="Search...">
                <button type="submit" class="search-button-orders">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="orders">
        @foreach($orders as $order)
            <div class="transcation-container">
                <div class="orders-detail">
                    @if($order->status_id === 1)
                        <iconify-icon icon="material-symbols-light:circle" style="color: #FFD700;"></iconify-icon>
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
                <div class="orders-details open-modal4" data-order-id="{{$order->id}}">
                    <span id="orders-details">Details</span>
                </div>
            </div>
        @endforeach
    </div>

    <!--------- QR Scanner Modal -------->
    <div class="modal_qr-scanner">
        <div class="modal-container">
            <div class="close-modal3">
                <iconify-icon id="close" icon="material-symbols-light:close"></iconify-icon>
            </div>
        </div>
    </div>

    <!--------- Order Details Modal -------->
    <div class="modal_orders-list">
        <span>Amount</span>
        <div class="order-transaction-details">
            <span id="order-amount">₱135.00 PHP</span>
            <iconify-icon id="modal-circle" icon="material-symbols-light:circle" class="orders-pending-icon"></iconify-icon>
            <span id="order-status">Processing</span>
        </div>
        <div class="orders-date-payment">
            <div class="orders-transaction-date">
                <span>Transaction Date</span>
                <span id="order-date">02/11/24</span>
            </div>
        <div class="orders-transaction-payment">
            <span>Payment type</span>
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
        <div class="close-modal4">
            <iconify-icon icon="uil:step-backward-circle"></iconify-icon>
        </div>
    </div>
</div>
<script>
const openModal3 = document.querySelector(".open-modal3");
const closeModal3 = document.querySelector(".close-modal3");
const qrscannerModal = document.querySelector(".modal_qr-scanner");
const orderlistModal = document.querySelector(".modal_orders-list");

if (openModal3 && closeModal3 && qrscannerModal) {
  openModal3.addEventListener("click", () => {
    qrscannerModal.classList.add("active");
  });

  closeModal3.addEventListener("click", () => {
    qrscannerModal.classList.remove("active");
  });
}

const openModal4Buttons = document.querySelectorAll(".open-modal4");
  openModal4Buttons.forEach((btn) => {
        btn.addEventListener("click", () => {
            document.getElementById("orders-products-list").innerHTML = "";
            document.getElementById("qrcode").innerHTML = "";
            orderlistModal.classList.add("active");
            const orderId = btn.dataset.orderId;

            fetch(`/order/get/details/${orderId}`)
            .then(response => response.json())
            .then(data => {
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
                            productNameSpan.textContent = cart.product_name;

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

const closeModal4 = document.querySelector(".close-modal4");
if (closeModal4) {
    closeModal4.addEventListener("click", () => {
        orderlistModal.classList.remove("active");
    });
}
</script>
@endsection
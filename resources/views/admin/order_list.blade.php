@extends('layouts.admin')

@section('content1')
<div class="content">
    <h1 style="margin-bottom: 5px;">Order List</h1>
    <span style="margin-left: 7px; font-size: 30px;">February 07 2024</span>
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
        <div class="transcation-container">
            <div class="orders-detail">
                <iconify-icon icon="material-symbols-light:circle"></iconify-icon>
            </div>
            <div class="orders-details">
                <span id="orders-header">Status</span>
                <span>Pending</span>
            </div>
            <div class="orders-details">
                <span id="orders-header">Amount</span>
                <span>₱ 50.00</span>
            </div>
            <div class="orders-details">
                <span id="orders-header">Date</span>
                <span>4 February 2024</span>
            </div>
            <div class="orders-details">
                <span id="orders-header">Transaction ID</span>
                <span>SPC2024-69</span>
            </div>
            <div class="orders-details open-modal4">
                <span id="orders-details">Details</span>
            </div>
        </div>
        <div class="transcation-container">
            <div class="orders-detail">
                <iconify-icon icon="material-symbols-light:circle"></iconify-icon>
            </div>
            <div class="orders-details">
                <span id="orders-header">Status</span>
                <span>Pending</span>
            </div>
            <div class="orders-details">
                <span id="orders-header">Amount</span>
                <span>₱ 50.00</span>
            </div>
            <div class="orders-details">
                <span id="orders-header">Date</span>
                <span>4 February 2024</span>
            </div>
            <div class="orders-details">
                <span id="orders-header">Transaction ID</span>
                <span>SPC2024-69</span>
            </div>
            <button class="orders-details open-modal4">
                <span id="orders-details">Details</span>
            </button>
        </div>
    </div>

    <!--------- QR Scanner Modal -------->
    <div class="modal_qr-scanner">
        <form action="/addproduct" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-container">
                <input type="file" id="image" name="image" accept="image/*" onchange="previewProductImage(this);" style="display: none;">
                <div class="modal-icon">
                    <div class="img-box-fill">
                        <img id="img-box-fill" src="images/product/default.jpg">
                    </div>
                    <label for="image">
                        <div class="add-icon">
                            <iconify-icon icon="material-symbols:add" id="add-icon"></iconify-icon>
                        </div>
                    </label>
                </div>
                <div class="modal-content">
                    <div class="product-info">
                        <div class="product-name">
                            <input id="product-name" name="name" type="text" placeholder="Order Test">
                        </div>
                        <div class="product-price">
                            <input id="product-price" name="price" type="text" placeholder="₱ 0.00">
                        </div>
                        <div class="product-time">
                            <input id="product-time" name="time" type="text" placeholder="Estimated Time (In Minutes)">
                        </div>
                        <div class="product-categories">
                            <label id="select-category">Select Category</label>
                            <select id="product-categories" name="category_id" id="product">
                                <option value="1">Breakfast</option>
                                <option value="2">Lunch</option>
                                <option value="3">Snack</option>
                                <option value="4">Beverage</option>
                                <option value="5">Dinner</option>
                                <option value="6">Dessert</option>
                                <option value="7">Healthy</option>
                            </select>
                        </div>
                    </div>
                    <div class="save-btn">
                        <button id="save" type="submit">Save</button>
                    </div>
                    <div class="close-modal3">
                        <iconify-icon id="close" icon="material-symbols-light:close"></iconify-icon>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!--------- Order Details Modal -------->
    <div class="modal_orders-list">
        <span>Amount</span>
        <div class="order-transaction-details">
            <span>₱135.00 PHP</span>
            <span>Processing</span>
        </div>
        <div class="orders-date-payment">
            <div class="orders-transaction-date">
                <span>Transaction Date</span>
                <span>02/11/24</span>
            </div>
        <div class="orders-transaction-payment">
            <span>Payment type</span>
            <span>GCash</span>
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
      orderlistModal.classList.add("active");
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
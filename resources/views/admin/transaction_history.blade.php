@extends('layouts.admin')

@section('content1')
<div class="content">
    <h1 style="margin-bottom: 5px;">Transaction History</h1>
    <span style="margin-left: 7px; font-size: 30px;">February 07 2024</span>
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
        <div class="transcation-container">
            <div class="transaction-detail">
                <iconify-icon icon="material-symbols-light:circle"></iconify-icon>
            </div>
            <div class="transaction-details">
                <span id="transaction-header">Status</span>
                <span>Successful</span>
            </div>
            <div class="transaction-details">
                <span id="transaction-header">Amount</span>
                <span>₱ 50.00</span>
            </div>
            <div class="transaction-details">
                <span id="transaction-header">Date</span>
                <span>4 February 2024</span>
            </div>
            <div class="transaction-details">
                <span id="transaction-header">Transaction ID</span>
                <span>SPC2024-69</span>
            </div>
            <div class="transaction-details open-modal5">
                <span id="transaction-details">Details</span>
            </div>
        </div>
        <div class="transcation-container">
            <div class="transaction-detail">
                <iconify-icon icon="material-symbols-light:circle"></iconify-icon>
            </div>
            <div class="transaction-details">
                <span id="transaction-header">Status</span>
                <span>Successful</span>
            </div>
            <div class="transaction-details">
                <span id="transaction-header">Amount</span>
                <span>₱ 50.00</span>
            </div>
            <div class="transaction-details">
                <span id="transaction-header">Date</span>
                <span>4 February 2024</span>
            </div>
            <div class="transaction-details">
                <span id="transaction-header">Transaction ID</span>
                <span>SPC2024-69</span>
            </div>
            <div class="transaction-details open-modal5">
                <span id="transaction-details">Details</span>
            </div>
        </div>
    </div>

    <!--------- Transaction Details Modal -------->
    <div class="modal_transactions-history">
        <span>Amount</span>
        <div class="transactions-details">
            <span>₱135.00 PHP</span>
            <span>Processing</span>
        </div>
        <div class="transactions-date-payment">
            <div class="transactions-date">
                <span>Transaction Date</span>
                <span>02/11/24</span>
            </div>
            <div class="transactions-payment">
                <span>Payment type</span>
                <span>GCash</span>
            </div>
        </div>
        <div class="close-modal5">
            <iconify-icon icon="uil:step-backward-circle"></iconify-icon>
        </div>
    </div>
</div>
<script>
    const transactionlistModal = document.querySelector(".modal_transactions-history");

    const openModal5Buttons = document.querySelectorAll(".open-modal5");
    openModal5Buttons.forEach((btn) => {
        btn.addEventListener("click", () => {
            transactionlistModal.classList.add("active");
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
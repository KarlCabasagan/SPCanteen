@extends('layouts.admin')

@section('content1')
    <div class="content">
            <h1 style="margin-bottom: 5px;">Order List</h1>
            <span style="margin-left: 7px; font-size: 30px;">February 07 2024</span>
            <div class="add-header-orders">
                <div class="qr-btn">
                    <iconify-icon icon="mdi:line-scan" id="qr-code-scanner"></iconify-icon>
                    <span>QR Scanner</span>
                </div>
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
                    <div class="orders-details">
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
                    <div class="orders-details">
                        <span id="orders-details">Details</span>
                    </div>
                </div>
            </div>  
        </div>
@endsection
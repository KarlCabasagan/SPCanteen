@extends('layouts.admin')

@section('content1')
    <div class="content">
            <h1 style="margin-bottom: 5px;">Transaction History</h1>
            <span style="margin-left: 7px; font-size: 30px;">February 07 2024</span>
            <div class="add-header-orderlist">
                <div class="search-container-orderlist">
                    <form action="" method="GET">
                        <input id="search" type="text" name="search" placeholder="Search...">
                        <button type="submit" class="search-button-orderlist">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="trans-container">
                <div class="header-trans">
                    <span>Status</span>
                    <span>Amount</span>
                    <span>Date</span>
                    <span>Trans. ID</span>
                </div>
                <div class="middle-trans">
                    <div class="trans-info">
                    <div class="trans-dot-container">
                        <iconify-icon icon="mdi:dot" class="trans-dot"></iconify-icon>
                        <span>Successful</span>
                    </div>
                        <span>₱ 135.00</span>
                        <span>February 4 2024</span>
                        <span>SPC2024-69</span>
                    </div>
                    <div class="trans-details-btn">
                        <button>Details</button>
                    </div>
                </div>
            </div>
                     
        </div>
@endsection
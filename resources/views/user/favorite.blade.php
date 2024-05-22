@extends('layouts.user')

@section('content1')
<div class="content">
    <div class="favorites-header">
        <div class="header">
                    <div class="favorites-header-txt">
                      <span id="favorites-header-txt">MY FAVORITE</span>
                    </div>
                    <div class="profile">
                        <div class="user-cart">
                            <a href="cart">
                                <iconify-icon id="cart" icon="uil:cart"></iconify-icon>
                                <span class="quantity">0</span>
                            </a>
                        </div>
                        <div class="user-avatar">
                            <a href="/profile"><img id="profile" src="{{ asset('images/profile/' . Auth::user()->image) }}" alt="Profile Picture"></a>
                        </div>
                    </div>
                </div>
        <div class="search-bar">
            <form action="" class="search-form">
                <input type="text" id="searchInput" placeholder="Search product . . . ." name="search">
                <button id="search-btn" type="submit">
                    <iconify-icon id="search-icon" icon="iconamoon:search-thin"></iconify-icon>
                </button>
            </form>
        </div>
    </div>
    <div class="favorite-products">
        <div class="product-container">
            <div class="product-content">
                <div class="product-image">
                    <button class="show-modal" data-product="">
                        <img id="product-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTV1mn8AmFrmldZhG7Lc_uTy-NbSemRXlv0FwYOpQY-Hg&s" alt="">
                    </button>
                    <button class="favorite-heart-container">
                        <iconify-icon id="favorite-heart-icon" icon="material-symbols:favorite"></iconify-icon>
                    </button>
                </div>
                <div class="products-info">
                    <div class="product-info">
                        <div class="product-time">
                            <iconify-icon id="timer-icon" icon="svg-spinners:clock"></iconify-icon>
                            <span id="product-time">10 mins</span>
                        </div>
                        <div class="product-name-price">
                            <h1 id="product-name">Chicken Burger</h1>
                            <span id="products-price">₱50</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-container">
            <div class="product-content">
                <div class="product-image">
                    <button class="show-modal" data-product="">
                        <img id="product-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTV1mn8AmFrmldZhG7Lc_uTy-NbSemRXlv0FwYOpQY-Hg&s" alt="">
                    </button>
                    <button class="favorite-heart-container">
                        <iconify-icon id="favorite-heart-icon" icon="material-symbols:favorite"></iconify-icon>
                    </button>
                </div>
                <div class="products-info">
                    <div class="product-info">
                        <div class="product-time">
                            <iconify-icon id="timer-icon" icon="svg-spinners:clock"></iconify-icon>
                            <span id="product-time">10 mins</span>
                        </div>
                        <div class="product-name-price">
                            <h1 id="product-name">Chicken Burger</h1>
                            <span id="products-price">₱50</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
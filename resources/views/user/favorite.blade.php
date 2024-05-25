@extends('layouts.user')

@section('content')
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
    @include('layouts.components.user.user_navbar')
    <form class="bottom-sheet" id="bottom-sheet">
        <div class="sheet-overlay"></div>
        <div class="content">
            <div class="header">
                <div class="drag-icon"><span class="header-icon"></span></div>
            </div>
            <div class="body">
                <img id="selling-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTV1mn8AmFrmldZhG7Lc_uTy-NbSemRXlv0FwYOpQY-Hg&s" alt="default">
                <button class="favorite-add-button" id="heart-button">
                    <iconify-icon id="favorite-add-icon" icon="ph:plus"></iconify-icon>
                </button>
                <div class="product-detail">
                    <h2 class="name">No Product</h2>
                    <p class="price">₱0</p>
                </div>
                <div class="modal-btns">
                    <div class="quantity-btns">
                        <button class="quantity-minus" id="quantity-minus">
                            <iconify-icon icon="ph:minus"></iconify-icon>
                        </button>
                        <input type="number" id="input-quantity" min="1" value="1" style="display: none;">
                        <span id="modal-quantity">1</span>
                        <button class="quantity-plus" id="quantity-plus">
                            <iconify-icon icon="ph:plus"></iconify-icon>
                        </button>
                    </div>
                    <button type="submit" class="add-to-cart" id="add-2-cart" data-product="">
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
const showModalBtns = document.querySelectorAll(".show-modal");
const bottomSheet = document.querySelector(".bottom-sheet");
const sheetOverlay = bottomSheet.querySelector(".sheet-overlay");
const sheetContent = bottomSheet.querySelector(".content");
const dragIcon = bottomSheet.querySelector(".drag-icon");

let isDragging = false, startY, startHeight;

const showBottomSheet = () => {
  bottomSheet.classList.add("show");
  document.body.style.overflowY = "hidden";
  updateSheetHeight(50);
};

const updateSheetHeight = (height) => {
  sheetContent.style.height = `${height}vh`;
  bottomSheet.classList.toggle("fullscreen", height === 100);
};

const hideBottomSheet = () => {
  bottomSheet.classList.remove("show");
  document.body.style.overflowY = "auto";
};

const dragStart = (e) => {
  isDragging = true;
  startY = e.pageY || e.touches?.[0].pageY;
  startHeight = parseInt(sheetContent.style.height);
  bottomSheet.classList.add("dragging");
};

const dragging = (e) => {
  if (!isDragging) return;
  const delta = startY - (e.pageY || e.touches?.[0].pageY);
  const newHeight = startHeight + (delta / window.innerHeight) * 100;
  updateSheetHeight(newHeight);
};

const dragStop = () => {
  isDragging = false;
  bottomSheet.classList.remove("dragging");
  const sheetHeight = parseInt(sheetContent.style.height);
  sheetHeight < 25
    ? hideBottomSheet()
    : sheetHeight > 75
    ? updateSheetHeight(100)
    : updateSheetHeight(50);
};

dragIcon.addEventListener("mousedown", dragStart);
document.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
dragIcon.addEventListener("touchstart", dragStart);
document.addEventListener("touchmove", dragging);
document.addEventListener("touchend", dragStop);
sheetOverlay.addEventListener("click", hideBottomSheet);

showModalBtns.forEach((btn) => {
  btn.addEventListener("click", showBottomSheet);
});
</script>
@endsection
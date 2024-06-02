@extends('layouts.layout')

@section('content')
    @auth
        @section('css', 'css/user.css')
        <div class="container">
            <div class="dashboard-header">
                <div class="header">
                    <div class="username">
                        <h2 id="username">Hello {{Auth::user()->name}}!</h2>
                    </div>
                    <div class="profile">
                        <div class="user-cart">
                            <a href="cart">
                                <iconify-icon id="cart" icon="uil:cart"></iconify-icon>
                                <span class="quantity" id="in-cart">0</span>
                            </a>
                        </div>
                        <div class="user-avatar">
                            <a href="/profile"><img id="profile" src="{{ asset('images/profile/' . Auth::user()->image) }}" alt="Profile Picture"></a>
                        </div>
                    </div>
                </div>
                @include('layouts.components.user.categories')
                <div class="search-bar">
                    <form class="search-form" id="search-form">
                        <input type="text" id="searchInput" placeholder="Search product . . . ." name="search">
                        <button id="search-btn" type="submit">
                            <iconify-icon id="search-icon" icon="iconamoon:search-thin"></iconify-icon>
                        </button>
                    </form>
                </div>
                <div class="row-txt">
                    <span id="recommended">Recommended</span>
                    <span id="categories">All</span>
                </div>
                <form class="bottom-sheet" id="bottom-sheet">
                    <div class="sheet-overlay"></div>
                    <div class="content">
                        <div class="header">
                        <div class="drag-icon"><span class="header-icon"></span></div>
                        </div>
                        <div class="body">
                        <img id="selling-image" src="images/product/default.jpg" alt="default">
                        <button class="heart-button" id="heart-button">
                            <iconify-icon id="heart-icon" icon="material-symbols:favorite"></iconify-icon>
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
            <div class="products" id="products">
                @foreach ($products as $product)
                    <div class="product-container">
                        <div class="product-content">
                            <div class="product-image">
                                <button class="show-modal" data-product="{{$product}}"><img id="product-image" src="images/product/{{$product->image}}" alt="{{$product->name}}"></button>
                                <button class="add-cart" id="add-cart" data-product="{{$product}}">
                                  <iconify-icon id="add-icon" icon="ph:plus"></iconify-icon>
                                </button>
                            </div>
                            <div class="products-info">
                                <div class="product-info">
                                    <div class="product-time">
                                        <iconify-icon id="timer-icon" icon="svg-spinners:clock"></iconify-icon>
                                        <span id="product-time">{{$product->time}} mins</span>
                                    </div>
                                    <div class="product-name-price">
                                        <h1 id="product-name">{{$product->name}}</h1>
                                        <span id="products-price">₱{{$product->price}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @include('layouts.components.user.user_navbar') 
        </div>
    @else
        @section('css', 'css/auth.css')
        @section('title', 'SPCanteen - Login')
        <style>
        #splash-screen {
    background-color: white;
    color: #fff;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 9999;
    transition: opacity 3s ease;
}

#content {
    display: none;
}
    </style>
    
    <div id="splash-screen">
    <div class="logo1">
<img class="futuristic-heading" src="/images/SPCanteen.png" alt="SPCanteen.png">
</div>
    </div>
        <div class="content">
        <div class="container">
            <div class="row">
                <div class="login-form">
                    <div class="logo1">
                        <img id="logo" src="/images/SPCanteen.png" alt="SPCanteen.png">
                    </div>
                    <div class="form">
                    @error('name')
                        <p style="color: red; margin-left: 20px; position: absolute;">{{$message}}</p>
                    @enderror
                    @error('password')
                        <p style="color: red; margin-left: 20px; position: absolute;">{{$message}}</p>
                    @enderror
                        <form action="/login" method="POST">
                            @csrf
                            <div class="input-container">
                                <input type="text" name="name" class="input-field" required>
                                <label>Username</label>
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="input-container">
                                <input type="password" name="password" class="input-field" required>
                                <label>Password</label>
                                <i class="fa-solid fa-eye" onclick="togglePassword(this, 'password')"></i>
                            </div>
                            <div class="forgot-password">
                                <a id="forgot-password" href="#">Forgot Password?</a>
                            </div>
                            <div class="login">
                                <input type="submit" class="btn" value="LOGIN">
                            </div>
                        </form>
                        <div class="register">
                            <p id="register-txt">Don't have an account? <a id="register-btn" href="register">Register</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <script>document.addEventListener("DOMContentLoaded", function() {
    // Simulate loading time
    setTimeout(function() {
        // Hide the splash screen gradually
        document.getElementById("splash-screen").style.opacity = 0;

        // Show the content after the splash screen fades out
        setTimeout(function() {
            document.getElementById("content").style.display = "block";
        }, 2000); // Wait for 3 seconds before showing the content

        // After fading out, remove the splash screen from the DOM
        setTimeout(function() {
            document.getElementById("splash-screen").remove();
        }, 3000); // Remove the splash screen after 6 seconds
    }, 1000); // Adjust the timeout as needed (3000ms = 3s)
});
        function switchPage(){
            // Fade out the content
            document.querySelector('.content').classList.add('fade-out');
            // Delay the redirection to see the transition effect
            setTimeout(function() {
                window.location.href = 'login';
            }, 100); // Adjust the timeout as needed (500ms = 0.5s)
        }
    </script>
    @endauth
@endsection
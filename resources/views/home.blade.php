@extends('layouts.layout')

@section('content')
    @auth
        @section('css', 'css/user.css')
        <div class="container">
            <div class="dashboard-header">
                <div class="header">
                    <div class="username">
                        <h2 id="username">Hello Romarc!</h2>
                    </div>
                    <div class="profile">
                        <div class="user-cart">
                            <a href="cart">
                                <iconify-icon id="cart" icon="uil:cart"></iconify-icon>
                                <span class="quantity">0</span>
                            </a>
                        </div>
                        <div class="user-avatar">
                            <img id="profile" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDVnViLbhO-pPdNYHdFv4H_Ljc65gslHL6EbiTAiMGGA&s" alt="Profile Picture">
                        </div>
                    </div>
                </div>
                @include('layouts.components.user.categories')
                <div class="search-bar">
                    <form action="" class="search-form">
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
                <div class="bottom-sheet">
                    <div class="sheet-overlay"></div>
                    <div class="content">
                        <div class="header">
                            <div class="drag-icon"><span class="header-icon"></span></div>
                        </div>
                        <div class="body">
                            <img id="selling-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTV1mn8AmFrmldZhG7Lc_uTy-NbSemRXlv0FwYOpQY-Hg&s" alt="">
                            <div class="heart-icon">
                                <iconify-icon id="heart-icon" icon="material-symbols:favorite"></iconify-icon>
                            </div>
                            <div class="product-detail">
                                <h2 class="name">Chicken Burger</h2>
                                <p class="price">₱50</p>
                            </div>
                            <div class="modal-btns">
                                <div class="quantity-btns">
                                    <div class="quantity-minus">
                                        <iconify-icon icon="ph:minus"></iconify-icon>
                                    </div>
                                    <span>1</span>
                                    <div class="quantity-plus">
                                        <iconify-icon icon="ph:plus"></iconify-icon>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    <button id="add-to-cart">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="products">
                <div class="product-container">
                    <div class="product-content">
                        <div class="product-image">
                            <button class="show-modal"><img id="product-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTV1mn8AmFrmldZhG7Lc_uTy-NbSemRXlv0FwYOpQY-Hg&s" alt=""></button>
                            <div class="add-cart">
                            <iconify-icon id="add-icon" icon="ph:plus"></iconify-icon>
                            </div>
                        </div>
                        <div class="products-info">
                            <div class="product-info">
                                <div class="product-time">
                                    <iconify-icon id="timer-icon" icon="svg-spinners:clock"></iconify-icon>
                                    <span id="product-time">40 mins</span>
                                </div>
                                <div class="product-name">
                                    <h1 id="product-name">Chicken Burger</h1>
                                </div>
                            </div>
                            <div class="product-price">
                                <span id="products-price">₱50</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-container">
                <div class="product-content">
                        <div class="product-image">
                            <button class="show-modal"><img id="product-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTV1mn8AmFrmldZhG7Lc_uTy-NbSemRXlv0FwYOpQY-Hg&s" alt=""></button>
                            <div class="add-cart">
                            <iconify-icon id="add-icon" icon="ph:plus"></iconify-icon>
                            </div>
                        </div>
                        <div class="products-info">
                            <div class="product-info">
                                <div class="product-time">
                                    <iconify-icon id="timer-icon" icon="svg-spinners:clock"></iconify-icon>
                                    <span id="product-time">40 mins</span>
                                </div>
                                <div class="product-name">
                                    <h1 id="product-name">Chicken Burger</h1>
                                </div>
                            </div>
                            <div class="product-price">
                                <span id="products-price">₱50</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-container">
                <div class="product-content">
                        <div class="product-image">
                            <button class="show-modal"><img id="product-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTV1mn8AmFrmldZhG7Lc_uTy-NbSemRXlv0FwYOpQY-Hg&s" alt=""></button>
                            <div class="add-cart">
                            <iconify-icon id="add-icon" icon="ph:plus"></iconify-icon>
                            </div>
                        </div>
                        <div class="products-info">
                            <div class="product-info">
                                <div class="product-time">
                                    <iconify-icon id="timer-icon" icon="svg-spinners:clock"></iconify-icon>
                                    <span id="product-time">40 mins</span>
                                </div>
                                <div class="product-name">
                                    <h1 id="product-name">Chicken Burger</h1>
                                </div>
                            </div>
                            <div class="product-price">
                                <span id="products-price">₱50</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-container">
                <div class="product-content">
                        <div class="product-image">
                            <button class="show-modal"><img id="product-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTV1mn8AmFrmldZhG7Lc_uTy-NbSemRXlv0FwYOpQY-Hg&s" alt=""></button>
                            <div class="add-cart">
                            <iconify-icon id="add-icon" icon="ph:plus"></iconify-icon>
                            </div>
                        </div>
                        <div class="products-info">
                            <div class="product-info">
                                <div class="product-time">
                                    <iconify-icon id="timer-icon" icon="svg-spinners:clock"></iconify-icon>
                                    <span id="product-time">40 mins</span>
                                </div>
                                <div class="product-name">
                                    <h1 id="product-name">Chicken Burger</h1>
                                </div>
                            </div>
                            <div class="product-price">
                                <span id="products-price">₱50</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.components.user.user_navbar') 
        </div>
    @else
        @section('css', 'css/auth.css')
        @section('title', 'SPCanteen - Login')
        <div class="container">
            <div class="row">
                <div class="login-form">
                    <div class="logo1">
                        <img id="logo" src="/images/SPCanteen.png" alt="SPCanteen.png">
                    </div>
                    <div class="form">
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
    @endauth
@endsection
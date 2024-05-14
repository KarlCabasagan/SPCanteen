@extends('layouts.admin')

@section('content1')
    <div class="content">
        <h1>Add Product</h1>
        <div class="add-header">
            <div class="add-product-btn open-modal">
                <i id="add-btn" class="fa-regular fa-square-plus"></i>
                <span id="add-txt">Add Product</span>
            </div>
            <div class="search-container">
                <form action="" method="GET">
                    <input id="search" type="text" name="search" placeholder="Search...">
                    <button type="submit" class="search-button">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="product-list">
            <div class="product">
                <img id="product-img" src="https://www.bitesized.ph/wp-content/uploads/2019/08/7A43D94E-488B-4A9C-B9EE-CA0D047C38E4.jpeg" alt="">
                <div class="label">
                    <h3>hello</h3>
                </div>
            </div>
        </div>
        <!--------- Add Product Modal -------->
        <div class="modal">
            <div class="modal-content">
                <div class="product-name">
                    <label>Product Name</label>
                    <input id="product-name" type="text">
                </div>
                <div class="product-price">
                    <label>Product Price</label>
                    <input id="product-price" type="text">
                </div>
                <div class="product-categories">
                    <label>Select Category</label>
                    <select id="product-categories" name="product" id="product">
                        <option label="Select Category"></option>
                        <option value="breakfast">Breakfast</option>
                        <option value="lunch">Lunch</option>
                        <optionvalue="snack">Snack</option>
                        <option value="beverage">Beverage</option>
                        <option value="dinner">Dinner</option>
                        <option value="dessert">Dessert</option>
                        <option value="healthy">Healthy</option>
                    </select>
                </div>
                <div class="modal-btn">
                    <div class="save-btn">
                        <button id="save" type="submit">Save</button>
                    </div>
                    <div class="close-modal">
                        <button id="close">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
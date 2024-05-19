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
            @foreach ($products as $product)
                <div class="product">
                    <img id="product-img" src="images/product/{{$product->image}}" alt="{{$product->name}}">
                    <div class="label">
                        <h3>{{$product->name}}</h3>
                        <div class="icon-container">
                            <iconify-icon icon="tabler:edit" class="tabler-edit"></iconify-icon>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf 
                                <button type="submit" class="delete-button">
                                    <iconify-icon icon="mdi:trash-outline" class="trash-outline"></iconify-icon>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        <!--------- Add Product Modal -------->
    <div class="modal_product-list">
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
                            <input id="product-name" name="name" type="text" placeholder="Product Name">
                        </div>
                        <div class="product-price">
                            <input id="product-price" name="price" type="text" placeholder="₱ 0.00">
                        </div>
                        <div class="product-time">
                            <input id="product-time" name="time" type="text" placeholder="Time">
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
                    <div class="close-modal">
                        <iconify-icon id="close" icon="material-symbols-light:close"></iconify-icon>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@extends('layouts.admin')

<script src="https://cdn.jsdelivr.net/npm/fuse.js@6"></script>
@section('content1')
<div class="content">
    <h1>Product List</h1>
    <div class="add-header">
        <button class="add-product-btn open-modal1">
            <i id="add-btn" class="fa-regular fa-square-plus"></i>
            <span id="add-txt">Add Product</span>
        </button>
        <div class="search-container">
            <input id="search" type="text" name="search" placeholder="Search...">
            <button type="submit" class="search-button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
    <div id="product-data" data-products='@json($products)'></div>
    <div class="product-list">
        @foreach ($products as $product)
        <div class="product" data-product-id="{{$product->id}}">
            <img id="product-img" src="images/product/{{$product->image}}" alt="{{$product->name}}">
            <div class="label">
                <h3>{{$product->name}}</h3>
                <div class="icon-container">
                    <div class="edit-delete-btns">
                        <div class="edit-button">
                    <button class="open-modal2" data-product-id="{{$product->id}}">
                        <iconify-icon icon="tabler:edit" class="tabler-edit"></iconify-icon>
                    </button>
                    </div>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="delete-button">
                            <iconify-icon icon="mdi:trash-outline" class="trash-outline"></iconify-icon>
                        </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!--------- Add Product Modal -------->
    <div class="modal_product-list">
        <form action="/addproduct" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-container-add">
                <input type="file" id="image" name="image" accept="image/*" onchange="previewProductImage(this);"
                    style="display: none;">
                <div class="modal-icon">
                    <div class="img-box-fill">
                        <img id="img-box-fill" src="images/product/default.jpg">
                    </div>
                    <label for="image">
                        <div class="add-icon">
                            <span>Insert Image</span>
                        </div>
                    </label>
                </div>
                <div class="modal-content">
                    <div class="product-info">
                        <div class="product-name">
                            <input id="product-name" name="name" type="text" placeholder="Product Name" style="text-align: center;" required>
                        </div>
                        <div class="product-price">
                            <input id="product-price" name="price" type="text" placeholder="₱ 0.00" style="text-align: center;" required>
                        </div>
                        <div class="product-time">
                            <input id="product-time" name="time" type="text" placeholder="Estimated Time (In Minutes)" style="text-align: center;" required>
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
                    <div class="close-modal1">
                        <iconify-icon id="close" icon="material-symbols-light:close"></iconify-icon>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!--------- Edit Product Modal -------->
    <div class="modal_edit-list">
        <form action="/addproduct" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-container-edit">
                <input type="file" id="images" name="images" accept="image/*" onchange="previewProductImageEdit(this);"
                    style="display: none;">
                <div class="modal-icon">
                    <div class="img-box-fill-edit">
                        <img id="img-box-fill-edit" src="images/product/default.jpg">
                    </div>
                    <label for="images">
                        <div class="add-icon">
                            <span>Change Image</span>
                        </div>
                    </label>
                </div>
                <div class="modal-content">
                    <div class="product-info">
                        <div class="product-name">
                            <input id="product-name" name="name" type="text" placeholder="Product Name" style="text-align: center;">
                        </div>
                        <div class="product-price">
                            <input id="product-price" name="price" type="text" placeholder="₱ 0.00" style="text-align: center;">
                        </div>
                        <div class="product-time">
                            <input id="product-time" name="time" type="text" placeholder="Estimated Time (In Minutes)" style="text-align: center;">
                        </div>
                        <div class="product-availablity">
                            <div class="available">
                                <input name="availability" type="radio" class="availability-btn">
                                <label>Available</label>
                            </div>
                            <div class="not-available">
                                <input name="availability" type="radio" class="availability-btn">
                                <label>Not Available</label>
                            </div>
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
                    <div class="close-modal2">
                        <iconify-icon id="close" icon="material-symbols-light:close"></iconify-icon>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
  const openModal1 = document.querySelector(".open-modal1");
  const closeModal1 = document.querySelector(".close-modal1");
  const productlistModal = document.querySelector(".modal_product-list");
  const editlistModal = document.querySelector(".modal_edit-list");
  const editForm = editlistModal.querySelector("form");

  if (openModal1 && closeModal1 && productlistModal) {
    openModal1.addEventListener("click", () => {
        productlistModal.classList.add("active");
    });

    closeModal1.addEventListener("click", () => {
      productlistModal.classList.remove("active");
    });
  }

  const openModal2Buttons = document.querySelectorAll(".open-modal2");
  openModal2Buttons.forEach((btn) => {
    btn.addEventListener("click", async (event) => {
        event.preventDefault();
        
        const productId = btn.dataset.productId;

        const response = await fetch(`/products/${productId}`);
        const productData = await response.json();

        editForm.querySelector("#product-name").value = productData.name;
        editForm.querySelector("#product-price").value = productData.price;
        editForm.querySelector("#product-time").value = productData.time;
        editForm.querySelector("#product-categories").value = productData.category_id;
        document.getElementById("img-box-fill-edit").src = `images/product/${productData.image}`;

        editForm.action = `/products/edit/${productId}`;

        editlistModal.classList.add("active");

    });
  });

  const closeModal2 = document.querySelector(".close-modal2");
  if (closeModal2) {
    closeModal2.addEventListener("click", () => {
        editlistModal.classList.remove("active");
    });
  }
});

function previewProductImage(input) {
  if (input.files && input.files[0]) {
    const reader = new FileReader();

    reader.onload = function(e) {
      document.getElementById('img-box-fill').src = e.target.result;
    }

    reader.readAsDataURL(input.files[0]);
  }
}

function previewProductImageEdit(input) {
  if (input.files && input.files[0]) {
    const reader = new FileReader();

    reader.onload = function(e) {
      document.getElementById('img-box-fill-edit').src = e.target.result;
    }

    reader.readAsDataURL(input.files[0]);
  }
}

const productDataElement = document.getElementById('product-data');
const products = JSON.parse(productDataElement.getAttribute('data-products')).map(product => ({
    id: product.id,
    name: product.name,
}));

const options = {
    keys: ['id', 'name'],
    threshold: 0.4
};

const fuse = new Fuse(products, options);

const displayResults = (results) => {
    const containers = document.querySelectorAll('.product');
    containers.forEach(container => container.style.display = 'none');

    results.forEach(result => {
        const container = document.querySelector(`.product[data-product-id="${result.item.id}"]`);
        // console.log(result.item);
        if (container) {
            container.style.display = '';
        }
    });
};

const displayAllResults = () => {
    const containers = document.querySelectorAll('.product');
    containers.forEach(container => container.style.display = '');
};

document.getElementById('search').addEventListener('input', (e) => {
    const query = e.target.value;
    console.log();
    if (query.trim() === '') {
        displayAllResults();
    } else {
        const results = fuse.search(query);
        // console.log(results);
        displayResults(results);
    }
});

displayAllResults();

document.getElementById('search').addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
        e.target.blur();
    }
});
</script>
@endsection
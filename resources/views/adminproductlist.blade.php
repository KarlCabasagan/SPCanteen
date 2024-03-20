<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin Product list</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/adminproductlist.css">
    <link rel="stylesheet" href="/css/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/assets/css/bs-theme-overrides.css">
    <link rel="stylesheet" href="/css/assets/css/styles.css">
    <link rel="stylesheet" href="{{asset('/fontawesome-free-6.5.1-web/css/all.min.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>
    <div class="container-fluid d-flex flex-column-reverse justify-content-xl-start"
        style="height: 100vh;margin: 0;padding: 0;background: #e5e4e2;">
        <div class="top-text">Product List</div>
        <div class="text-nowrap d-flex flex-column justify-content-start align-items-center align-items-xl-center"
            style="height: 100vh;width: 18rem;color: var(--bs-body-color);background: var(--bs-body-bg);padding-top: initial;position: fixed;">
            <img src="/css/assets/img/423472445_7120341421354585_5211962867841594211_n.png" width="276"
                height="186" style="padding-top: 0;margin-top: 40px;">
            <nav class="d-flex flex-column" id="text-column">
                <a href="#"><i class="fa-brands fa-windows"></i>Dashboard</a>
                <a href="#"><i class="fa-solid fa-book"></i>Product List</a>
                <a href="#"><i class="fa-regular fa-file"></i>Transaction History</a>
                <a href="#"><i class="fa-solid fa-qrcode"></i>Order Scanner</a>
                <a href="#"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
            </nav>
        </div>

        <button class="add-product-button">
            <i class="fa-solid fa-plus"></i>Add Product
        </button>

        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search...">
            <div class="search-icon-container">
                <i class="fa-solid fa-magnifying-glass" id="searchIcon"></i>
            </div>
        </div>

        <div class="product-container">
            <div class="product-list">
                <img src="/css/assets/img/burger.png" alt="burger">
                <h2>CHICKEN BURGER</h2>
            </div>

            <div class="product-list">
                <img src="/css/assets/img/burger.png" alt="burger">
                <h2>BEEF BURGER</h2>
            </div>

            <div class="product-list">
                <img src="/css/assets/img/burger.png" alt="burger">
                <h2>CHAMPORADO BURGER</h2>
            </div>

            <div class="product-list">
                <img src="/css/assets/img/burger.png" alt="burger">
                <h2>AHUS BURGER</h2>
            </div>
        </div>

        <p2>SPC CANTEEN</p2>
        <p>© 2024 All Rights Reserved</p>
    </div>

    <script>
        document.getElementById('searchIcon').addEventListener('click', function () {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const productTitles = document.querySelectorAll('.product-list h2');

            productTitles.forEach(title => {
                const productName = title.textContent.toLowerCase();
                if (productName.includes(searchTerm)) {
                    title.style.backgroundColor = 'yellow';
                } else {
                    title.style.backgroundColor = '';
                }
            });
        });
    </script>
</body>

</html>

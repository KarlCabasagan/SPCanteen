<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Search</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <input type="text" id="searchInput" placeholder="Search...">

    <i id="searchIcon" class="fa-solid fa-magnifying-glass" style="cursor: pointer;"></i>

    <div id="productList">
        <div class="product-item">
            <span>Name: Apple</span>
        </div>
        <div class="product-item">
            <span>Name: Banana</span>
        </div>
        <div class="product-item">
            <span>Name: Orange</span>
        </div>
    </div>

    <script>
        document.getElementById('searchIcon').addEventListener('click', function() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const productItems = document.querySelectorAll('.product-item');

            productItems.forEach(item => {
                const productName = item.querySelector('span').textContent.toLowerCase();
                if (productName.includes(searchTerm)) {
                    item.style.backgroundColor = 'yellow';
                } else {
                    item.style.backgroundColor = ''; 
                }
            });
        });
    </script>
</body>

</html>

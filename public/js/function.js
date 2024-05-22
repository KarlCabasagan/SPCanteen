/* Show and Hide Password */

function togglePassword(icon, inputId) {
    var input = document.getElementsByName(inputId)[0];
    if (input.type === "password") {
      input.type = "text";
      icon.className = "fa-solid fa-eye-slash";
    } else {
      input.type = "password";
      icon.className = "fa-solid fa-eye";
  }
}

/* Profile Picture (Need pa e fix) */

function previewProfilePicture(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          document.getElementById('avatar').src = e.target.result;
      }

      reader.readAsDataURL(input.files[0]);
  }
}

/* Admin-Modal */

document.addEventListener("DOMContentLoaded", function() {
  const openModal = document.querySelector(".open-modal");
  const closeModal = document.querySelector(".close-modal");
  const productlistModal = document.querySelector(".modal_product-list");

  if (openModal && closeModal && productlistModal) {
    openModal.addEventListener("click", () => {
      productlistModal.classList.add("active");
    });

    closeModal.addEventListener("click", () => {
      productlistModal.classList.remove("active");
    });
  }
});

/* Admin-Modal */

document.addEventListener("DOMContentLoaded", function() {
  const openModal = document.querySelector(".open-modal");
  const closeModal = document.querySelector(".close-modal");
  const productlistModal = document.querySelector(".modal_product-list");

  if (openModal && closeModal && productlistModal) {
    openModal.addEventListener("click", () => {
      productlistModal.classList.add("active");
    });

    closeModal.addEventListener("click", () => {
      productlistModal.classList.remove("active");
    });
  }
});

function previewProductImage(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          document.getElementById('img-box-fill').src = e.target.result;
      }

      reader.readAsDataURL(input.files[0]);
  }
}

 /* Add To Cart */

 /* Bottom Sheet Modal */

 document.addEventListener("DOMContentLoaded", function() {
  const showModalBtns = document.querySelectorAll(".show-modal");
  const bottomSheet = document.querySelector(".bottom-sheet");
  const sheetOverlay = bottomSheet.querySelector(".sheet-overlay");
  const sheetContent = bottomSheet.querySelector(".content");
  const dragIcon = bottomSheet.querySelector(".drag-icon");

  let currentQuantity = 1;
  let productId = undefined;
  let Favorite = false;

  let isDragging = false, startY, startHeight;
  
  const showBottomSheet = () => {
    bottomSheet.classList.add("show");
    document.body.style.overflowY = "hidden";
    updateSheetHeight(50);
    minusButtonColor(currentQuantity);
  }
  
  const updateSheetHeight = (height) => {
    sheetContent.style.height = `${height}vh`;
    bottomSheet.classList.toggle("fullscreen", height === 100);
  }
  
  const hideBottomSheet = () => {
    bottomSheet.classList.remove("show");
    document.body.style.overflowY = "auto";
    document.getElementById("modal-quantity").innerHTML = 1;
    currentQuantity = 1;
    productId = undefined;
  }
  
  const dragStart = (e) => {
    isDragging = true;
    startY = e.pageY || e.touches?.[0].pageY;
    startHeight = parseInt(sheetContent.style.height);
    bottomSheet.classList.add("dragging");
  }
  
  const dragging = (e) => {
    if(!isDragging) return;
    const delta = startY - (e.pageY || e.touches?.[0].pageY);
    const newHeight = startHeight + delta / window.innerHeight * 100;
    updateSheetHeight(newHeight);
  }
  
  const dragStop = () => {
    isDragging = false;
    bottomSheet.classList.remove("dragging");
    const sheetHeight = parseInt(sheetContent.style.height);
    sheetHeight < 25 ? hideBottomSheet() : sheetHeight > 75 ? updateSheetHeight(100) : updateSheetHeight(50);
  }
  
  dragIcon.addEventListener("mousedown", dragStart);
  document.addEventListener("mousemove", dragging);
  document.addEventListener("mouseup", dragStop);
  dragIcon.addEventListener("touchstart", dragStart);
  document.addEventListener("touchmove", dragging);
  document.addEventListener("touchend", dragStop);
  sheetOverlay.addEventListener("click", hideBottomSheet);
  
  showModalBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        const product = JSON.parse(btn.dataset.product);

        document.getElementById("selling-image").src = "images/product/" + product.image;
        document.getElementById("heart-icon").classList.remove("active");
        document.querySelector(".name").textContent = product.name;
        document.querySelector(".price").textContent = "₱" + product.price;
        document.getElementById("modal-quantity").innerHTML = 1;
        productId = product.id;

        showBottomSheet();
    });
  });

  //quantity Plus and Minus Function
  const minusButton = document.getElementById("quantity-minus");
  const addButton = document.getElementById("quantity-plus");
  const quantitySpan = document.getElementById("modal-quantity");

  currentQuantity = parseInt(quantitySpan.textContent, 10);

  function minusButtonColor(currentQuantity) {
    if (currentQuantity > 1) {
      minusButton.style.backgroundColor = "maroon";
      minusButton.style.cursor = "pointer";
    } else {
      minusButton.style.backgroundColor = "#D3D3D3";
      minusButton.style.cursor = "default";
    }
  }

  function updateInputQuanity(currentQuantity) {
    const quantityInput = document.getElementById("input-quantity");
    quantityInput.value = currentQuantity;

    const newQuantity = quantityInput.value;
  }

  minusButtonColor(currentQuantity);
  addButton.addEventListener('click', function(e) {
    e.preventDefault(e);
    currentQuantity++;
    quantitySpan.textContent = currentQuantity;
    minusButtonColor(currentQuantity);
    updateInputQuanity(currentQuantity)
  });

  minusButton.addEventListener('click', function(e) {
    e.preventDefault();
    if (currentQuantity > 1) {
      currentQuantity--;
      quantitySpan.textContent = currentQuantity;
      minusButtonColor(currentQuantity);
      updateInputQuanity(currentQuantity)
    }
  });

  //Update header quantity(Inside cart Icon)
  function updateInCart(value) {
    document.getElementById("in-cart").innerHTML = value;
  }

  //Show header quantity(Inside cart Icon)
  fetch(`/cart/show/product/inside`)
    .then(response => response.json())
    .then(data => {
      updateInCart(data);
    })
    .catch(error => {
      console.error('Error:', error);
    });


  //Add to cart function
  const addCartButton = document.getElementById("add-2-cart");
  addCartButton.addEventListener("click", (e) => {
    e.preventDefault();

    fetch(`/cart/store/product/${productId}?quantity=${currentQuantity}`)
    .then(response => response.json())
    .then(data => {

      fetch(`/cart/show/product/inside`)
      .then(response => response.json())
      .then(data => {
        updateInCart(data);
      })
      .catch(error => {
        console.error('Error:', error);
      });

      hideBottomSheet();
    })
    .catch(error => {
      console.error('Error:', error);
    });
  });

  //Favorite
  function modifyFavButton() {
    
  }

});


// User Category
document.addEventListener("DOMContentLoaded", function() {
  const categoryLinks = document.querySelectorAll('.category a');
  const productsContainer = document.getElementById('products');

  categoryLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();

      const categoryId = this.dataset.categoryId;

      fetch(`/products/category/${categoryId}`)
        .then(response => response.json())
        .then(data => {
          productsContainer.innerHTML = ""; 

          data.forEach(product => {
          const productContainer = document.createElement('div');
          productContainer.classList.add('product-container');

          const productContent = document.createElement('div');
          productContent.classList.add('product-content');

          const productImage = document.createElement('div');
          productImage.classList.add('product-image');

          const showModalButton = document.createElement('button');
          showModalButton.classList.add('show-modal');
          showModalButton.dataset.product = JSON.stringify(product);

          const productImageElement = document.createElement('img');
          productImageElement.id = 'product-image';
          productImageElement.src = `images/product/${product.image}`;
          productImageElement.alt = product.name;

          showModalButton.appendChild(productImageElement);

          const addCart = document.createElement('button');
          addCart.classList.add('add-cart');

          const addIcon = document.createElement('iconify-icon');
          addIcon.id = 'add-icon';
          addIcon.icon = 'ph:plus';

          addCart.appendChild(addIcon);

          productImage.appendChild(showModalButton);
          productImage.appendChild(addCart);

          const productsInfo = document.createElement('div');
          productsInfo.classList.add('products-info');

          const productInfo = document.createElement('div');
          productInfo.classList.add('product-info');

          const productTime = document.createElement('div');
          productTime.classList.add('product-time');

          const timerIcon = document.createElement('iconify-icon');
          timerIcon.id = 'timer-icon';
          timerIcon.icon = 'svg-spinners:clock';

          const productTimeElement = document.createElement('span');
          productTimeElement.id = 'product-time';
          productTimeElement.textContent = `${product.time} mins`;

          productTime.appendChild(timerIcon);
          productTime.appendChild(productTimeElement);

          const productNamePrice = document.createElement('div');
          productNamePrice.classList.add('product-name-price');

          const productNameElement = document.createElement('h1');
          productNameElement.id = 'product-name';
          productNameElement.textContent = product.name;

          productNamePrice.appendChild(productNameElement);
          
          const productPriceElement = document.createElement('span');
          productPriceElement.id = 'products-price';
          productPriceElement.textContent = `₱${product.price}`;

          productNamePrice.appendChild(productPriceElement);

          productInfo.appendChild(productTime);
          productInfo.appendChild(productNamePrice);
          
          // const productPrice = document.createElement('div');
          // productPrice.classList.add('product-price');

          

          productsInfo.appendChild(productInfo);
          // productsInfo.appendChild(productPrice);

          productContent.appendChild(productImage);
          productContent.appendChild(productsInfo);

          productContainer.appendChild(productContent);
          productsContainer.appendChild(productContainer);
        });
        
        const showModalBtns = document.querySelectorAll(".show-modal");
        const bottomSheet = document.querySelector(".bottom-sheet");
        const sheetOverlay = bottomSheet.querySelector(".sheet-overlay");
        const sheetContent = bottomSheet.querySelector(".content");
        const dragIcon = bottomSheet.querySelector(".drag-icon");

        let currentQuantity = 1;
        let productId = undefined;

        let isDragging = false, startY, startHeight;
        
        const showBottomSheet = () => {
          bottomSheet.classList.add("show");
          document.body.style.overflowY = "hidden";
          updateSheetHeight(50);
          minusButtonColor(currentQuantity);
        }
        
        const updateSheetHeight = (height) => {
          sheetContent.style.height = `${height}vh`;
          bottomSheet.classList.toggle("fullscreen", height === 100);
        }
        
        const hideBottomSheet = () => {
          bottomSheet.classList.remove("show");
          document.body.style.overflowY = "auto";
          document.getElementById("modal-quantity").innerHTML = 1;
          currentQuantity = 1;
          productId = undefined;
        }
        
        const dragStart = (e) => {
          isDragging = true;
          startY = e.pageY || e.touches?.[0].pageY;
          startHeight = parseInt(sheetContent.style.height);
          bottomSheet.classList.add("dragging");
        }
        
        const dragging = (e) => {
          if(!isDragging) return;
          const delta = startY - (e.pageY || e.touches?.[0].pageY);
          const newHeight = startHeight + delta / window.innerHeight * 100;
          updateSheetHeight(newHeight);
        }
        
        const dragStop = () => {
          isDragging = false;
          bottomSheet.classList.remove("dragging");
          const sheetHeight = parseInt(sheetContent.style.height);
          sheetHeight < 25 ? hideBottomSheet() : sheetHeight > 75 ? updateSheetHeight(100) : updateSheetHeight(50);
        }
        
        dragIcon.addEventListener("mousedown", dragStart);
        document.addEventListener("mousemove", dragging);
        document.addEventListener("mouseup", dragStop);
        dragIcon.addEventListener("touchstart", dragStart);
        document.addEventListener("touchmove", dragging);
        document.addEventListener("touchend", dragStop);
        sheetOverlay.addEventListener("click", hideBottomSheet);
        
        showModalBtns.forEach(btn => {
          btn.addEventListener("click", () => {
              const product = JSON.parse(btn.dataset.product);

              document.getElementById("selling-image").src = "images/product/" + product.image;
              document.getElementById("heart-icon").classList.remove("active");
              document.querySelector(".name").textContent = product.name;
              document.querySelector(".price").textContent = "₱" + product.price;
              document.getElementById("modal-quantity").innerHTML = 1;
              productId = product.id;

              showBottomSheet();
          });
        });

        //quantity Plus and Minus Function
        const minusButton = document.getElementById("quantity-minus");
        const addButton = document.getElementById("quantity-plus");
        const quantitySpan = document.getElementById("modal-quantity");

        currentQuantity = parseInt(quantitySpan.textContent, 10);

        function minusButtonColor(currentQuantity) {
          if (currentQuantity > 1) {
            minusButton.style.backgroundColor = "maroon";
            minusButton.style.cursor = "pointer";
          } else {
            minusButton.style.backgroundColor = "#D3D3D3";
            minusButton.style.cursor = "default";
          }
        }

        function updateInputQuanity(currentQuantity) {
          const quantityInput = document.getElementById("input-quantity");
          quantityInput.value = currentQuantity;

          const newQuantity = quantityInput.value;
        }

        minusButtonColor(currentQuantity);
        addButton.addEventListener('click', function(e) {
          e.preventDefault(e);
          currentQuantity++;
          quantitySpan.textContent = currentQuantity;
          minusButtonColor(currentQuantity);
          updateInputQuanity(currentQuantity)
        });

        minusButton.addEventListener('click', function(e) {
          e.preventDefault();
          if (currentQuantity > 1) {
            currentQuantity--;
            quantitySpan.textContent = currentQuantity;
            minusButtonColor(currentQuantity);
            updateInputQuanity(currentQuantity)
          }
        });

        //Update header quantity(Inside cart Icon)
        function updateInCart(value) {
          document.getElementById("in-cart").innerHTML = value;
        }

        //Show header quantity(Inside cart Icon)
        fetch(`/cart/show/product/inside`)
          .then(response => response.json())
          .then(data => {
            updateInCart(data);
          })
          .catch(error => {
            console.error('Error:', error);
          });


        //Add to cart function
        const addCartButton = document.getElementById("add-2-cart");
        addCartButton.addEventListener("click", (e) => {
          e.preventDefault();

          fetch(`/cart/store/product/${productId}?quantity=${currentQuantity}`)
          .then(response => response.json())
          .then(data => {
            
            fetch(`/cart/show/product/inside`)
            .then(response => response.json())
            .then(data => {
              updateInCart(data);
            })
            .catch(error => {
              console.error('Error:', error);
            });

            hideBottomSheet();
          })
          .catch(error => {
            console.error('Error:', error);
          });
        });

      })
      .catch(error => {
        console.error('Error:', error);
      });
    });
  });
});
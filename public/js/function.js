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
  const modal = document.querySelector(".modal");

  if (openModal && closeModal && modal) {
    openModal.addEventListener("click", () => {
      modal.classList.add("active");
    });

    closeModal.addEventListener("click", () => {
      modal.classList.remove("active");
    });
  }
});

 /* Bottom Sheet Modal */
 document.addEventListener("DOMContentLoaded", function() {
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
  }
  
  const updateSheetHeight = (height) => {
    sheetContent.style.height = `${height}vh`;
    bottomSheet.classList.toggle("fullscreen", height === 100);
  }
  
  const hideBottomSheet = () => {
    bottomSheet.classList.remove("show");
    document.body.style.overflowY = "auto";
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
    btn.addEventListener("click", showBottomSheet);
  });  
});
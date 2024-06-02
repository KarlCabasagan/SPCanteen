<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Intro</title>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Inter&display=swap");
    body {
      margin: 0;
      padding: 0;
      font-family: "Inter";
    }

    .onboarding-carousel {
      display: flex;
      overflow-x: auto;
      scroll-snap-type: x mandatory;
      scroll-behavior: smooth;
      -webkit-overflow-scrolling: touch;
      height: 100vh;
      width: 100vw;
    }

    .onboarding-carousel::-webkit-scrollbar {
      display: none;
    }

    .onboarding-slide {
      flex: 0 0 84%;
      scroll-snap-align: start;
      padding: 2rem;
      text-align: center;
      color: white;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .onboarding-slide h2 {
      font-size: 2rem;
      margin-bottom: 1rem;
    }

    .onboarding-slide p {
      font-size: 1rem;
      margin-bottom: 2rem;
    }

    .onboarding-slide button {
      background-color: white;
      color: #333;
      padding: 0.8rem 1.6rem;
      border: none;
      border-radius: 0.5rem;
      font-size: 1rem;
      cursor: pointer;
    }

    .slider {
      display: none;
    }

    .dots {
      text-align: center;
      margin-top: 10px;
    }

    .dots label {
      display: inline-block;
      width: 10px;
      height: 10px;
      background-color: #FFFFFF;
      border-radius: 50%;
      margin: 0 5px;
      cursor: pointer;
    }

    .dots label.active {
      background-color: maroon;
    }

  </style>
</head>
<body>
<div class="onboarding-carousel">
  <div class="onboarding-slide" style="background-color: #ADD8E6;">
    <img src="login.png" style="width: 300px; margin-top: 180px;">
    <span style="color: black; font-size: 22px;">Welcome to <b style="color: maroon;">SPCanteen</b></span>
    <span style="color: gray; font-size: 17px; opacity: 1; margin-top: 8px;">Create and Setup <br> your account.</span>
  </div>

  <div class="onboarding-slide" style="background-color: #ADD8E6;">
    <img src="time.png" style="width: 300px; margin-top: 180px;">
    <span style="color: black; font-size: 22px;">Save Time</span>
    <span style="color: gray; font-size: 17px; opacity: 1; margin-top: 8px;">You can order anytime <br> inside the campus.</span>
  </div>

  <div class="onboarding-slide" style="background-color: #ADD8E6;">
    <img src="qrcode.png" style="width: 300px; margin-top: 180px;">
    <span style="color: black; font-size: 22px;">QR Code</span>
    <span style="color: gray; font-size: 17px; opacity: 1; margin-top: 8px;">You will get a QR Code <br> when your order has been prepared.</span>
  </div>

  <div class="onboarding-slide" style="background-color: #ADD8E6;">
    <img src="coffee.png" style="width: 300px; margin-top: 180px;">
    <span style="color: black; font-size: 22px;">QR Scanner</span>
    <span style="color: gray; font-size: 17px; opacity: 1; margin-top: 8px;">You can user your QR Code <br> to get your order in the canteen.</span>
  </div>

  <div style="width: 100%; position: absolute; margin-top: 640px;">
    <div class="slider">
      <input type="radio" name="slide" id="img1" checked>
      <input type="radio" name="slide" id="img2">
      <input type="radio" name="slide" id="img3">
      <input type="radio" name="slide" id="img4">
    </div>
    
    <div class="dots">
      <label for="img1" class="active"></label>
      <label for="img2"></label>
      <label for="img3"></label>
      <label for="img4"></label>
    </div>
  </div>

  <div style="position: absolute; width: 100%; display: flex; justify-content: center; margin-top: 750px;">
    <button type="button" onclick="switchPage()" style="background-color: maroon; color: #FFFFFF; font-size: 18px; border: none; padding: 20px 130px 20px 130px; border-radius: 50px;">Get Started</button>

  </div>

</div>

<script>
  const slides = document.querySelectorAll('.onboarding-slide');
  const dots = document.querySelectorAll('.dots label');

  let currentSlide = 0;

  function showSlide(index) {
    slides.forEach((slide, i) => {
      if (i === index) {
        slide.style.display = 'block';
      } else {
        slide.style.display = 'none';
      }
    });
  }

  function updateDots(index) {
    dots.forEach((dot, i) => {
      if (i === index) {
        dot.classList.add('active');
      } else {
        dot.classList.remove('active');
      }
    });
  }

  function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
    updateDots(currentSlide);
  }

  function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
    updateDots(currentSlide);
  }

  document.querySelector('.slider').addEventListener('click', (event) => {
    if (event.target.type === 'radio') {
      const index = Array.from(event.target.parentNode.children).indexOf(event.target);
      currentSlide = index;
      showSlide(currentSlide);
      updateDots(currentSlide);
    }
  });

  document.querySelector('.onboarding-carousel').addEventListener('scroll', () => {
    const index = Math.round(document.querySelector('.onboarding-carousel').scrollLeft / window.innerWidth);
    currentSlide = index;
    updateDots(currentSlide);
  });

  function switchPage(){
            setTimeout(function() {
                window.location.href = 'splash.html';
            }, 100); // Adjust the timeout as needed (500ms = 0.5s)
        }
</script>
</body>
</html>
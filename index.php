<?php
// index.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Okta Surya Arif - Home</title>
  <link rel="icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/id/f/ff/Logo_UnivLampung.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <!-- Loader Script -->
  <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/infinity.js"></script>
  <style>
    /* Loader Styling */
    #loader {
      position: fixed; top: 0; left: 0;
      width: 100%; height: 100%;
      background: #fff;
      display: flex; align-items: center; justify-content: center;
      z-index: 9999;
    }
    /* Reset & Basic */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: Arial, sans-serif; transition: background-color 0.3s, color 0.3s; }
    body.light-mode { background: #f5f5f5; color: #333; }
    body.dark-mode { background: #121212; color: #eee; }
    /* Navbar */
    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 30px;
      background: #222;
      color: #fff;
      position: fixed;
      top: 0; left: 0; width: 100%;
      z-index: 1000;
    }
    .navbar .logo {
      display: flex;
      align-items: center;
    }
    .navbar .logo img { height: 40px; margin-right: 10px; }
    .navbar ul {
      display: flex;
      margin: 0 auto;
      list-style: none;
    }
    .navbar ul li {
      margin: 0 10px;
      padding: 0 10px;
      border-right: 1px solid rgba(255,255,255,0.3);
    }
    .navbar ul li:last-child { border-right: none; }
    .navbar ul li a {
      color: #fff;
      text-decoration: none;
      font-size: 16px;
      padding: 5px 10px;
    }
    .navbar ul li a.active {
      color: #007BFF;
      font-weight: bold;
    }
    #theme-toggle {
      background: none; border: none;
      color: #fff; font-size: 18px;
      cursor: pointer;
    }
    .clock { color: #fff; font-size: 14px; margin-left: 20px; }
    /* Slider */
    .slider {
      position: relative;
      width: 100%;
      height: 80vh;
      margin-top: 70px; /* space for navbar */
      overflow: hidden;
      transition: transform 0.3s ease-in-out;
    }
    .slider img {
      position: absolute;
      width: 100%;
      height: 80vh;
      object-fit: cover;
      opacity: 0;
      transition: opacity 1s ease-in-out;
    }
    .slider img.active { opacity: 1; }
    .slide-caption {
      position: absolute;
      bottom: 20%;
      left: 50%;
      transform: translateX(-50%);
      background: rgba(0,0,0,0.5);
      padding: 20px 40px;
      border-radius: 8px;
      color: #fff;
      text-align: center;
    }
    .slide-caption h1 { font-size: 48px; margin-bottom: 10px; }
    .slide-caption p { font-size: 20px; }
    /* Zoom Controls */
    .zoom-controls {
      position: absolute;
      top: 20px;
      right: 20px;
    }
    .zoom-controls button {
      background: rgba(0,0,0,0.5);
      border: none;
      color: #fff;
      font-size: 18px;
      padding: 8px 12px;
      margin-left: 5px;
      cursor: pointer;
      border-radius: 4px;
    }
    /* Responsive */
    @media (max-width: 768px) {
      .navbar ul li a { font-size: 14px; }
      .slide-caption h1 { font-size: 32px; }
      .slide-caption p { font-size: 16px; }
    }
  </style>
  <script>
    // Toggle Tema
    function toggleTheme() {
      const body = document.body;
      if(body.classList.contains('dark-mode')) {
         body.classList.remove('dark-mode');
         body.classList.add('light-mode');
         localStorage.setItem('theme', 'light');
         document.getElementById('theme-toggle').innerHTML = '<i class="fas fa-moon"></i>';
      } else {
         body.classList.remove('light-mode');
         body.classList.add('dark-mode');
         localStorage.setItem('theme', 'dark');
         document.getElementById('theme-toggle').innerHTML = '<i class="fas fa-sun"></i>';
      }
    }
    // Real-time Clock
    function updateClock() {
      const now = new Date();
      const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      const dateStr = now.toLocaleDateString('id-ID', options);
      const timeStr = now.toLocaleTimeString('id-ID');
      document.getElementById('clock').textContent = dateStr + ' ' + timeStr;
    }
    setInterval(updateClock, 1000);
    // Slider Functionality
    let currentSlide = 0;
    function showSlide(index) {
      const slides = document.querySelectorAll('.slider img');
      if(index >= slides.length) { currentSlide = 0; }
      else if(index < 0) { currentSlide = slides.length - 1; }
      else { currentSlide = index; }
      slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === currentSlide);
      });
    }
    function nextSlide() { showSlide(currentSlide + 1); }
    // Zoom Functionality
    let sliderScale = 1;
    function zoomIn() {
      sliderScale += 0.1;
      document.querySelector('.slider').style.transform = 'scale(' + sliderScale + ')';
    }
    function zoomOut() {
      if(sliderScale > 0.5) { sliderScale -= 0.1; }
      document.querySelector('.slider').style.transform = 'scale(' + sliderScale + ')';
    }
    // Loader Hide After 3 Seconds
    window.addEventListener('load', function() {
      setTimeout(function() {
        document.getElementById('loader').style.display = 'none';
        document.getElementById('content').style.display = 'block';
      }, 1500);
    });
    document.addEventListener('DOMContentLoaded', function() {
      const savedTheme = localStorage.getItem('theme') || 'light';
      document.body.classList.add(savedTheme + '-mode');
      document.getElementById('theme-toggle').innerHTML = savedTheme === 'dark'
        ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
      updateClock();
      showSlide(0);
      setInterval(nextSlide, 5000);
    });
  </script>
</head>
<body>
  <!-- Loader -->
  <div id="loader">
    <l-infinity
      size="55"
      stroke="4"
      stroke-length="0.15"
      bg-opacity="0.1"
      speed="1.3"
      color="blue"
    ></l-infinity>
  </div>
  
  <!-- Main Content -->
  <div id="content" style="display:none;">
    <!-- Navbar -->
    <nav class="navbar">
      <div class="logo">
        <img src="https://upload.wikimedia.org/wikipedia/id/f/ff/Logo_UnivLampung.png" alt="Logo">
        <span>Okta Surya Arif</span>
      </div>
      <ul>
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="projects.php">Project</a></li>
        <li><a href="sertifikat.php">Sertifikat</a></li>
      </ul>
      <div class="clock" id="clock"></div>
      <button id="theme-toggle" onclick="toggleTheme()"></button>
    </nav>
    
    <!-- Slider Section -->
    <div class="slider">
      <img src="/asset/img/slide1.jpg" alt="Slide 1">
      <img src="/asset/img/slide2.jpg" alt="Slide 2">
      <img src="/asset/img/slide3.jpg" alt="Slide 3">
      <div class="slide-caption">
        <h1>Selamat Datang di Website Pribadi Saya</h1>
        <p>Saya Okta Surya Arif, profesional di bidang Informatika.</p>
      </div>
      <div class="zoom-controls">
        <button onclick="zoomIn()"><i class="fas fa-search-plus"></i></button>
        <button onclick="zoomOut()"><i class="fas fa-search-minus"></i></button>
      </div>
    </div>
  </div>
</body>
</html>

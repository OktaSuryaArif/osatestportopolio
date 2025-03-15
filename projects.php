<?php
// projects.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Project - Okta Surya Arif</title>
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
    body { font-family: Arial, sans-serif; transition: background-color 0.3s, color 0.3s; padding-top: 70px; }
    body.light-mode { background: #f5f5f5; color: #333; }
    body.dark-mode { background: #121212; color: #eee; }
    /* Navbar */
    .navbar {
      display: flex; align-items: center;
      justify-content: space-between;
      padding: 15px 30px;
      background: #222;
      color: #fff;
      position: fixed; top: 0; left: 0; width: 100%; z-index: 1000;
    }
    .navbar .logo { display: flex; align-items: center; }
    .navbar .logo img { height: 40px; margin-right: 10px; }
    .navbar ul {
      display: flex;
      margin: 0 auto;  /* Center the menu */
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
      background: none;
      border: none;
      color: #fff;
      font-size: 18px;
      cursor: pointer;
    }
    .clock {
      color: #fff;
      font-size: 14px;
      margin-left: 20px;
    }
    /* Project Slider */
    .project-slider {
      position: relative;
      width: 100%;
      height: 70vh;
      margin: 20px auto;
      overflow: hidden;
    }
    .project-slider .slide {
      position: absolute;
      width: 100%;
      height: 70vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity 1s ease-in-out;
    }
    .project-slider .slide.active { opacity: 1; }
    .project-slider img {
      width: 80%;
      max-height: 400px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 20px;
    }
    .project-slider h2 {
      font-size: 32px;
      margin-bottom: 10px;
    }
    .project-slider p {
      font-size: 18px;
      text-align: center;
      max-width: 800px;
    }
    /* Responsive */
    @media (max-width: 768px) {
      .navbar ul li a { font-size: 14px; }
      .project-slider h2 { font-size: 24px; }
      .project-slider p { font-size: 16px; }
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
    // Project Slider Functionality
    let currentProject = 0;
    function showProject(index) {
      const slides = document.querySelectorAll('.project-slider .slide');
      if(index >= slides.length) { currentProject = 0; }
      else if(index < 0) { currentProject = slides.length - 1; }
      else { currentProject = index; }
      slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === currentProject);
      });
    }
    function nextProject() { showProject(currentProject + 1); }
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
      showProject(0);
      setInterval(nextProject, 5000);
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
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="projects.php" class="active">Project</a></li>
        <li><a href="sertifikat.php">Sertifikat</a></li>
      </ul>
      <div class="clock" id="clock"></div>
      <button id="theme-toggle" onclick="toggleTheme()"></button>
    </nav>
    
    <!-- Project Slider -->
    <div class="project-slider">
      <div class="slide">
        <img src="/asset/img/project1.jpg" alt="JunkCash Project">
        <h2>JunkCash Capstone Bangkit Academy</h2>
        <p>Project Leader – Aplikasi Android untuk optimalisasi manajemen sampah guna mendukung partisipasi publik dalam daur ulang.</p>
      </div>
      <div class="slide">
        <img src="/asset/img/project2.jpg" alt="HCI UNILA">
        <h2>Project Human Computer Interaction (HCI) UNILA</h2>
        <p>Memimpin proyek desain antarmuka untuk aplikasi ZEE agar lebih user-friendly dan interaktif.</p>
      </div>
      <div class="slide">
        <img src="/asset/img/project3.jpg" alt="Image Processing Project">
        <h2>Project Image Processing UNILA</h2>
        <p>Memimpin pengembangan solusi otomatis untuk meningkatkan kecerahan, kontras, dan memulihkan detail gambar yang hilang.</p>
      </div>
      <div class="slide">
        <img src="/asset/img/project4.jpg" alt="LMS Project">
        <h2>Project Learning Management System (LMS) SMAN 7</h2>
        <p>Anggota tim dalam merancang sistem pembelajaran digital untuk mendukung kegiatan belajar mengajar di SMAN 7 Bandar Lampung.</p>
      </div>
    </div>
  </div>
</body>
</html>

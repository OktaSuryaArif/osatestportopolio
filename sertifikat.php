<?php
// sertifikat.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Sertifikat - Okta Surya Arif</title>
  <link rel="icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/id/f/ff/Logo_UnivLampung.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <!-- Loader Script -->
  <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/infinity.js"></script>
  <style>
    /* Loader Styling */
    #loader {
      position: fixed;
      top: 0; left: 0;
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
    /* Sidebar Profil */
    .sidebar {
      text-align: center;
      padding: 20px;
      margin-bottom: 30px;
    }
    .sidebar .profile-pic {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 20px;
    }
    .sidebar h2 { font-size: 28px; margin-bottom: 10px; }
    .sidebar p { font-size: 16px; margin-bottom: 20px; }
    .sidebar .social-links {
      display: flex;
      justify-content: center;
      gap: 15px;
      font-size: 20px;
    }
    .sidebar .social-links a {
      color: inherit;
      text-decoration: none;
      transition: color 0.3s;
    }
    .sidebar .social-links a:hover { color: #007BFF; }
    /* Certificate Table */
    .certificate-content {
      max-width: 900px;
      margin: 20px auto;
      padding: 0 20px 40px 20px;
    }
    .certificate-content h1 {
      margin-bottom: 20px;
      text-align: center;
    }
    .certificate-table {
      width: 100%;
      border-collapse: collapse;
    }
    .certificate-table th,
    .certificate-table td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }
    .certificate-table th {
      background-color: #007BFF;
      color: white;
    }
    .download-icon {
      cursor: pointer;
      color: #007BFF;
    }
    .download-icon:hover {
      color: #0056b3;
    }
    /* Responsive */
    @media (max-width: 768px) {
      .certificate-table th,
      .certificate-table td {
         font-size: 14px;
         padding: 6px;
      }
    }
  </style>
  <script>
    // Toggle Tema & Clock
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
    function updateClock() {
      const now = new Date();
      const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      const dateStr = now.toLocaleDateString('id-ID', options);
      const timeStr = now.toLocaleTimeString('id-ID');
      document.getElementById('clock').textContent = dateStr + ' ' + timeStr;
    }
    setInterval(updateClock, 1000);
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
        <li><a href="projects.php">Project</a></li>
        <li><a href="sertifikat.php" class="active">Sertifikat</a></li>
      </ul>
      <div class="clock" id="clock"></div>
      <button id="theme-toggle" onclick="toggleTheme()"></button>
    </nav>
    
    <!-- Sidebar Profil -->
    <div class="sidebar">
      <img src="foto-profil.jpg" alt="Foto Profil" class="profile-pic">
      <h2>Okta Surya Arif</h2>
      <p>Bandar Lampung, Indonesia<br>20 Oktober 2001</p>
      <div class="social-links">
        <a href="https://wa.me/6282371925540" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        <a href="mailto:oktasuryaarief@gmail.com" title="Email"><i class="fa-solid fa-envelope"></i></a>
        <a href="https://www.linkedin.com/in/oktsuryaarif" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
        <a href="https://replit.com/@Okta-SuryaSurya" target="_blank" title="Replit"><i class="fa-solid fa-code"></i></a>
        <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>
        <a href="#" title="YouTube"><i class="fab fa-youtube"></i></a>
        <a href="#" title="GitHub"><i class="fab fa-github"></i></a>
      </div>
    </div>
    
    <!-- Certificate Content as Table -->
    <div class="certificate-content">
      <h1>Sertifikat</h1>
      <table class="certificate-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Sertifikat</th>
            <th>Validitas</th>
            <th>Unduh</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Belajar Membuat Aplikasi Android dengan Jetpack Compose</td>
            <td>Dec 4, 2023 – Dec 4, 2026</td>
            <td><a href="https://www.dicoding.com/certificates/L4PQQMO0VPO1" target="_blank" title="Unduh"><i class="fas fa-download download-icon"></i></a></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Belajar Pengembangan Aplikasi Android Intermediate</td>
            <td>Dec 1, 2023 – Dec 1, 2026</td>
            <td><a href="https://www.dicoding.com/certificates/0LZ02D8KKX65" target="_blank" title="Unduh"><i class="fas fa-download download-icon"></i></a></td>
          </tr>
          <tr>
            <td>3</td>
            <td>IoT Fundamentals: Connecting Things</td>
            <td>Nov 1, 2023 – Present</td>
            <td><a href="https://drive.google.com/file/d/1M4dnjLqABxGXg_46iz79nPuho8W0MEU-/view?usp=sharing" target="_blank" title="Unduh"><i class="fas fa-download download-icon"></i></a></td>
          </tr>
          <tr>
            <td>4</td>
            <td>Belajar Fundamental Aplikasi Android</td>
            <td>Oct 24, 2023 – Oct 24, 2026</td>
            <td><a href="https://www.dicoding.com/certificates/GRX52MYYVX0M" target="_blank" title="Unduh"><i class="fas fa-download download-icon"></i></a></td>
          </tr>
          <tr>
            <td>5</td>
            <td>Belajar Membuat Aplikasi Android untuk Pemula</td>
            <td>Sep 3, 2023 – Sep 3, 2026</td>
            <td><a href="https://www.dicoding.com/certificates/KEXLLEOJRXG2" target="_blank" title="Unduh"><i class="fas fa-download download-icon"></i></a></td>
          </tr>
          <tr>
            <td>6</td>
            <td>Memulai Pemrograman dengan Kotlin</td>
            <td>Aug 17, 2023 – Aug 17, 2026</td>
            <td><a href="https://www.dicoding.com/certificates/JMZV9R1M3PN9" target="_blank" title="Unduh"><i class="fas fa-download download-icon"></i></a></td>
          </tr>
          <tr>
            <td>7</td>
            <td>Pengenalan ke Logika Pemrograman (Programming Logic 101)</td>
            <td>Aug 13, 2023 – Aug 13, 2026</td>
            <td><a href="https://www.dicoding.com/certificates/GRX5DR3JKX0M" target="_blank" title="Unduh"><i class="fas fa-download download-icon"></i></a></td>
          </tr>
          <tr>
            <td>8</td>
            <td>Belajar Dasar Git dengan GitHub</td>
            <td>Aug 13, 2023 – Aug 13, 2026</td>
            <td><a href="https://www.dicoding.com/certificates/07Z6V9JRRXQR" target="_blank" title="Unduh"><i class="fas fa-download download-icon"></i></a></td>
          </tr>
          <tr>
            <td>9</td>
            <td>Memulai Dasar Pemrograman untuk Menjadi Pengembang Software</td>
            <td>Aug 10, 2023 – Aug 10, 2026</td>
            <td><a href="https://www.dicoding.com/certificates/L4PQGLWGQZO1" target="_blank" title="Unduh"><i class="fas fa-download download-icon"></i></a></td>
          </tr>
          <tr>
            <td>10</td>
            <td>CCNAv7: Introduction to Networks</td>
            <td>July 18, 2023 – Present</td>
            <td><a href="https://drive.google.com/file/d/1TG3LPryDjitJwD1kWd6SpTzjwM5u_22P/view?usp=sharing" target="_blank" title="Unduh"><i class="fas fa-download download-icon"></i></a></td>
          </tr>
          <tr>
            <td>11</td>
            <td>JavaScript Algorithms and Data Structures</td>
            <td>July 17, 2023 – Present</td>
            <td><a href="https://www.freecodecamp.org/certification/oktasuryaarif/javascript-algorithms-and-data-structures" target="_blank" title="Unduh"><i class="fas fa-download download-icon"></i></a></td>
          </tr>
          <tr>
            <td>12</td>
            <td>Back End Development and APIs</td>
            <td>March 31, 2023 – Present</td>
            <td><a href="https://www.freecodecamp.org/certification/oktasuryaarif/back-end-development-and-apis" target="_blank" title="Unduh"><i class="fas fa-download download-icon"></i></a></td>
          </tr>
          <tr>
            <td>13</td>
            <td>Front End Development Libraries</td>
            <td>March 24, 2023 – Present</td>
            <td><a href="https://www.freecodecamp.org/certification/oktasuryaarif/front-end-development-libraries" target="_blank" title="Unduh"><i class="fas fa-download download-icon"></i></a></td>
          </tr>
          <tr>
            <td>14</td>
            <td>Responsive Web Design</td>
            <td>March 21, 2023 – Present</td>
            <td><a href="https://www.freecodecamp.org/certification/oktasuryaarif/responsive-web-design" target="_blank" title="Unduh"><i class="fas fa-download download-icon"></i></a></td>
          </tr>
          <tr>
            <td>15</td>
            <td>Oracle Academy Database Programming with SQL</td>
            <td>December 8, 2022 – Present</td>
            <td><a href="https://drive.google.com/file/d/1_iWQesWtgt3VWGsi0ZLn_INn-fm_po6j/view?usp=sharing" target="_blank" title="Unduh"><i class="fas fa-download download-icon"></i></a></td>
          </tr>
          <tr>
            <td>16</td>
            <td>Oracle Academy Database Design</td>
            <td>October 28, 2022 – Present</td>
            <td><a href="https://drive.google.com/file/d/1IxtxScz5U66OgME9yHm8pQl-Osy7kSOD/view?usp=sharing" target="_blank" title="Unduh"><i class="fas fa-download download-icon"></i></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>

<?php
// about.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>About - Okta Surya Arif</title>
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
      display: flex; align-items: center;
      justify-content: space-between;
      padding: 15px 30px;
      background: #222;
      color: #fff;
      position: fixed;
      top: 0; left: 0; width: 100%; z-index: 1000;
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
      background: none; border: none;
      color: #fff; font-size: 18px; cursor: pointer;
    }
    .clock { color: #fff; font-size: 14px; margin-left: 20px; }
    /* Sidebar Profil */
    .sidebar {
      text-align: center;
      padding: 20px;
      margin-top: 100px;
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
    /* About Content & Tab Interface */
    .about-container {
      max-width: 800px;
      margin: 20px auto;
      padding: 0 20px 40px 20px;
    }
    .tab-menu {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }
    .tab-menu button {
      background: none;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      border-bottom: 3px solid transparent;
      transition: border-color 0.3s;
    }
    .tab-menu button.active {
      border-color: #007BFF;
      font-weight: bold;
    }
    .tab-content { display: none; }
    .tab-content.active { display: block; }
    .content-section h1,
    .content-section h2,
    .content-section h3 { margin-bottom: 15px; }
    .content-section p,
    .content-section ul { margin-bottom: 15px; line-height: 1.6; }
    .content-section ul { padding-left: 20px; }
    /* Responsive */
    @media (max-width: 768px) {
      .navbar ul li a { font-size: 14px; }
      .sidebar h2 { font-size: 22px; }
      .tab-menu button { font-size: 14px; padding: 8px 16px; }
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
    // Tab Switching for About Content (CV & Portofolio)
    function showTab(tab) {
      document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
      document.getElementById(tab).classList.add('active');
      document.querySelectorAll('.tab-menu button').forEach(btn => btn.classList.remove('active'));
      document.getElementById('btn-' + tab).classList.add('active');
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
      showTab('cv'); // Default tab: CV
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
        <li><a href="about.php" class="active">About</a></li>
        <li><a href="projects.php">Project</a></li>
        <li><a href="sertifikat.php">Sertifikat</a></li>
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
    
    <!-- About Content with Tab Interface -->
    <div class="about-container">
      <div class="tab-menu">
        <button id="btn-cv" onclick="showTab('cv')">CV</button>
        <button id="btn-portofolio" onclick="showTab('portofolio')">Portofolio</button>
      </div>
      
      <!-- CV Section -->
      <div id="cv" class="tab-content active content-section">
        <h1>Curriculum Vitae</h1>
        <h2>Surat Lamaran</h2>
        <p><strong>To, Recruiter BUMN In Place,</strong></p>
        <p>
          I am writing to express my interest in the "Work" position currently available in your company, which you lead. My name is Okta Surya Arif, and I am 23 years old. I’m an Undergraduate Informatics Engineering Student at Lampung University.
          Based on my qualifications and skills, I am confident that I can make a valuable contribution to the company and the offered position. I am also willing to be placed at any location required by the company.
          I have enclosed my application documents, which provide further details regarding my qualifications for the position I am applying for. I sincerely hope to be given the opportunity to discuss my qualifications further. You can reach me at my mobile number +62823-7192-5540 (WhatsApp) or via email at oktasuryaarief@gmail.com. I eagerly await a positive response from you. Thank you.
        </p>
        <p>Sincerely,<br>Okta Surya Arif</p>
        <hr>
        <h2>Identitas</h2>
        <p>
          <strong>OKTA SURYA ARIF</strong><br>
          Bandar Lampung, Indonesia • 20 October 2001<br>
          oktasuryaarief@gmail.com • 0823-7192-5540<br>
          <a href="https://www.linkedin.com/in/oktsuryaarif" target="_blank">LinkedIn</a> • <a href="https://replit.com/@Okta-SuryaSurya" target="_blank">Replit</a>
        </p>
        <h2>About Me</h2>
        <p>
          I am Difabel Tuna Daksa. Now I’m currently a Graduate Mobile Development Cohort 2023 Batch 2 at Bangkit Academy (led by Google, GoTo & Traveloka) and pursuing my undergraduate degree in Informatics Engineering at Lampung University. My academic journey and hands-on experience in various aspects of Computer Science have built a strong foundation. I have a keen interest in software engineering, UI/UX, and IT, and I continuously hone my skills to translate ideas into impactful solutions.
        </p>
        <h2>Education</h2>
        <p>
          <strong>Universitas Lampung (2021 - Present)</strong><br>
          S1 Teknik Informatika – GPA: 3.71/4.00
        </p>
        <h2>Work Experience</h2>
        <p>
          <strong>Pengadilan Negeri Tanjungkarang</strong> (July 2024 – August 2024)<br>
          Web Developer Intern (Divisi PTIP)
        </p>
        <ul>
          <li>Developed the E-PPID application to manage public information.</li>
          <li>Assisted in coding, debugging, and testing the application.</li>
        </ul>
        <h2>Project Experience</h2>
        <p>
          <strong>JunkCash Capstone Bangkit Academy</strong> (August 2023 – December 2023)<br>
          Project Leader – Led the development of an Android application for waste management.
        </p>
      </div>
      
      <!-- Portofolio Section -->
      <div id="portofolio" class="tab-content content-section">
        <h1>Portofolio</h1>
        <div>
          <h2>JunkCash Capstone Bangkit Academy</h2>
          <p>Project Leader – Aplikasi Android untuk optimalisasi manajemen sampah. Proyek ini mengoptimalkan pengelolaan sampah melalui teknologi aplikasi untuk mendukung partisipasi publik dalam daur ulang.</p>
          <img src="/asset/img/portfolio1.jpg" alt="JunkCash Project">
        </div>
        <div>
          <h2>Project Human Computer Interaction (HCI) UNILA</h2>
          <p>Memimpin proyek desain antarmuka untuk aplikasi ZEE agar lebih user-friendly dan interaktif.</p>
          <img src="/asset/img/portfolio2.jpg" alt="HCI UNILA">
        </div>
        <div>
          <h2>Project Image Processing UNILA</h2>
          <p>Memimpin pengembangan solusi otomatis untuk meningkatkan kecerahan, kontras, dan memulihkan detail gambar yang hilang.</p>
          <img src="/asset/img/portfolio3.jpg" alt="Image Processing Project">
        </div>
        <div>
          <h2>Project Learning Management System (LMS) SMAN 7</h2>
          <p>Anggota tim dalam merancang sistem pembelajaran digital untuk mendukung kegiatan belajar mengajar di SMAN 7 Bandar Lampung.</p>
          <img src="/asset/img/portfolio4.jpg" alt="LMS Project">
        </div>
      </div>
    </div>
  </div>
</body>
</html>

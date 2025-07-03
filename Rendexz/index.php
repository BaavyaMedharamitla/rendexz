<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Rendexz | Learn. Build. Grow.</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"/>
  <style>
    :root {
      --transition-speed: 0.4s;
      --light-bg: #f8f9fa;
      --light-text: #212529;
      --light-muted: #6c757d;
      --dark-bg: #121212;
      --dark-text: #e4e6eb;
      --dark-muted: #b0b3b8;
      --dark-card: #1f1f1f;
      --dark-border: #333;
      --accent-blue:rgb(30, 165, 188);
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: var(--light-bg);
      color: var(--light-text);
      transition: background-color var(--transition-speed), color var(--transition-speed);
    }

    body.dark-mode {
      background-color: var(--dark-bg);
      color: var(--dark-text);
    }

    .hero {
      background: linear-gradient(rgb(66, 158, 207));
      color: white;
      padding: 100px 0;
      transition: background var(--transition-speed), color var(--transition-speed);
    }

    body.dark-mode .hero {
      background: linear-gradient(to right, #0a0f24, #1a1f40);
      color: var(--dark-text);
    }

    .card {
      background-color: white;
      color: var(--light-text);
      border: 1px solid #dee2e6;
      transition: transform 0.3s, box-shadow 0.3s, background-color var(--transition-speed), color var(--transition-speed);
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    body.dark-mode .card {
      background-color: var(--dark-card);
      color: var(--dark-text);
      border-color: var(--dark-border);
    }

    body.dark-mode .card:hover {
      box-shadow: 0 10px 20px rgba(255, 255, 255, 0.05);
    }

    .section-title {
      font-weight: 700;
      color: var(--light-text);
      transition: color var(--transition-speed);
    }

    body.dark-mode .section-title {
      color: var(--dark-text);
    }

    .text-muted {
      color: var(--light-muted) !important;
      transition: color var(--transition-speed);
    }

    body.dark-mode .text-muted {
      color: var(--dark-muted) !important;
    }

    footer {
      background-color: #343a40;
      color: white;
      transition: background-color var(--transition-speed), color var(--transition-speed);
    }

    body.dark-mode footer {
      background-color: #0d0d0d;
      color: var(--dark-muted);
    }

    .navbar {
      transition: background-color var(--transition-speed);
    }

    body.dark-mode .navbar {
      background-color: #1f1f1f !important;
    }

    .nav-link {
      transition: color var(--transition-speed);
    }

    body.dark-mode .nav-link {
      color: var(--dark-muted) !important;
    }

    body.dark-mode .nav-link.active {
      color: var(--dark-text) !important;
    }

    .btn-outline-light {
      transition: background-color var(--transition-speed), color var(--transition-speed), border-color var(--transition-speed);
    }

    body.dark-mode .btn-outline-light {
      border-color: #ccc;
      color: #ccc;
    }

    body.dark-mode .btn-outline-light:hover {
      background-color: #ccc;
      color: #000;
    }
  </style>
</head>
<body>
  <?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container-fluid"> <!-- Changed from container to container-fluid -->
    <a class="navbar-brand fw-bold ms-0" href="index.php">
      <img src="assets/images/logo.png" alt="Rendexz" height="30">
    </a>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) === 'index.php' ? 'active' : '' ?>" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) === 'courses.php' ? 'active' : '' ?>" href="courses.php">Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) === 'progress.php' ? 'active' : '' ?>" href="progress.php">Progress</a>
        </li>

        <!-- Show Login or Logout -->
        <?php if (isset($_SESSION['username'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="fas fa-sign-out-alt me-1"></i>Logout
            </a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) === 'login.php' ? 'active' : '' ?>" href="login.php">
              <i class="fas fa-sign-in-alt me-1"></i>Login
            </a>
          </li>
        <?php endif; ?>
      </ul>

      <!-- Dark Mode Toggle -->
      <div class="form-check form-switch ms-lg-3 mt-2 mt-lg-0 text-white">
        <input class="form-check-input" type="checkbox" id="darkSwitch">
        <label class="form-check-label" for="darkSwitch">Dark Mode</label>
      </div>
    </div>
  </div>
</nav>


  <header class="hero text-center" data-aos="fade-down">
    <div class="container">
      <h1 class="display-4 fw-bold">Welcome to Rendexz</h1>
      <p class="lead mb-4">Empowering Learners. Building Futures.</p>
      <a href="courses.php" class="btn btn-light btn-lg shadow-sm">Explore Courses</a>
    </div>
  </header>

  <section class="container py-5">
    <div class="text-center mb-5">
      <h2 class="section-title" data-aos="fade-up">What We Offer</h2>
      <p class="text-muted">Unlock your potential with industry-relevant content and certificates.</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4" data-aos="fade-up">
        <div class="card h-100 text-center p-4">
          <i class="fas fa-laptop-code fa-3x text-primary mb-3"></i>
          <h5 class="card-title">Interactive Courses</h5>
          <p class="card-text">High-quality video tutorials, real-world projects, and skill-based learning paths.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="card h-100 text-center p-4">
          <i class="fas fa-chart-line fa-3x text-success mb-3"></i>
          <h5 class="card-title">Track Progress</h5>
          <p class="card-text">Monitor your learning journey with visual progress tracking and stats.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="card h-100 text-center p-4">
          <i class="fas fa-certificate fa-3x text-info mb-3"></i>
          <h5 class="card-title">Earn Certificates</h5>
          <p class="card-text">Download verified course certificates to boost your career opportunities.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-primary text-white text-center py-5" data-aos="fade-up">
    <div class="container">
      <h2 class="fw-bold mb-3">Join with learners on Rendexz</h2>
      <p class="mb-4">Whether you're just starting or want to sharpen your skills, we've got you covered.</p>
      <a href="register.php" class="btn btn-outline-light btn-lg">Get Started</a>
    </div>
  </section>

  <!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  <small>&copy; 2025 Rendexz | Learn. Build. Grow.</small>
</footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    const darkSwitch = document.getElementById('darkSwitch');
    const isDark = localStorage.getItem('darkMode') === 'enabled';
    if (isDark) document.body.classList.add('dark-mode');
    if (darkSwitch) darkSwitch.checked = isDark;
    darkSwitch?.addEventListener('change', () => {
      document.body.classList.toggle('dark-mode');
      localStorage.setItem('darkMode', document.body.classList.contains('dark-mode') ? 'enabled' : 'disabled');
    });
  </script>
</body>
</html>

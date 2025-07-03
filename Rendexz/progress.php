<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Progress | Rendexz</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  
 
   <style>
  :root {
    --transition-speed: 0.4s;
    --light-bg: #f4f7ff;
    --light-text: #1c1e21;
    --light-muted: #6c757d;
    --dark-bg: #121212;
    --dark-text: #e4e6eb;
    --dark-muted: #b0b3b8;
    --accent-blue: #0d6efd;
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

  .navbar {
    background-color: #ffffff !important;
    border-bottom: 1px solid #e0e0e0;
    transition: background-color var(--transition-speed);
  }

  .navbar .nav-link {
    color: var(--light-text) !important;
    font-weight: 500;
  }

  .navbar .nav-link.active,
  .navbar .nav-link:hover {
    color: var(--accent-blue) !important;
  }

  body.dark-mode .navbar {
    background-color: #1f1f1f !important;
    border-color: #333;
  }

  body.dark-mode .nav-link {
    color: var(--dark-muted) !important;
  }

  body.dark-mode .nav-link.active {
    color: var(--dark-text) !important;
  }

  header {
    background-color: #ffffff;
    transition: background-color var(--transition-speed);
  }

  body.dark-mode header {
    background-color: #1e1e1e;
  }

  header h2 {
    font-weight: 700;
  }

  .text-muted {
    color: var(--light-muted) !important;
    transition: color var(--transition-speed);
  }

  body.dark-mode .text-muted {
    color: var(--dark-muted) !important;
  }

  .progress-label {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.4rem;
  }

  .card-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 0;
  }

  .progress {
    height: 22px;
    background-color: #e9ecef;
    border-radius: 10px;
    overflow: hidden;
  }

  .progress-bar {
    font-weight: 500;
    padding-left: 10px;
    padding-right: 10px;
    display: flex;
    align-items: center;
    justify-content: right;
    transition: width 1.5s ease-in-out;
    border-radius: 10px;
    color: white;
  }

  body.dark-mode .progress {
    background-color: #2c2c2c;
  }

 .login-msg {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  min-height: calc(100vh - 100px);
  padding: 20px;
  text-align: center;
}

.login-msg h3 {
  font-weight: 600;
  font-size: 1.5rem;
  margin-bottom: 20px;
}

body.dark-mode .login-msg h3 {
  color: var(--dark-text);
}

.login-msg .btn {
  border-radius: 30px;
  padding: 10px 25px;
  font-weight: 500;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

  footer {
    background-color: #212529;
    color: white;
    transition: background-color var(--transition-speed), color var(--transition-speed);
  }

  body.dark-mode footer {
    background-color: #0d0d0d;
    color: var(--dark-muted);
  }
</style>

</head>
<body>

<!-- Navbar -->
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

        <!-- Conditional Login/Logout -->
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
    <div class="form-check form-switch ms-3 text-white">
      <input class="form-check-input" type="checkbox" id="darkSwitch">
      <label class="form-check-label" for="darkSwitch">Dark Mode</label>
    </div>
  </div>
</nav>


<?php if (!isset($_SESSION['username'])): ?>
  <div class="login-msg">
    <h3 class="text-muted">Please login to view your progress.</h3>
    <a href="login.php" class="btn btn-primary mt-3">Go to Login</a>
  </div>
<?php else: ?>
<!-- Header -->
<header class="text-center" data-aos="fade-down">
  <div class="container">
    <h2>Hello, <?= $_SESSION['username']; ?>! Your Learning Progress</h2>
    <p class="text-muted">Track your growth across enrolled courses.</p>
  </div>
</header>

<!-- Main Content -->
<main class="container py-5">
  <?php
  $courses = [
    ["title" => "JavaScript Pro", "progress" => 65, "color" => "primary"],
    ["title" => "Cybersecurity Essentials", "progress" => 40, "color" => "warning"],
    ["title" => "Cloud Computing", "progress" => 25, "color" => "danger"],
    ["title" => "AI Fundamentals", "progress" => 10, "color" => "secondary"]
  ];
  $delay = 0;
  foreach ($courses as $course): ?>
    <div class="mb-4" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
      <div class="progress-label">
        <h5 class="card-title"><?= $course['title'] ?></h5>
        <span><?= $course['progress'] ?>%</span>
      </div>
      <div class="progress">
        <div class="progress-bar bg-<?= $course['color'] ?>" role="progressbar" data-width="<?= $course['progress'] ?>%">0%</div>
      </div>
    </div>
  <?php $delay += 100; endforeach; ?>
</main>
<?php endif; ?>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  <small>&copy; 2025 Rendexz | Learn. Build. Grow.</small>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
  document.querySelectorAll('.progress-bar').forEach(bar => {
    const target = bar.getAttribute('data-width');
    setTimeout(() => {
      bar.style.width = target;
      bar.textContent = target;
    }, 500);
  });

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

<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Course Detail | Rendexz</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"/>
  <style>
    body {
      background-color: #f4f7ff;
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
    }
    iframe {
      border-radius: 8px;
    }
    .card {
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
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
        <?php if (isset($_SESSION['username'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt me-1"></i>Logout</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) === 'login.php' ? 'active' : '' ?>" href="login.php"><i class="fas fa-sign-in-alt me-1"></i>Login</a>
        </li>
        <?php endif; ?>
      </ul>
      <div class="form-check form-switch ms-lg-3 mt-2 mt-lg-0 text-white">
        <input class="form-check-input" type="checkbox" id="darkSwitch">
        <label class="form-check-label" for="darkSwitch">Dark Mode</label>
      </div>
    </div>
  </div>
</nav>

<!-- Main Content -->
<main class="container py-5">
  <div class="row">
    <div class="col-md-8" data-aos="fade-up">
      <h2 class="fw-bold">Web Development Full Course</h2>
      <p class="text-muted">Start your journey with HTML, CSS, and JavaScript.</p>
      <div class="ratio ratio-16x9 mb-4">
        <iframe src="https://www.youtube.com/embed/ZFQkb26UD1Y" title="Course Video" allowfullscreen></iframe>
      </div>
    </div>
    <div class="col-md-4" data-aos="fade-left">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">🎓 Download Certificate</h5>
          <p class="card-text">Preview your certificate after completing the course.</p>
          <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#certificateModal">
            <i class="fas fa-certificate me-1"></i> Preview Certificate
          </button>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Certificate Modal -->
<div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="certificateLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="certificateLabel">Course Completion Certificate</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img src="https://images.besttemplates.com/wp-content/uploads/2024/06/Custom-made-Certificate-Design-for-Completion-of-Course.jpg" alt="Certificate Preview" class="img-fluid rounded shadow">
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  <small>&copy; 2025 Rendexz | Learn. Build. Grow.</small>
</footer>

<!-- Scripts -->
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

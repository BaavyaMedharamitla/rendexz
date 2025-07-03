<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Courses | Rendexz</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

  <style>
 :root {
  --transition-speed: 0.4s;
  --light-bg: #ffffff;
  --light-secondary: #f4f7ff;
  --light-text: #1c1e21;
  --light-muted: #6c757d;
  --light-card: #ffffff;
  --light-border: #e0e0e0;

  --dark-bg: #121212;
  --dark-text: #e4e6eb;
  --dark-muted: #b0b3b8;
  --dark-card: #1f1f1f;
  --dark-border: #333;

  --accent-blue: #0d6efd;
  --accent-gradient: linear-gradient(to right, #4e54c8, #8f94fb);
}

body {
  font-family: 'Segoe UI', sans-serif;
  background-color: var(--light-secondary);
  color: var(--light-text);
  transition: background-color var(--transition-speed), color var(--transition-speed);
}

body.dark-mode {
  background-color: var(--dark-bg);
  color: var(--dark-text);
}

/* Navbar */
.navbar {
  background-color: #ffffff !important;
  border-bottom: 1px solid var(--light-border);
  transition: background-color var(--transition-speed), border-color var(--transition-speed);
}

.navbar .nav-link {
  color: var(--light-text) !important;
  font-weight: 500;
}

.navbar .nav-link:hover,
.navbar .nav-link.active {
  color: var(--accent-blue) !important;
}

body.dark-mode .navbar {
  background-color: #1f1f1f !important;
  border-color: var(--dark-border);
}

body.dark-mode .nav-link {
  color: var(--dark-muted) !important;
}

body.dark-mode .nav-link.active {
  color: var(--dark-text) !important;
}

/* Header */
header {
  background-color: var(--light-bg);
  transition: background-color var(--transition-speed);
}

body.dark-mode header {
  background-color: #1e1e1e;
}

/* Section Title */
h2.fw-bold {
  font-size: 2.2rem;
}

.text-muted {
  color: var(--light-muted) !important;
  transition: color var(--transition-speed);
}

body.dark-mode .text-muted {
  color: var(--dark-muted) !important;
}

/* Search Box */
#courseSearch {
  border-radius: 30px;
  padding: 10px 20px;
  background-color: #fff;
  border: 1px solid #ccc;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  transition: background-color var(--transition-speed), color var(--transition-speed), border-color var(--transition-speed);
}



/* Cards */
.card {
  background-color: var(--light-card);
  color: var(--light-text);
  border: 1px solid var(--light-border);
  border-radius: 15px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
  transition: transform 0.3s, box-shadow 0.3s, background-color var(--transition-speed), color var(--transition-speed);
}

.card:hover {
  transform: translateY(-6px);
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
}

.card-img-top {
  height: 180px;
  object-fit: cover;
  border-top-left-radius: 15px;
  border-top-right-radius: 15px;
}

body.dark-mode .card {
  background-color: var(--dark-card);
  color: var(--dark-text);
  border-color: var(--dark-border);
}

body.dark-mode .card:hover {
  box-shadow: 0 10px 20px rgba(255, 255, 255, 0.05);
}

/* Buttons */
.btn-outline-primary {
  border-radius: 30px;
  font-weight: 500;
  transition: background-color var(--transition-speed), color var(--transition-speed), border-color var(--transition-speed);
}

body.dark-mode .btn-outline-primary {
  border-color: #ccc;
  color: #ccc;
}

body.dark-mode .btn-outline-primary:hover {
  background-color: #ccc;
  color: #000;
}

/* Footer */
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


<!-- Header -->
<header class=" text-center" data-aos="fade-down">
  <div class="container">
    <h2 class="fw-bold">Available Courses</h2>
    <p class="text-muted">Explore our curated collection of tech learning paths.</p>
    <input type="text" id="courseSearch" class="form-control w-50 mx-auto mt-3" placeholder="Search courses...">
  </div>
</header>

<!-- Course Cards -->
<main class="container py-5">
  <div class="row" id="courseList">

    <!-- Sample Course Card 1 -->
    <div class="col-md-4 mb-4 course-item" data-aos="zoom-in">
      <div class="card">
        <img src="https://cdn.hackr.io/uploads/posts/large/1582104017JvTCRiVe0D.png" class="card-img-top" alt="HTML Course">
        <div class="card-body">
          <h5 class="card-title">HTML Basics</h5>
          <p class="card-text">Learn the foundation of web structure using HTML.</p>
          <a href="course-detail.php" class="btn btn-outline-primary w-100">View Details</a>
        </div>
      </div>
    </div>

    <!-- Sample Course Card 2 -->
    <div class="col-md-4 mb-4 course-item" data-aos="zoom-in" data-aos-delay="100">
      <div class="card">
        <img src="https://www.stpcomputereducation.com/images/course_pic/css.webp" class="card-img-top" alt="CSS Course">
        <div class="card-body">
          <h5 class="card-title">CSS Mastery</h5>
          <p class="card-text">Style your websites beautifully and responsively.</p>
          <a href="course-detail.php" class="btn btn-outline-primary w-100">View Details</a>
        </div>
      </div>
    </div>

    <!-- Sample Course Card 3 -->
    <div class="col-md-4 mb-4 course-item" data-aos="zoom-in" data-aos-delay="200">
      <div class="card">
        <img src="https://codingclasspenang.com/wp-content/uploads/2023/09/javascript2.png" class="card-img-top" alt="JavaScript Course">
        <div class="card-body">
          <h5 class="card-title">JavaScript Pro</h5>
          <p class="card-text">Make websites dynamic and interactive with JS.</p>
          <a href="course-detail.php" class="btn btn-outline-primary w-100">View Details</a>
        </div>
      </div>
    </div>
    <!-- Sample Course Card 4 -->
<div class="col-md-4 mb-4 course-item" data-aos="zoom-in" data-aos-delay="300">
  <div class="card">
    <img src="https://img.freepik.com/free-vector/cyber-security-concept_23-2148532223.jpg" class="card-img-top" alt="Cybersecurity Course">
    <div class="card-body">
      <h5 class="card-title">Cybersecurity Essentials</h5>
      <p class="card-text">Protect systems and data from cyber threats with core security principles.</p>
      <a href="course-detail.php" class="btn btn-outline-primary w-100">View Details</a>
    </div>
  </div>
</div>

<!-- Sample Course Card 5 -->
<div class="col-md-4 mb-4 course-item" data-aos="zoom-in" data-aos-delay="400">
  <div class="card">
    <img src="https://media.licdn.com/dms/image/v2/C4E12AQG6Vi-sl4wtcg/article-cover_image-shrink_720_1280/article-cover_image-shrink_720_1280/0/1520182102265?e=2147483647&v=beta&t=wqHm7fKRlrQRH9wiP1bt7K4pxOy-VnnC0xZ9jJdAhZ8" class="card-img-top" alt="Cloud Computing Course">
    <div class="card-body">
      <h5 class="card-title">Cloud Computing Foundations</h5>
      <p class="card-text">Learn the basics of AWS, Azure, and scalable infrastructure in the cloud.</p>
      <a href="course-detail.php" class="btn btn-outline-primary w-100">View Details</a>
    </div>
  </div>
</div>

<!-- Sample Course Card 6 -->
<div class="col-md-4 mb-4 course-item" data-aos="zoom-in" data-aos-delay="500">
  <div class="card">
    <img src="https://img.freepik.com/free-vector/artificial-intelligence-concept-illustration_114360-7295.jpg" class="card-img-top" alt="AI Course">
    <div class="card-body">
      <h5 class="card-title">AI for Beginners</h5>
      <p class="card-text">Understand the core concepts of Artificial Intelligence, ML, and deep learning.</p>
      <a href="course-detail.php" class="btn btn-outline-primary w-100">View Details</a>
    </div>
  </div>
</div>


  </div>
</main>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  <small>&copy; 2025 Rendexz | Learn. Build. Grow.</small>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();

  // Search Filter
  document.getElementById('courseSearch').addEventListener('input', function () {
    const keyword = this.value.toLowerCase();
    const items = document.querySelectorAll('.course-item');
    items.forEach(item => {
      const title = item.querySelector('.card-title').textContent.toLowerCase();
      item.style.display = title.includes(keyword) ? 'block' : 'none';
    });
  });
</script>
<script>
  const darkSwitch = document.getElementById('darkSwitch');
  const isDark = localStorage.getItem('darkMode') === 'enabled';

  if (isDark) document.body.classList.add('dark-mode');

  darkSwitch && (darkSwitch.checked = isDark);

  darkSwitch?.addEventListener('change', () => {
    document.body.classList.toggle('dark-mode');
    localStorage.setItem('darkMode', document.body.classList.contains('dark-mode') ? 'enabled' : 'disabled');
  });
</script>


</body>
</html>

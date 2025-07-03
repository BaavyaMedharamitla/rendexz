<?php
session_start();
require 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $uname = $_POST['username'];
  $pass = $_POST['password'];

  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->execute([$uname]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user && password_verify($pass, $user['password'])) {
    $_SESSION['username'] = $uname;
    header('Location: index.php');
    exit;
  } else {
    $error = "Invalid credentials!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login | Rendexz</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
  <style>
    :root {
      --transition-speed: 0.4s;
      --light-bg: #f4f7ff;
      --light-text: #212529;
      --dark-bg: #121212;
      --dark-text: #e4e6eb;
      --accent: #0d6efd;
    }

    body {
      background-color: var(--light-bg);
      color: var(--light-text);
      font-family: 'Segoe UI', sans-serif;
      transition: background-color var(--transition-speed), color var(--transition-speed);
    }

    body.dark-mode {
      background-color: var(--dark-bg);
      color: var(--dark-text);
    }

    .card {
      border: none;
      border-radius: 12px;
      transition: all 0.3s ease;
    }

    .card:hover {
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    .form-control {
      border-radius: 30px;
      padding: 10px 20px;
    }

    .btn-primary {
      border-radius: 30px;
      font-weight: 500;
      padding: 10px 20px;
    }

    .login-container {
      min-height: 90vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    footer {
      background-color: #212529;
      color: white;
    }

    body.dark-mode footer {
      background-color: #0d0d0d;
      color: var(--dark-text);
    }

    body.dark-mode .card {
      background-color: #1f1f1f;
      color: var(--dark-text);
    }

    body.dark-mode .form-control {
      background-color: #2a2a2a;
      color: #fff;
      border-color: #444;
    }

    body.dark-mode .form-control::placeholder {
      color: #aaa;
    }

    body.dark-mode .btn-primary {
      background-color: #0d6efd;
      border-color: #0d6efd;
    }

    .navbar-brand {
      font-weight: 700;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Rendexz</a>
    </div>
  </nav>

  <!-- Login Section -->
  <div class="container login-container">
    <div class="row justify-content-center">
      
        <div class="card p-4 shadow-sm">
          <h3 class="text-center mb-4">Login to Rendexz</h3>
          <?php if (isset($error)): ?>
            <div class="alert alert-danger text-center"><?= $error ?></div>
          <?php endif; ?>
          <form method="post">
            <div class="mb-3">
              <input type="text" name="username" class="form-control" placeholder="Username" required />
            </div>
            <div class="mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password" required />
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <p class="text-center mt-3">Don't have an account? <a href="register.php">Register</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center py-3">
    <small>&copy; 2025 Rendexz | All rights reserved.</small>
  </footer>

  <!-- Dark Mode Logic -->
  <script>
    const isDark = localStorage.getItem('darkMode') === 'enabled';
    if (isDark) document.body.classList.add('dark-mode');
  </script>

</body>
</html>

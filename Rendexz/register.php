<?php
require 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $uname = trim($_POST['username']);
  $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->execute([$uname]);

  if ($stmt->rowCount() > 0) {
    $error = "Username already exists!";
  } else {
    $insert = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $insert->execute([$uname, $pass]);
    header("Location: login.php?registered=1");
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Register | Rendexz</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
  <style>
    :root {
      --light-bg: #f4f7ff;
      --dark-bg: #121212;
      --dark-card: #1f1f1f;
      --text-light: #212529;
      --text-dark: #e4e6eb;
    }

    body {
      background-color: var(--light-bg);
      color: var(--text-light);
      font-family: 'Segoe UI', sans-serif;
      transition: background 0.3s, color 0.3s;
    }

    body.dark-mode {
      background-color: var(--dark-bg);
      color: var(--text-dark);
    }

    .card {
      border: none;
      border-radius: 12px;
      transition: all 0.3s ease;
    }

    .form-control {
      border-radius: 30px;
      padding: 10px 20px;
    }

    .btn-success {
      border-radius: 30px;
      font-weight: 500;
      padding: 10px 20px;
    }

    .register-container {
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
      color: var(--text-dark);
    }

    body.dark-mode .card {
      background-color: var(--dark-card);
      color: var(--text-dark);
    }

    body.dark-mode .form-control {
      background-color: #2a2a2a;
      color: #fff;
      border-color: #444;
    }

    body.dark-mode .form-control::placeholder {
      color: #aaa;
    }

    body.dark-mode .btn-success {
      background-color: #198754;
      border-color: #198754;
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
    <a class="navbar-brand fw-bold" href="index.php">Rendexz</a>
  </div>
</nav>

<!-- Register Section -->
<div class="container register-container">
  <div class="row justify-content-center">
  
      <div class="card p-4 shadow-sm">
        <h3 class="text-center mb-4">Create a New Account</h3>
        <?php if (isset($error)): ?>
          <div class="alert alert-danger text-center"><?= $error ?></div>
        <?php endif; ?>
        <form method="post">
          <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Choose a username" required />
          </div>
          <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Create a password" required />
          </div>
          <button type="submit" class="btn btn-success w-100">Register</button>
          <p class="text-center mt-3">Already registered? <a href="login.php">Login</a></p>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="text-center py-3">
  <small>&copy; 2025 Rendexz | All rights reserved.</small>
</footer>

<!-- Dark Mode Script -->
<script>
  const isDark = localStorage.getItem('darkMode') === 'enabled';
  if (isDark) document.body.classList.add('dark-mode');
</script>

</body>
</html>

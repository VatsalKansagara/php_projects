<?php

session_start();

$name = $_SESSION['name'] ?? null;
$alerts = $_SESSION['alerts'] ?? [];
$active_form = $_SESSION['active_form'] ?? '';

session_unset();

if($name !== null)  $_SESSION['name'] = $name;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
  
  <header>

    <a href="#" class="logo">Logo</a>
    <nav>
      <a href="#">Home</a>
      <a href="#">About</a>
      <a href="#">Collection</a>
      <a href="#">Contact</a>
    </nav>

    <div class="user-auth">
      <?php if(!empty($name)): ?>
      <div class="profile-box">
        <div class="avtar-circle"><?= strtoupper($name[0]); ?></div>
        <div class="dropdown">
          <a href="#">My Account</a>
          <a href="logout.php">Logout</a>
        </div>
      </div>
      <?php else: ?>
      <button type="button" class="login-btn-modal">Login</button>
      <?php endif; ?>
    </div>
  </header>

  <section>
    <h1>Hey <?= $name ?? 'Developer' ?>!</h1>
  </section>

  <?php if(!empty($alerts)): ?>
  <div class="alert-box">
    <?php foreach($alerts as $alert): ?>
      <div class="alert <?= $alert['type']; ?>">
        <i class="fa-solid fa-circle-check"></i>
        <span><?= $alert['message']; ?></span>
      </div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

  <div class="auth-modal <?php $active_form === 'register' ? 'show slide' : ($active_form === 'login' ? 'show' : ''); ?>">
    <button type="button" class="close-btn-modal"><i class="fa-solid fa-xmark"></i></button>

    <div class="form-box login">
      <h2>login</h2>
      <form action="auth_process.php" method="POST">
        <div class="input-box">
          <input type="email" name="email" placeholder="Email" required>
          <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Password" required>
          <i class="fa-solid fa-lock"></i>
        </div>
        <button type="submit" class="btn" name="login_btn">Login</button>
        <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
      </form>
    </div>

    <div class="form-box register">
      <h2>Register</h2>
      <form action="auth_process.php" method="POST">
        <div class="input-box">
          <input type="text" name="name" placeholder="Name" required>
          <i class="fa-solid fa-user"></i>
        </div>
        <div class="input-box">
          <input type="email" name="email" placeholder="Email" required>
          <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Password" required>
          <i class="fa-solid fa-lock"></i>
        </div>
        <button type="submit" class="btn" name="register_btn">Register</button>
        <p>Already have an account? <a href="#" class="login-link">Login</a></p>
      </form>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>
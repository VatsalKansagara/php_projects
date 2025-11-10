<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
$isLoggedIn = isset($_SESSION['user']) && isset($_SESSION['user']['username']);
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top">
  <div class="container">
    <!-- Brand / Logo -->
    <a class="navbar-brand d-flex align-items-center" href="./">
      <img src="./public/logo.png" alt="Logo" height="40" class="me-2">
    </a>

    <!-- Mobile Toggle Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Links -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <!-- Home -->
        <li class="nav-item">
          <a class="nav-link active" href="./">Home</a>
        </li>

        <!-- Logged In User Menu -->
        <?php if ($isLoggedIn): ?>
          <li class="nav-item">
            <a class="nav-link" href="?ask=true">Ask A Question</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?u-id=<?= htmlspecialchars($_SESSION['user']['user_id']) ?>">My Questions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="./server/requests.php?logout=true">
              Logout (<?= htmlspecialchars($_SESSION['user']['username']) ?>)
            </a>
          </li>
        <?php else: ?>
          <!-- Guest Menu -->
          <li class="nav-item">
            <a class="nav-link" href="?login=true">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?signup=true">SignUp</a>
          </li>
        <?php endif; ?>

        <!-- Latest Questions -->
        <li class="nav-item">
          <a class="nav-link" href="?latest=true">Latest Questions</a>
        </li>
      </ul>

      <!-- Search Form -->
      <form class="d-flex ms-lg-3 mt-3 mt-lg-0" role="search" method="get">
        <input class="form-control me-2" name="search" type="search" placeholder="Search questions">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

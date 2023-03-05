<!-- Navigation -->

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand font-playfair-bold color-white" href="index.php">kidoos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link color-white" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link color-white" href="#about">About</a>
        </li>
        <li class="nav-item">
            <?php if (isset($_SESSION['email'])) : ?>
              <a class="nav-link color-white" href="students.php">Students</a>
            <?php else : ?>
              <a class="nav-link color-white" href="login.php">Students</a>
            <?php endif; ?>
        </li>
        <li class="nav-item">
          <?php if (isset($_SESSION['email'])) : ?>
          <a class="nav-link color-white" href="process/logout.php">Logout</a>
          <?php else : ?>
            <a class="nav-link color-white" href="login.php">Login</a>
          <?php endif; ?>
        </li>
        <li class="nav-item">
          <a class="nav-link color-white" href="#contact">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
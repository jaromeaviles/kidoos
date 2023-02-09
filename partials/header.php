<!-- Connections -->

<?php
  require 'connections/config.php';

  // Checks if logged in

  if (!isset($_SESSION)) {
    session_start();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>kidoos</title>

    <!-- Imports Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Imports Google Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- imports CSS -->
    <link rel="stylesheet" href="dist/styles/app.css">

</head>
<body>

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
          <a class="nav-link color-white" href="#">About</a>
        </li>
        <li class="nav-item">
          <?php if (isset($_SESSION['access']) == 'admin') { ?>
            <a class="nav-link color-white" href="students.php">Students</a>
          <?php } else { ?>
            <a class="nav-link color-white" href="#">Profile</a>
          <?php } ?>
        </li>
        <li class="nav-item">
          <?php if (isset($_SESSION['username'])) { ?>
          <a class="nav-link color-white" href="process/logout.php">Logout</a>
          <?php } else { ?>
            <a class="nav-link color-white" href="login.php">Login</a>
          <?php } ?>
        </li>
        <li class="nav-item">
          <a class="nav-link color-white" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
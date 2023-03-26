<?php
  require '../connections/config.php';

  // Checks if logged in

  if (!isset($_SESSION)) {
    session_start();
  }

  $fullName = $_POST['fullName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $password = $_POST['password'];
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  date_default_timezone_set('asia/manila');
  $date = date('m/d/Y');

  $sql = "INSERT INTO students (full_name, last_name, email, gender, password, date_added) VALUES (?, ?, ?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);

  $stmt->bind_param('ssssss', $fullName, $lastName, $email, $gender, $hashedPassword, $date);

  $stmt->execute();

  header('location: ../login.php');

?>
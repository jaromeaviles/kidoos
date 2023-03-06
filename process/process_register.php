<?php
  require '../connections/config.php';

  // Checks if logged in

  if (!isset($_SESSION)) {
    session_start();
  }

  $fullName = $_GET['fullName'];
  $lastName = $_GET['lastName'];
  $email = $_GET['email'];
  $gender = $_GET['gender'];
  $password = $_GET['password'];
  date_default_timezone_set('asia/manila');
  $date = date('m/d/Y');

  $sql = "INSERT INTO students (full_name, last_name, email, gender, password, date_added) VALUES (?, ?, ?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);

  $stmt->bind_param('ssssss', $fullName, $lastName, $email, $gender, $password, $date);

  $stmt->execute();

  header('location: ../login.php');

?>
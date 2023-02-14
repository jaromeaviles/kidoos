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
  date_default_timezone_set('asia/manila');
  $date = date('m/d/Y');

  $sql = "INSERT INTO students (full_name, last_name, email, gender, date_added) VALUES (?, ?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);

  $stmt->bind_param('sssss', $fullName, $lastName, $email, $gender, $date);

  $stmt->execute();

  echo header('location: ../students.php');

?>
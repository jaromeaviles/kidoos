<?php

  // Checks if logged in

  if (!isset($_SESSION)) {
    session_start();
  }

require '../connections/config.php';

$id = $_POST['id'];
$fullName = $_POST['fullName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$gender = $_POST['gender'];
date_default_timezone_set('asia/manila');
$date = date('m/d/Y');

$stmt = $conn->prepare("UPDATE students SET full_name = ?, last_name = ?, email = ?, gender = ?, date_added = ? WHERE student_id = ?");

$stmt->bind_param('sssssi', $fullName, $lastName, $email, $gender, $date, $id);

$stmt->execute();

header('location: ../view_details.php?stud_id=' . $id);

?>
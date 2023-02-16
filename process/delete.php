<?php

require '../connections/config.php';

$id = $_POST['id'];

$sql = "DELETE FROM students WHERE student_id = $id";

$conn->query($sql) or die($conn->error);

echo header('location: ../students.php');

?>
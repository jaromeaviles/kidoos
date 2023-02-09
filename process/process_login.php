<?php 

if (!isset($_SESSION)) {
    session_start();
}

require '../connections/config.php';

$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "SELECT * FROM access WHERE email = '$email' && password = '$pass'";


$result = $conn->query($sql) or die($conn->error);

$row = $result->fetch_assoc();

$registeredUser = $result->num_rows;

if ($registeredUser > 0) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['access'] = $row['access'];

    echo header('location: ../index.php');
} else {
    echo header('location: ../login.php');
}


?>
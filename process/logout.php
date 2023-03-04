<?php

if (!isset($_SESSION)) {
    session_start();
}

unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['user_type']);

header('location: ../index.php');

?>
<?php

if (!isset($_SESSION)) {
    session_start();
}

unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['access']);

header('location: ../index.php');

?>
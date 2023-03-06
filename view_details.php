<?php

if (!isset($_SESSION)) {
    session_start();
}



 //  Checks if logged in

 if (!isset($_SESSION['email'])) {
    header('location: login.php');
 }

 if (!isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) {
    header("location: index.php");
}

require_once 'partials/header.php';

  $studentId =  $_GET['stud_id'];

  $sql = "SELECT * FROM students WHERE student_id = $studentId";
  
  $result = $conn->query($sql) or die($conn->error);
  
  $students = $result->fetch_all(MYSQLI_ASSOC);

?>

<?php require 'partials/innerNav.php'; ?>


<main class="sub-pages">
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="inner-hero">
                <img src="dist/images/reading.jpg" alt="bonding">
            </div>
        </div>
    </div>
</div>

<div class="container profile">
    <div class="row">
        <div class="col-lg-6 img-cont">
            <img src="https://picsum.photos/200" class="img-thumbnail" alt="Placeholder Image">
        </div>
        <div class="col-lg-6">
            <?php foreach($students as $student) : ?>
            <h1 class="font-playfair-bold"><?= $student['full_name']?> <?= $student['last_name']?></h1>
            <p><?= $student['email']?></p>
            <p><?= $student['gender']?></p>
            <p>Registration Date: <?= $student['date_added']?></p>
            <div class="btn-container">
                <a href="edit_details.php?edit=<?= $student['student_id']; ?>" class='btn btn-primary custom-button'>
                    Edit</a>
                <form action="process/delete.php" method="post">
                    <input type="hidden" name="id" value="<?= $student['student_id']; ?>">
                    <button class='btn btn-danger'>Delete</button>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

</main>

<?php
    require_once 'partials/footer.php';
?>
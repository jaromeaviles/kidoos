<?php

// Checks if logged in

if (!isset($_SESSION)) {
    session_start();
}

require_once 'partials/header.php';

  $studentId =  $_GET['stud_id'];

  $sql = "SELECT * FROM students WHERE student_id = $studentId";

  $result = $conn->query($sql) or die($conn->error);

  $row = $result->fetch_assoc();

?>



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
            <p><strong>Student id:</strong> <?php echo $row['student_id']?></p>
        </div>
        <div class="col-lg-6">
            <h1><?php echo $row['full_name']?> <?php echo $row['last_name']?></h1>
            <p><?php echo $row['email']?></p>
            <p><?php echo $row['gender']?></p>
            <p><?php echo $row['date_added']?></p>
        </div>
    </div>
</div>

</main>

<?php
    require_once 'partials/footer.php';
?>
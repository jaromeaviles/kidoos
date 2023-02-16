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
        </div>
        <div class="col-lg-6">
            <h1 class="font-playfair-bold"><?php echo $row['full_name']?> <?php echo $row['last_name']?></h1>
            <p><?php echo $row['email']?></p>
            <p><?php echo $row['gender']?></p>
            <p>Last Update: <?php echo $row['date_added']?></p>
            <div class="btn-container">
                <a href="editDetails.php?edit=<?php echo $row['student_id']; ?>" class='btn btn-primary custom-button'>
                    Edit</a>
                <form action="process/delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['student_id']; ?>">
                    <button class='btn btn-danger'>Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

</main>

<?php
    require_once 'partials/footer.php';
?>
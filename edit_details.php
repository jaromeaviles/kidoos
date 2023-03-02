<?php
    require_once 'partials/header.php';

    $studentId =  $_GET['edit'];

    if (!$studentId) {
        header('location: index.php');
    }

    $sql = "SELECT * FROM students WHERE student_id = $studentId";

    $result = $conn->query($sql) or die($conn->error);

    $students = $result->fetch_all(MYSQLI_ASSOC);
?>

<?php require 'partials/innerNav.php'; ?>

<main class="sub-pages add-student">
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="inner-hero">
                <img src="dist/images/reading.jpg" alt="bonding">
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            
        <form action="process/update.php" method="post" id="edit">
        
        <div class="form-error">
            <p class="error-email">*Email must be in a valid email format (e.g., email@gmail or email@yahoo.com).</p>
        </div>

        <?php foreach($students as $student) : ?>
        <div class="mb-3">
            <input type="hidden" class="form-control" id="id" name="id" value="<?= $student['student_id']?>">
        </div>
        <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullName" name="fullName" value="<?= $student['full_name']?>">
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="<?= $student['last_name']?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $student['email']?>">
        </div>
        <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select" name="gender">
            <option>-- Select --</option>
            <option value="Male" <?php echo ($student['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo ($student['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
        </select>
        <?php endforeach; ?>
        </div>
            <button class="btn btn-primary custom-button">Update Record</button>
        </form>
        </div>
    </div>
</div>


</main>



<?php

    require_once 'partials/footer.php';

?>
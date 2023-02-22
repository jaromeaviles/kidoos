<?php
    require_once 'partials/header.php';
    require 'partials/innerMenu.php';

    //  Checks if logged in
    if (!isset($_SESSION['access'])) {
        echo header("location: index.php");
    }
?>

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
            
        <form action="process/processAddStud.php" method="get">
        <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullName" name="fullName">
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select" name="gender">
            <option>-- Select --</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        </div>
            <button class="btn btn-primary custom-button">Add Student</button>
        </form>
        </div>
    </div>
</div>


</main>



<?php

    require_once 'partials/footer.php';

?>
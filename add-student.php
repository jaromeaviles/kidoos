<?php 
    require_once 'partials/header.php';
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
            
        <form action="">
        <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullName">
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email">
        </div>
        <select class="form-select" name="gender">
            <option>-- Select --</option>
            <option value="1">Male</option>
            <option value="2">Female</option>
        </select>

            <button class="btn btn-primary custom-button">Add Student</button>
        </form>
        </div>
    </div>
</div>


</main>



<?php

    require_once 'partials/footer.php';

?>
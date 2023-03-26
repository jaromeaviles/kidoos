<?php
    require_once 'partials/header.php';
    require 'partials/innerNav.php';
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
            
        <form action="process/process_register.php" method="post" id="add">
        <div class="form-error">
            <p class="error-null">*Text fields must contain atleast 1 letter.</p>
            <p class="error-email">*Email must be in a valid email format (e.g., email@gmail or email@yahoo.com).</p>
            <p class="error-password-not-match">*Password and Retype Password not matched.</p>
        </div>
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
        <select class="form-select" name="gender" id="gender">
            <option>-- Select --</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
            <label for="retype-password" class="form-label">Retype Password</label>
            <input type="password" class="form-control" id="retypePassword" name="retype-password">
        </div>
            <button class="btn btn-primary custom-button">Register</button>
        </form>
        </div>
    </div>
</div>
</main>



<?php
    require_once 'partials/footer.php';
?>
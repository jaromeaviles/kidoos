<?php 

   if (!isset($_SESSION)) {
      session_start();
   }

   //  Checks if logged in
   if (!isset($_SESSION['access'])) {
        echo header("location: index.php");
   }

    require_once 'partials/header.php';

    $search =  $_GET['search'];

    $sql = "SELECT * FROM students WHERE full_name LIKE '%$search%'";

    $results = $conn->query($sql) or die($conn->error);

    $row = $results->fetch_assoc();

    $total = $results->num_rows;
?>

<?php require 'partials/innerMenu.php'; ?>

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

<!-- table -->

<div class="container student-record">
   <div class="row">
      <div class="col-12 record-data">
        <div class="record-container">
            <a href="addStudent.php" class="btn btn-primary custom-button">Add new</a>
            <form action="search.php" method="get">
               <input type="text" class="form-control" name="search" />
               <button class="btn btn-primary custom-button">Search</button>
            </form>
        </div>
      
        <!-- Checks if there is content -->
      <?php if ($total > 0) { ?>

      <table>
         <thead>
            <tr>
               <th scope="col">Full Name</th>
               <th scope="col">Last Name</th>
               <th scope="col">Email</th>
               <th scope="col">Gender</th>
               <?php if (isset($_SESSION['access'])) { ?>
                  <th scope="col"></th>
               <?php } ?>
            </tr>
         </thead>
         <tbody>
            <?php do { ?>
            <tr>
               <td data-label="Full Name"><?php echo $row['full_name']; ?></td>
               <td data-label="Last Name"><?php echo $row['last_name']; ?></td>
               <td data-label="Email"><?php echo $row['email']; ?></td>
               <td data-label="Gender"><?php echo $row['gender']; ?></td>
               <?php if (isset($_SESSION['access'])) { ?>
                  <td><a href="viewDetails.php?stud_id=<?php echo $row['student_id']; ?>" class="btn btn-link">View</a></td>
               <?php } ?>
            </tr>
            <?php } while($row = $results->fetch_assoc()); ?>
         </tbody>
      </table>
      
      <?php } else { ?>
         <div class="no-record">
            <h2>No Record Found.</h2>
         </div>
      <?php } ?>
      </div>
   </div>
</div>
</div>



</main>

<?php
    require_once 'partials/footer.php';
?>
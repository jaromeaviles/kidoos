<?php 

   if (!isset($_SESSION)) {
      session_start();
   }

   //  Checks if logged in
   if (!isset($_SESSION['access'])) {
        header("location: index.php");
   }

    require_once 'partials/header.php';

    $search =  $conn->real_escape_string($_GET['search']);

    $sql = "SELECT * FROM students WHERE full_name LIKE '%$search%'";

    $results = $conn->query($sql) or die($conn->error);

    $students = $results->fetch_all(MYSQLI_ASSOC);

    $total = $results->num_rows;
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

<!-- table -->

<div class="container student-record">
   <div class="row">
      <div class="col-12 record-data">
        <div class="record-container">
            <a href="add_student.php" class="btn btn-primary custom-button">Add new</a>
            <form action="search.php" method="get" class="searchForm">
               <input type="text" class="form-control" name="search" id="searchInput" />
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
            <?php foreach($students as $student) : ?>
            <tr>
               <td data-label="Full Name"><?php echo $student['full_name']; ?></td>
               <td data-label="Last Name"><?php echo $student['last_name']; ?></td>
               <td data-label="Email"><?php echo $student['email']; ?></td>
               <td data-label="Gender"><?php echo $student['gender']; ?></td>
               <?php if (isset($_SESSION['access'])) { ?>
                  <td><a href="view_details.php?stud_id=<?php echo $student['student_id']; ?>" class="btn btn-link view-record">View</a></td>
               <?php } ?>
            </tr>
            <?php endforeach; ?>
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
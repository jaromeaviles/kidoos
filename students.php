<?php 

   if (!isset($_SESSION)) {
      session_start();
   }

    require_once 'partials/header.php';

    $sql = 'SELECT * FROM students ORDER BY student_id DESC';

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
         <?php if (isset($_SESSION['access'])) { ?>
         <div class="record-container">
            <a href="add_student.php" class="btn btn-primary custom-button">Add new</a>
            <form action="search.php" method="get" class="searchForm">
               <input type="text" class="form-control" name="search" id="searchInput" />
               <button class="btn btn-primary custom-button">Search</button>
            </form>
         </div>
         <?php } ?>
           
      <!-- Checks if there is content -->
      <?php if ($total > 0) { ?>

      <table>
         <thead>
            <tr>
               <th scope="col">Full Name</th>
               <th scope="col">Last Name</th>
               <th scope="col">Email</th>
               <th scope="col">Gender</th>
               <?php if (isset($_SESSION['access'])) : ?>
                  <th scope="col"></th>
               <?php endif; ?>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($students as $student) :?>
            <tr>
               <td data-label="Full Name"><?= $student['full_name']; ?></td>
               <td data-label="Last Name"><?= $student['last_name']; ?></td>
               <td data-label="Email"><?= $student['email']; ?></td>
               <td data-label="Gender"><?= $student['gender']; ?></td>
               <?php if (isset($_SESSION['access'])) : ?>
                  <td><a href="view_details.php?stud_id=<?= $student['student_id']; ?>" class="btn btn-link view-record">View</a></td>
               <?php endif; ?>
            </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
      
      <?php } else { ?>
         <div class="no-record">
            <h2>No Record Found.</h2>
            <p>Let's try add one!</p>
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
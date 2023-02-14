<?php 

   if (!isset($_SESSION)) {
      session_start();
   }

   if ($_SESSION['access'] == 'admin') {

   

    require_once 'partials/header.php';

    $sql = 'SELECT * FROM students ORDER BY student_id DESC';

    $results = $conn->query($sql) or die($conn->error);

    $row = $results->fetch_assoc();

   } else {
      echo header('location: index.php');
   }

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

<!-- table -->

<div class="container student-record">
   <div class="row">
      <div class="col-12">
            <a href="addStudent.php" class="btn btn-primary custom-btn-green">Add new</a>
      <table>
         <thead>
            <tr>
               <th scope="col">Full Name</th>
               <th scope="col">Last Name</th>
               <th scope="col">Email</th>
               <th scope="col">Gender</th>
               <th scope="col"></th>
            </tr>
         </thead>
         <tbody>
            <?php do { ?>
            <tr>
               <td data-label="Full Name"><?php echo $row['full_name']; ?></td>
               <td data-label="Last Name"><?php echo $row['last_name']; ?></td>
               <td data-label="Email"><?php echo $row['email']; ?></td>
               <td data-label="Gender"><?php echo $row['gender']; ?></td>
               <td><a href="viewDetails.php?stud_id=<?php echo $row['student_id']; ?>">View</a></td>
            </tr>
            <?php } while($row = $results->fetch_assoc()); ?>
         </tbody>
      </table>
      </div>
   </div>
</div>
</div>



</main>

<?php
    require_once 'partials/footer.php';
?>
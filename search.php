<?php 

   if (!isset($_SESSION)) {
      session_start();
   }

   //  Checks if logged in
   if (!isset($_SESSION['email'])) {
      header("location: login.php");
   }

   // checks if admin

   if (!$_SESSION['user_type'] == 1) {
      header('location: index.php');
   }

   require_once 'partials/header.php';

   $search =  $conn->real_escape_string($_GET['search']);

    $limit = 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    $sql = "SELECT * FROM students WHERE full_name LIKE '%$search%' LIMIT " . $start . " , " . $limit;
    $results = $conn->query($sql) or die($conn->error);
    $students = $results->fetch_all(MYSQLI_ASSOC);

    $total = $results->num_rows;

   //  count students

   $sqlCount = "SELECT count(student_id) AS id FROM students WHERE full_name LIKE '%$search%'";
   $results1 = $conn->query($sqlCount) or die($conn->error);
   $studentCount = $results1->fetch_all(MYSQLI_ASSOC);
   $totalStudents = $studentCount[0]['id'];

   $pages = ceil($totalStudents / $limit);

   $previous = $page - 1;
   $next = $page + 1;
   
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
         <!-- checks if user is admin -->
         <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) : ?>
        <div class="record-container">
            <form action="search.php" method="get" class="searchForm">
               <input type="text" class="form-control" name="search" id="searchInput" />
               <button class="btn btn-primary custom-button">Search</button>
            </form>
        </div>
        <?php endif; ?>
      
        <!-- Checks if there is content -->
      <?php if ($total > 0) : ?>

      <table>
         <thead>
            <tr>
               <th scope="col">Full Name</th>
               <th scope="col">Last Name</th>
               <th scope="col">Email</th>
               <th scope="col">Gender</th>
               <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) : ?>
                  <th scope="col"></th>
               <?php endif; ?>
            </tr>
         </thead>
         <tbody>
            <?php foreach($students as $student) : ?>
            <tr>
               <td data-label="Full Name"><?php echo $student['full_name']; ?></td>
               <td data-label="Last Name"><?php echo $student['last_name']; ?></td>
               <td data-label="Email"><?php echo $student['email']; ?></td>
               <td data-label="Gender"><?php echo $student['gender']; ?></td>
               <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) : ?>
                  <td><a href="view_details.php?stud_id=<?php echo $student['student_id']; ?>" class="btn btn-link view-record">View</a></td>
               <?php endif; ?>
            </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
      
      <?php else : ?>
         <div class="no-record">
            <h2>No Record Found.</h2>
         </div>
      <?php endif; ?>
      </div>
   </div>

    <!-- Pagination -->

<nav aria-label="Page navigation">
  <ul class="pagination">
    <li class="page-item">
      <?php if ($page > 1) : ?>
      <a class="page-link" href="<?= "search.php?search=$search&page=$previous"; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
      <?php else : ?>
      <a class="page-link disabled-button" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
      <?php endif; ?>
    </li>
    <?php for($i = 1; $i <= $pages; $i++) : ?>
      <li class="page-item"><a class="page-link" href="<?= "search.php?search=$search&page=$i"; ?>"><?= $i; ?></a></li>
    <?php endfor; ?>
    <li class="page-item">
    <?php if ($page < $pages) : ?>
      <a class="page-link" href="<?= "search.php?search=$search&page=$next"; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
   <?php else : ?>
      <a class="page-link disabled-button" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
   <?php endif; ?>
    </li>
  </ul>
</nav>
</div>
</div>



</main>

<?php
    require_once 'partials/footer.php';
?>
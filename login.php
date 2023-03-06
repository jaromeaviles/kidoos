<?php 

require_once 'partials/header_transparent.php';

if (isset($_POST['login'])) {

$email = $conn->real_escape_string($_POST['email']);
$pass = $conn->real_escape_string($_POST['password']);

$sql = "SELECT * FROM students WHERE email = '$email' && password = '$pass'";

$result = $conn->query($sql) or die($conn->error);

$row = $result->fetch_assoc();

$registeredUser = $result->num_rows;

if ($registeredUser > 0) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['user_type'] = $row['user_type'];

    header('location: index.php');

} else {
	header("location: login.php?msg=login_error");
}

}

?>

<main class="signin">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-12">
				<div class="hero-banner">
					<img src="dist/images/class.jpg" alt="class" />
					
					<div class="form-overlay">
						
						<!-- Error -->
						<div class="login-error">
							<p>Email or Password invalid</p>
						</div>

						<h1 class="color-white font-playfair-bold">Kidoos</h1>
						<form id="login" action="login.php" method="post">
							<div class="mb-3">
								<input type="email" class="form-control" name="email" id="email" placeholder="Email" />
							</div>
							<div class="mb-3">
								<input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                                <label class="color-white no-account">Don't have an account? Click <a href="register.php" class="font-raleway-bold color-white">here</a></label>
							</div>
                            
							<button type="submit" class="btn btn-primary custom-button" name="login">Login</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php
    require_once 'partials/footer.php';
?>
<?php 

require_once 'partials/header-transparent.php';

if (isset($_POST['login'])) {

$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "SELECT * FROM access WHERE email = '$email' && password = '$pass'";

$result = $conn->query($sql) or die($conn->error);

$row = $result->fetch_assoc();

$registeredUser = $result->num_rows;

if ($registeredUser > 0) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['access'] = $row['access'];

    echo header('location: index.php');

} else {
	echo header("location: login.php?msg=login_error");
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
						<h1 class="color-white font-playfair-bold">Kidoos</h1>
						<form action="login.php" method="post">
							<div class="mb-3">
								<input type="email" class="form-control" name="email" id="email" placeholder="Email" />
								<div class="errors">
									<p class="error-no-input">Please input your email</p>
									<p class="error-invalid-format">Email Invalid format</p>
									<?php if (isset($_GET['msg']) && $_GET['msg'] == 'login_error') { ?>
										<p class="error-invalid-creds">Email/Password Invalid</p>
									<?php } ?>
								</div>
							</div>
							<div class="mb-3">
								<input type="password" class="form-control" name="password" id="password" placeholder="Password" />
								<div class="errors">
									<p class="error-no-input">Please input your password</p>
									<p class="error-invalid-format">Password must contain min of 8 characters, at least one letter, one number and one special character</p>
									<?php if (isset($_GET['msg']) && $_GET['msg'] == 'login-error') { ?>
										<p class="error-invalid-creds">Email/Password Invalid</p>
									<?php } ?>
								</div>
                                <label class="color-white no-account">Don't have an account? Click <a href="#" class="font-raleway-bold color-white">here</a></label>
							</div>
                            
							<button type="submit" class="btn btn-primary custom-button" name="login">login</button>
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
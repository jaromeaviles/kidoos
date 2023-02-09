<?php 
    require_once 'partials/header.php';
?>

<main class="signin">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-12">
				<div class="hero-banner">
					<img src="dist/images/class.jpg" alt="class" />
					<div class="form-overlay">
						<h1 class="color-white font-playfair-bold">Kidoos</h1>
						<form action="process/process_login.php" method="post">
							<div class="mb-3">
								<input type="email" class="form-control" name="email" id="email" placeholder="Email" />
							</div>
							<div class="mb-3">
								<input type="password" class="form-control" name="password" id="password" placeholder="password" />
                                <label class="color-white no-account">Don't have an account? Click <a href="#" class="font-raleway-bold color-white">here</a></label>
							</div>
                            
							<button type="submit" class="btn btn-primary custom-button">login</button>
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
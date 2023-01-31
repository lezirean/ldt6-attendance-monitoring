<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- Bootstrap 5 CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<!-- CSS file -->
	<link rel="stylesheet" href="../css/login-page.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

	<style type="text/css">
		.error {
		   background: #F2DEDE;
		   color: #A94442;
		   padding: 10px;
		   width: 95%;
		   border-radius: 5px;
		   margin: 20px auto;
		}
	</style>
	<title>LDT6 Login</title>
</head>

<body>
	<div class="login">
		<h1 class="text-center">Employee Login</h1>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
		<form class="needs-validation" action="login.php" method="POST">
			<div class="form-group was-validated">
				<label class="form-label" for="emp-id">Employee ID</label>
				<input class="form-control" type="text" id="emp-id" name="emp-id" required>
				<div class="invalid-feedback">
					<small>This field cannot be empty.</small>
				</div>
			</div>

			<div class="form-group was-validated">
				<label class="form-label" for="password">Password</label>
				<input class="form-control" type="password" id="password" name="password" required>
				<div class="invalid-feedback">
					<small>This field cannot be empty.</small>
				</div>
			</div>

			<input class="btn btn-success w-100" type="submit" value="Log in">
		</form>
	</div>
	
</body>
</html>
<?php

	if (isset($_POST['signup'])) {
		
		$msg = '';
		$msgClass = '';

		if (!empty($_POST['fullname']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['pass1']) && !empty($_POST['pass2'])) {

			if ($_POST['pass1'] == $_POST['pass2']) {

				$fullname = $_POST['fullname'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				
				$password = $_POST['pass1'];

				$conn = mysqli_connect('localhost', 'root', 'admin2019', 'ajo') or die('Unable to connect');

				$sql = "INSERT INTO admins (Fullname, Phone_Number, Email, Password) VALUES ('$fullname', '$phone', '$email', '$password')";

				$result = mysqli_query($conn, $sql) or die('Unable to write to database');

				mysqli_close($conn);

				session_start();

				$_SESSION['fullname'] = $fullname;

				header('Location: landing.php');
			
			} else {
				
				$msg = 'Password Mismatch! Try Again';
				$msgClass = 'alert alert-danger';
			
			};

		} else {

			$msg = 'Please fill all fields';
			$msgClass = 'alert alert-danger';
		
		};

	};

?>
<html lang="en">
<head>
	<title>AJO</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <!--https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="container-fluid">
	<div class="row">
		<div class="col-lg-6"></div>
		<div class="col-lg-4">
			<div class="jumbotron" style="margin-top: 10%; margin-bottom: 10%;">
				<div class="jumbotron">
					<h2 class="page-header">Sign Up</h2>
					<?php if(isset($msg)) : ; ?>
						<p class="<?php echo $msgClass; ?>"><?php echo $msg; ?></p>
					<?php endif; ?>
				</div>
				<div class="jumbotron">
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<div class="form-group">
							<label for="fullname">Fullname</label>
							<input type="text" name="fullname" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="phone">Phone Number</label>
							<input type="number" name="phone" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="pass1">Password</label>
							<input type="password" name="pass1" class="form-control" required minlength="6">
						</div>
						<div class="form-group">
							<label for="pass2">Confirm Password</label>
							<input type="password" name="pass2" class="form-control" required minlength="6">
						</div>
						<div class="form-group">
							<input type="submit" name="signup" class="form-control btn btn-success" value="SIGN UP">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-2"></div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
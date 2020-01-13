<?php include 'header.php'; ?>
<?php
	
	$msg = '';
	$msgClass = '';

	$conn = mysqli_connect('localhost', 'root', 'admin2019', 'ajo') or die('<p class="alert alert-danger">Cannot connect to database</p>');
	
	if (isset($_POST['register'])) {

		if (!empty($_POST['fullname']) && !empty($_POST['birth']) && !empty($_POST['gender']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['amount']) && !empty($_POST['group'])) {
			
			$fullname = $_POST['fullname'];
			$birth = $_POST['birth'];
			$gender = $_POST['gender'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$amount = $_POST['amount'];
			$group = $_POST['group'];

			$sql = "INSERT INTO members (Fullname, Date_Of_Birth, Gender, Email, Phone_Number, Amount, Group_Name) VALUES ('$fullname', '$birth', '$gender', '$email', '$phone', '$amount', '$group')";

			$result = mysqli_query($conn, $sql) or die('<p class="alert alert-danger">Cannot write to database</p>');

			header('Location: members.php');

		};

	};

	$query = "SELECT Group_Name FROM groups";

	$data = mysqli_query($conn, $query);

  	$slots = mysqli_fetch_all($data, MYSQLI_ASSOC);

  	mysqli_free_result($data);

	mysqli_close($conn);

?>
<div class="jumbotron">
	<?php if (isset($msg)) : ; ?>
		<p class="<?php echo $msgClass; ?>"><?php echo $msg; ?></p>
	<?php endif; ?>
	<div class="jumbotron">
		<h2 class="page-header">New Member</h2>
	</div>
	<div class="jumbotron">
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="fullname">Fullname</label>
						<input type="text" name="fullname" class="form-control" required>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="row">
						<div class="form-group col-lg-6 mt-0">
							<label for="birth">Date Of Birth</label>
							<input type="date" name="birth" class="form-control" required>
						</div>
						<div class="form-group col-lg-6 mt-0">
							<label for="gender">Gender</label>
							<select class="form-control" required name="gender">
								<option value=""></option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" required>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="row">
						<div class="form-group col-lg-6 mt-0">
							<label for="phone">Phone Number</label>
							<input type="number" name="phone" class="form-control" minlength="11" maxlength="11" required>
						</div>
						<div class="form-group col-lg-6 mt-0">
							<label for="amount">Amount</label>
							<input type="number" name="amount" class="form-control">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="group">Add To Group</label>
						<select class="form-control" required name="group">
							<option></option>
							<?php foreach($slots as $slot) : ; ?>
								<option value="<?php echo $slot['Group_Name']; ?>"><?php echo $slot['Group_Name']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="col-lg-6"></div>
			</div>
			<input type="submit" name="register" class="form-control btn btn-success" value="REGISTER">
		</form>
	</div>
</div>
<?php include 'footer.php'; ?>
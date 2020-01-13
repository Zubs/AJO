<?php include 'header.php'; ?>
<?php

  $conn = mysqli_connect('localhost', 'root', 'admin2019', 'ajo') or die('<p class="alert alert-danger">Cannot connect to database</p>');

  if (isset($_POST['delete'])) {

  	$delete_id = $_POST['delete_id'];

  	$query = "DELETE FROM members WHERE ID = {$delete_id}";

  	if (mysqli_query($conn, $query)) {
  		header('Location: members.php');
  	};
  };

  $id = mysqli_real_escape_string($conn, $_GET['id']);

  $sql = 'SELECT * FROM members WHERE ID = '.$id;

  $result = mysqli_query($conn, $sql) or die('<p class="alert alert-danger">Cannot write to database</p>');

  $members = mysqli_fetch_assoc($result);

  mysqli_free_result($result);

  mysqli_close($conn);

?>

<div class="container jumbotron">
	<div class="jumbotron">
		<h2 class="page-header"><?php echo $members['Fullname']; ?><span style="float: right;"><?php echo $members['ID']; ?></span></h2>
	</div>
	<div class="jumbotron">
		<table class="table">
			<tr>
				<th scope="col">Phone Number</th>
				<td>0<?php echo $members['Phone_Number']; ?></td>
			</tr>
			<tr>
				<th scope="col">Date Of Birth</th>
				<td><?php echo $members['Date_Of_Birth']; ?></td>
			</tr>
			<tr>
				<th scope="col">Email</th>
				<td><?php echo $members['Email']; ?></td>
			</tr>
			<tr>
				<th scope="col">Gender</th>
				<td><?php echo $members['Gender']; ?></td>
			</tr>
			<tr>
				<th scope="col">Amount</th>
				<td><?php echo $members['Amount']; ?></td>
			</tr>
			<tr>
				<th scope="col">Group Name</th>
				<td><?php echo $members['Group_Name']; ?></td>
			</tr>
			<tr>
				<th scope="col">Payments</th>
				<td><?php echo $members['Payments']; ?></td>
			</tr>
		</table>
		<button class="btn btn-success">Edit User</button>
		<form style="float: right;" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="hidden" name="delete_id" value="<?php echo $members['ID']; ?>">
			<button class="btn btn-danger" name="delete" id="delete">Delete Member</button>
		</form>
	</div>
</div>
<script src="jquery-3.4.1.js"></script>
<script>
	$(function() {
		$('#delete').on('click', function(e) {
			var choice = confirm('Are you sure you want to delete record?');
			if (choice != true) {
				e.preventDefault()
			}
		})
	})
</script>
<?php include 'footer.php'; ?>
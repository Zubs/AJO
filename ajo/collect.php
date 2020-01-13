<?php include 'header.php'; ?>
<?php

  $conn = mysqli_connect('localhost', 'root', 'admin2019', 'ajo') or die('<p class="alert alert-danger">Cannot connect to database</p>');

  if (mysqli_connect_errno()) {
    die(mysqli_connect_errno());
  }

  $sql = "SELECT * FROM members ORDER BY Fullname DESC";

  $result = mysqli_query($conn, $sql) or die('<p class="alert alert-danger">Cannot write to database</p>');

  $members = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);

  if (isset($_POST['collect'])) {
  	
  	$id = $_POST['collect_id'];

  	$query = "SELECT Payments FROM members WHERE ID = {$id}";

  	$answer = mysqli_query($conn, $query);

  	$user = mysqli_fetch_assoc($answer);

  	mysqli_free_result($answer);

  	$user['Payments'] = 0;

  	$query2 = "UPDATE members SET Payments = {$user['Payments']} WHERE ID = {$id}";

  	$answer2 = mysqli_query($conn, $query2);

  	header('Location: collect.php');

  }

  mysqli_close($conn);

?>
<div class="jumbotron">
	<div class="jumbotron">
		<h2 class="page-header">Collect Payments</h2>
	</div>
	<div class="jumbotron">
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="row">ID</th>
					<th scope="row">Fullname</th>
					<th scope="row">Amount</th>
					<th scope="row">Days Contributed</th>
					<th scope="row">Total Savings</th>
					<th scope="row">Total Collectable Savings</th>
					<th scope="row"><th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($members as $person) : ; ?>
					<tr>
						<td><?php echo $person['ID']; ?></td>
						<td><?php echo $person['Fullname']; ?></td>
						<td><?php echo $person['Amount']; ?></td>
						<td><?php echo $person['Payments'] / $person['Amount']; ?></td>
						<td><?php echo $person['Payments']; ?></td>
						<td>
							<?php if($person['Payments'] > 0) : ; ?>
								<?php echo $person['Payments'] - $person['Amount']; ?>
							<?php else : ; ?>
								<?php echo 0; ?>
							<?php endif; ?>
						</td>
						<td>
							<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
								<input type="hidden" name="collect_id" value="<?php echo $person['ID']; ?>">
								<button class="btn btn-danger form-control" name="collect" id="Collect">Collect Savings</button>
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>	
		</table>
	</div>
</div>
<script src="jquery-3.4.1.js"></script>
<script>
	$(function() {
		$('button').on('click', function(e) {
			var choice = confirm('Are You Sure You Want To Collect Savings');
			if (choice == true) {
				alert('Collection Successful');
			} else {
				alert('Collection Cancelled');
				e.preventDefault();
			}
		})
	})
</script>
<?php include 'footer.php'; ?>
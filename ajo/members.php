<?php include 'header.php'; ?>
<?php

  $conn = mysqli_connect('localhost', 'root', 'admin2019', 'ajo') or die('<p class="alert alert-danger">Cannot connect to database</p>');

  if (mysqli_connect_errno()) {
    die(mysqli_connect_errno());
  }

  $sql = "SELECT * FROM members ORDER BY Fullname ASC";

  $result = mysqli_query($conn, $sql) or die('<p class="alert alert-danger">Cannot write to database</p>');

  $members = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);

  mysqli_close($conn);

?>
<div class="jumbotron">
	<div class="jumbotron">
		<h2 class="page-header">Members<span style="float: right;"><input type="search" name="search" id="Search" placeholder="Search Table" class="form-control"></span></h2>
	</div>
	<div class="jumbotron">
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Fullname</th>
					<th scope="col">Gender</th>
					<th scope="col">Amount</th>
					<th scope="col">Total Savings</th>
					<th scope="col">Group Name</th>
					<th scope="col">Profiles</th>
					<th scope="col">Payments</th>
				</tr>
			</thead>
			<tbody id="members">
				<?php foreach($members as $member) : ; ?>
					<tr>
						<th scope="row"><?php echo $member['ID']; ?></th>
						<td><?php echo $member['Fullname']; ?></td>
						<td><?php echo $member['Gender']; ?></td>
						<td><?php echo $member['Amount']; ?></td>
						<td><?php echo $member['Payments']; ?></td>
						<td><?php echo $member['Group_Name']; ?></td>
						<td><a href="profile.php?id=<?php echo $member['ID']; ?>"><button class="btn btn-success">View Profile</button></a></td>
						<td><a href="pay.php?id=<?php echo $member['ID']; ?>"><button class="btn btn-success">Pay</button></a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<button class="btn btn-success" id="stats">Show Table Stats</button>
	</div>
	<div class="stats"></div>
</div>
<script src="jquery-3.4.1.js"></script>
<script>
	$(function() {
		$('#stats').on('click', function() {
			$('.stats').addClass('jumbotron')
					   .html('<h3>Table Stats</h3>')
					   .append('<table class="table">')
					   .append('<tr><td>Bot</td><td>Girl</td></tr>')
					   .append('</table>')
		;})
		$('#Search').keyup(function() {
				search_table($(this).val());
			});

			function search_table(value) {
				$('#members tr').each(function() {
					var found = 'false';
					$(this).each(function() {
						if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) 
						{
							found = 'true';
						}
					});
					if (found == 'true') {
						$(this).show();
					} else {
						$(this).hide();
					}
				});
			}
	})
</script>
<?php include 'footer.php'; ?>
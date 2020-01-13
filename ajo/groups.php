<?php include 'header.php'; ?>
<?php

  $conn = mysqli_connect('localhost', 'root', 'admin2019', 'ajo') or die('<p class="alert alert-danger">Cannot connect to database</p>');

  if (mysqli_connect_errno()) {
    die(mysqli_connect_errno());
  }

  $sql = "SELECT DISTINCT Group_Name FROM members ORDER BY Group_Name DESC";

  $result = mysqli_query($conn, $sql) or die('<p class="alert alert-danger">Cannot write to database</p>');

  $groups = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);

  mysqli_close($conn);

?>
<div class="jumbotron">
	<div class="jumbotron">
		<h2 class="page-header">Groups</h2>
	</div>
	<div class="jumbotron">
		<ul class="list-group">
			<?php foreach($groups as $group) : ; ?>
				<li class="list-group-item d-flex justify-content-between align-items-center"><?php echo $group['Group_Name']; ?><span class="badge badge-primary badge-pill"><?php echo count($groups); ?></span></li>
			<?php endforeach; ?>
  		</ul>
	</div>
</div>
<?php include 'footer.php'; ?>
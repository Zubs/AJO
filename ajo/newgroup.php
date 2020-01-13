<?php include 'header.php'; ?>
<?php

	$conn = mysqli_connect('localhost', 'root', 'admin2019', 'ajo');

	if (mysqli_connect_errno()) {
    die(mysqli_connect_errno());
  	}

  	if (isset($_POST['newgroup'])) {
  		
  		if (!empty($_POST['groupname']) && !empty($_POST['location'])) {
  			
  			$groupname = $_POST['groupname'];
  			$location = $_POST['location'];
  			$desc = $_POST['description'];

  			if (empty($desc)) {
  				$desc = 'No description';
  			}

  			$query = "INSERT INTO groups (Group_Name, Location) VALUES ('$groupname', '$location')";

  			if (mysqli_query($conn, $query)) {
  				
  				header('Location: groups.php');

  			} else {
  				echo "Unable to add data";
  			};

  		};

  	};

  	$sql = "SELECT * FROM states";

  	$result = mysqli_query($conn, $sql);

  	$states = mysqli_fetch_all($result, MYSQLI_ASSOC);

  	mysqli_free_result($result);

  	mysqli_close($conn);

?>
<div class="jumbotron">
	<div class="jumbotron">
		<h2 class="page-header">New Group</h2>
	</div>
	<div class="jumbotron">
		<form method="POST" action="#">
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="groupname">Group Name</label>
						<input type="text" name="groupname" class="form-control" required>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label for="location">Location</label>
						<select name="location" class="form-control" required>
							<option value=""></option>
							<?php foreach($states as $state) : ; ?>
								<option value="<?php echo $state['states']; ?>"><?php echo $state['states']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="description">Description (Optional)</label>
				<textarea class="form-control" name="description"></textarea>
			</div>
			<input type="submit" name="newgroup" value="CREATE GROUP" class="form-control btn btn-success">
		</form>
	</div>
</div>
<?php include 'footer.php'; ?>
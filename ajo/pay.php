<?php include 'header.php'; ?>
<?php

  $conn = mysqli_connect('localhost', 'root', 'admin2019', 'ajo') or die('<p class="alert alert-danger">Cannot connect to database</p>');

  if (isset($_POST['pay'])) {
  	$pay_id = $_POST['pay_id'];

  	$query = "SELECT Payments, Amount FROM members WHERE ID = {$pay_id}";

  	if (mysqli_query($conn, $query)) {

  		$answer = mysqli_query($conn, $query);

  		$payments = mysqli_fetch_assoc($answer);

  		mysqli_free_result($answer);

  		$payments['Payments'] = $payments['Amount'] + $payments['Payments'];

  		echo $payments['Payments'];

  		$query2 = "UPDATE members SET Payments = {$payments['Payments']} WHERE ID = {$pay_id}";

  		$answer2 = mysqli_query($conn, $query2);

  		header('Location: members.php');
  	};

  };

  if (isset($_POST['collect'])) {
  	
  	header('Location: collect.php');

  }

  $id = mysqli_real_escape_string($conn, $_GET['id']);

  $sql = 'SELECT * FROM members WHERE ID = '.$id;

  $result = mysqli_query($conn, $sql) or die('I am dead');

  $members = mysqli_fetch_assoc($result);

  mysqli_free_result($result);

  mysqli_close($conn);

?>
<div class="jumbotron">
	<div class="jumbotron">
		<h2 class="page-header"><?php echo $members['Fullname']; ?><span style="float: right;"><?php echo $members['ID']; ?></span></h2>
	</div>
	<div class="jumbotron">
		<?php

			$days = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30,];

		?>
		<div class="row">
		<?php foreach($days as $day) : ; ?>
			<?php $count = $members['Payments'] / $members['Amount']; ?>
			<div class="col-lg-1 jumbotron" style="background-color: <?php ($day <= $count) ? "red" : "inherit"; ?>;"><h3 id="<?php echo $day; ?>"><?php echo $day; ?></h3></div>
		<?php endforeach; ?></div>
		<form method="POST" style="float: right;" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="hidden" name="collect_id" value="<?php echo $members['ID']; ?>">
			<button class="btn btn-danger" id="collect" name="collect">Collect Payments</button>
		</form>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="hidden" name="pay_id" value="<?php echo $members['ID']; ?>">
			<button class="btn btn-success" id="pay" name="pay">Pay</button>
		</form>
	</div>
</div>
<script src="jquery-3.4.1.js"></script>
<script>
	$(function() {
		$('#pay').on('click', function(e) {
			var choice = confirm('Are You Sure You Want To Make Payment?');
			if (choice == true) {
				alert('Payment Successful');
			} else {
				alert('Payment Cancelled');
				e.preventDefault();
			}
		})
	})
</script>
<?php include 'footer.php'; ?>
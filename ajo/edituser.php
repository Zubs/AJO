<?php include 'header.php'; ?>
<?php

	$conn = mysqli_connect('localhost', 'root', 'admin2019', 'blog') or die('Cannot access database');

	$sql = "DELETE FROM `posts` WHERE ID > 33";

	$result = mysqli_query($conn, $sql);

	mysqli_close($conn);

?>
<div class="container jumbotron">
	<h2 class="page-header">Delete Posts</h2>
</div>
<div class="container jumbotron">
	<h3>Post title <span style="float: right;">#id</span><br><small>by Post author</small>, <small>post date</small></h3>
	<p>dbd dwehwewuweuhewuleleleeveveuuleueueeuveelllllllllllllllllllllllllllllllllllllllllllllllllllllllllluuu</p>
</div><!--
<?php 
	session_start();

	$posts = $_SESSION['posts']; 
?>
<div class="jumbotron container">
	<h2 class="page-header">Delete Post</h2>
	<?php foreach($posts as $post) : ?>
		<table>
			<tr>
				<td>Title</td>
				<td><?php echo $post['Title']; ?></td>
			</tr>
		</table>
	<?php endforeach; ?>
</div>
<?php include 'footer.php'; ?>
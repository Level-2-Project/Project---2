<?php 
include '../Project/includes/header.php';

session_start();

$read_query = "SELECT a.`user_id`, a.`name`, b.`created_at`, b.`deleted_at`, b.`text` FROM `users` a JOIN posts b ON a.`user_id`= b.user_id WHERE b.`deleted_at` IS NULL";

$result = mysqli_query( $conn, $read_query );

if( mysqli_num_rows( $result ) > 0 ){

	?>
	<h1>Facebook Posts<span><a href="post.php" class="btn btn-info <?=(!isset($_SESSION['user_id'])) 
		? 'disabled' : ''  ?>" >Create Post</a></span></h1>

	<form action="index.php" method="get" accept-charset="utf-8">
		<input type="text" name="filter" value='' placeholder="Enter Keyword">
		<input type="submit" name="submit" value="Apply">
	</form>

	<table  class="table table-striped">
		<tr>
			<td>#</td>
			<td>Author</td>
			<td>Text</td>
			<td>Date</td>
			<td>Comment</td>
		</tr>
		<?php
		$num = 1;
		while( $row = mysqli_fetch_assoc( $result ) ){
			?>
			<tr>
				<td><?= $num ++ ?></td>
				<td><?= $row['name']?></td>	
				<td><?= $row['text']?></td>	
				<td><?= $row['created_at']?></td>
				<td><a href="update.php?id=<?= $row['product_id']?>" class="btn btn-warning">Comment</a></td>
			</tr>
			<?php
		}
		?>
	</table>

	<a href="recycle_bin.php">Recycle Bin</a>
	<?php

} else {
	die('Query failed!' . mysqli_error($conn));
}
?>
<?php 
include '../Project/includes/footer.php';
?>
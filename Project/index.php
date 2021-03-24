<?php 
include '../Project/includes/header.php';

// $filter_query = '';

// if(isset($_GET['filter'])){

// $filter_query = " AND p.product_name LIKE '%".$_GET['filter']."%' OR p.product_calories LIKE '%".$_GET['filter']."%'";
// }

//1
// $read_query = "SELECT `product_id`, `product_name`,`product_price`, `product_calories` FROM `products` WHERE date_deleted IS NULL";
$read_query = "SELECT a.`user_id`, a.`name`, b.`created_at`, b.`deleted_at`, b.`text` FROM `users` a JOIN posts b ON a.`user_id`= b.user_id WHERE b.`deleted_at` IS NULL";


//2 columns 2 table - same name
// $read_query = "SELECT p.`product_id`, p.product_name,pc.date_deleted, p.date_deleted as product_date_deleted, pc.product_category_name FROM `products` p LEFT JOIN product_categories pc ON p.`product_category_id`=pc.product_category_id";

$result = mysqli_query( $conn, $read_query );

//var_dump( $result );

if( mysqli_num_rows( $result ) > 0 ){

	?>
	<h1>Facebook Posts<span><a href="create.php" class="btn btn-info">Create Post</a></span></h1>

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
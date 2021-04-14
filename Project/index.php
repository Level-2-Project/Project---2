<?php 
include '../Project/includes/header.php';

session_start();

$results_per_page = 10;

if(isset($_GET['page'])){
	$page = $_GET['page'];
}
else{
	$page = 1;
}

$get_total_records_query = "SELECT COUNT(post_id) AS count FROM posts a WHERE deleted_at IS NULL";      

$result_pages = mysqli_query($conn,$get_total_records_query);

$total_rows = mysqli_fetch_array($result_pages);

$total_rows = $total_rows[0];

$offset = ($page-1) * $results_per_page;

$pagination_string = '';

if($total_rows > $results_per_page){
	$pagination_string = "ORDER BY created_at ASC LIMIT $results_per_page OFFSET $offset";
}

$max_pages = ceil($total_rows/$results_per_page);

$read_query = "SELECT a.`user_id`, a.`name`, b.`created_at`, b.`deleted_at`, b.`text`, b.`image`, b.`post_id`, COUNT(c.like_id) AS countlikes FROM `users` a JOIN posts b ON a.`user_id`= b.user_id LEFT JOIN posts_likes c ON b.post_id = c.post_id WHERE b.deleted_at IS NULL  GROUP BY b.post_id $pagination_string";

$likes_read_query = "SELECT `user_id`, `post_id` FROM `posts_likes`";

$result_likes = mysqli_query( $conn, $likes_read_query );

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
			<td>Image</td>
			<td>Date</td>
			<td>Comment</td>
			<td>Delete</td>	
		</tr>
		<?php
		$num = 1;

		while( $row = mysqli_fetch_assoc( $result ) ){
			//$button_post_id = $row['post_id'];
			//$likes_num = $row['NumberOfLikes'];
			?>
			<tr>
				<td><?= $num ++ ?></td>
				<td><?= $row['name']?></td>	
				<td><?= $row['text']?></td>
				<td>
					<?php if( !empty( $row['image']) && ($row['image'] != 'uploads/posts_uploads/') ) : ?>
						<img src="<?= $row['image'] ?>" width="200">
					<?php endif; ?>
				</td>	
				<td>
					<?= $row['created_at']?>
					<?= $row['countlikes']?>
					<a href="like.php?id=<?= $row['post_id']?>" class=" btn  <?=(!isset($_SESSION['user_id'])) ? 'disabled' : ''  ?>" >
					<i class="fa fa-thumbs-o-up" style="color:blue" aria-hidden="true"></i></a>
				</td>
				<td><a href="comments.php?id=<?= $row['post_id']?>" class="btn btn-warning <?=(!isset($_SESSION['user_id'])) ? 'disabled' : ''  ?>" >Comment</a>&nbsp
					<a href="comments_view.php?id=<?= $row['post_id']?>" class="btn btn-warning" >View Comment</a>
				</td>
				<td><a href="delete.php?id=<?= $row['post_id']?>" class="btn btn-danger <?=(!isset($_SESSION['user_id'])) ? 'disabled' : ''  ?>">Delete</a></td>	
			</tr>
			<?php
		}
		?>
	</table>

	<p>
		<?php

$filters_link_for_pagination = '';

			if($page > 1){
				echo "<a class='btn btn-primary btn-sm ".(($page == 1) ? 'disabled' : '')."' href='index.php?page=".($page-1).$filters_link_for_pagination."'><i class='fa fa-arrow-left' aria-hidden='true'></i> Previous</a>";
			}
			else{
				echo "<a class='btn btn-primary btn-sm ".(($page == 1) ? 'disabled' : '')."' href='index.php?page=1".$filters_link_for_pagination."'><i class='fa fa-arrow-left' aria-hidden='true'></i> Previous</a>";
			}
		?>

		<?php

		for($i=1; $i <= $max_pages; $i++){

			echo "<a href='index.php?page=$i".$filters_link_for_pagination."'>$i</a>";
		}

		?>

		<a class="btn btn-sm btn-primary <?= ($page >= $max_pages) ? 'disabled' : '' ?>" href="index.php?page=<?= ($page < $max_pages) ? (($page+1).$filters_link_for_pagination) : $page.$filters_link_for_pagination ?>">Next <i class='fa fa-arrow-right' aria-hidden='true'></i></a>

	</p>

	<a href="recycle_bin.php">Recycle Bin</a>
	<?php

} else {
	die('Query failed!' . mysqli_error($conn));
}
?>
<?php 
include '../Project/includes/footer.php';
?>
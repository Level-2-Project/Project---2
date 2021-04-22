<?php 
include '../Project/includes/header.php';

$post_id = $_GET['id'];

$read_query = "SELECT a.`user_id`, a.`name`, b.`created_at`, b.`deleted_at`, b.`text`, b.`image`, c.`post_id` FROM `users` a JOIN posts b ON a.`user_id`= b.user_id JOIN comments c ON b.`post_id`= c.post_id WHERE b.`deleted_at` IS NULL AND c.`post_id` = $post_id";

$read_query_co = "SELECT a.`user_id`, a.`name`, c.`user_id`, c.`post_id`, c.`comment_image`, c.`comment_text`, c.`comment_created`, c.`comment_deleated` FROM `users` a JOIN comments c ON a.`user_id`= c.user_id WHERE c.`comment_deleated` IS NULL AND c.`post_id` = $post_id";

$result = mysqli_query( $conn, $read_query );
$result_comments = mysqli_query( $conn, $read_query_co );

if( mysqli_num_rows( $result ) > 0 ){

?>
    <h1>Post</h1>
	<table  class="table table-striped">
		<tr>
			<td>Author</td>
			<td>Text</td>
			<td>Image</td>
			<td>Date</td>
			<td></td>
		</tr>
		<?php

		 $row = mysqli_fetch_assoc( $result );
			?>
			<tr>
				<td><?= $row['name']?></td>	
				<td><?= $row['text']?></td>
				<td>
					<?php if( !empty( $row['image']) && ($row['image'] != 'uploads/posts_uploads/') ) : ?>
						<img src="<?= $row['image'] ?>" width="200">
					<?php endif; ?>
				</td>	
				<td>
					<?= $row['created_at']?>
				</td>
				<td>
					<a href="comments.php?id=<?= $row['post_id']?>" class="btn btn-warning <?=(!isset($_SESSION['user_id'])) ? 'disabled' : ''  ?>" >Add Comment</a>
				</td>	
			</tr>
			<?php
		
		?>
	</table>
	<h1>Comment/s</h1>
	<table class="table table-striped">
		<tr>
			<td>#</td>
			<td>Author</td>
			<td>Text</td>
			<td>Image</td>
			<td>Date</td>
		</tr>
	<?php
		$num = 1;

		while( $row = mysqli_fetch_assoc( $result_comments ) ){
			?>
			<tr>
				<td><?= $num ++ ?></td>
				<td><?= $row['name']?></td>	
				<td><?= $row['comment_text']?></td>	
				<td>
					<?php if( !empty( $row['comment_image']) && ($row['comment_image'] != 'uploads/comments_uploads/') ) : ?>
						<img src="<?= $row['comment_image'] ?>" width="200">
					<?php endif; ?>
				</td>
				<td><?= $row['comment_created']?></td>
			</tr>
			<?php
		}
		?>
	</table>

<?php 
 } else {
	die('There is no comments yet!' . mysqli_error($conn));
}
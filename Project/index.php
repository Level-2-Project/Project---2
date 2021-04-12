<?php 
include '../Project/includes/header.php';

session_start();

//$user_id = $_SESSION["user_id"];
//$post_id = $_GET['id'];

//$likes_count_query = "SELECT COUNT(post_id) AS NumberOfLikes FROM posts_likes";
//$result_likes_count = mysqli_query( $conn, $likes_count_query );
//$value = mysqli_fetch_assoc($result_likes_count); 
//$likes_count = $value['NumberOfLikes'];       

$read_query = "SELECT c.COUNT(post_id), a.`user_id`, a.`name`, b.`created_at`, b.`deleted_at`, b.`text`, b.`image`, b.`post_id` AS c.NumberOfLikes FROM `users` a JOIN posts b ON a.`user_id`= b.user_id JOIN posts_likes c ON b.post_id = c.post_id WHERE b.`deleted_at` IS NULL";

$likes_read_query = "SELECT `user_id`, `post_id` FROM `posts_likes`";

$result_likes = mysqli_query( $conn, $likes_read_query );

//$row  = mysqli_fetch_assoc($result_likes);
       // if(is_array($row)) {
        //$likes_post = $row['post_id'];
        //$likes_user= $row['user_id'];
       // }

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
					<?= $row['NumberOfLikes']?>
					<?= $row['created_at']?>
					<a href="like.php?id=<?= $row['post_id']?>" class=" btn  <?=(!isset($_SESSION['user_id'])) ? 'disabled' : ''  ?>" >
					<i class="fa fa-thumbs-o-up " aria-hidden="true"></i></a>
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

	<a href="recycle_bin.php">Recycle Bin</a>
	<?php

} else {
	die('Query failed!' . mysqli_error($conn));
}
?>
<?php 
include '../Project/includes/footer.php';
?>
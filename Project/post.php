<?php

include '../Project/includes/header.php';

session_start();

?>

	<h1>Write a post</h1>
<form method="post" action="">
	<div class="form-group">
		<label>Enter post text.</label>
		<input class="form-control" type="text" name="post_text">
	</div>
	<div class="form-group">
		<input class="form-control" type="submit" name="submit" value="post">
	</div>
</form>

<?php

if( isset( $_POST['submit'] ) ){

	$current_date = date('Y-m-d G:i:s');
	$post_text = $_POST['post_text'];
	$user_id = $_SESSION['user_id'];

	$insert_query = "INSERT INTO `posts`(`user_id`, `text`, `created_at`) VALUES ('$user_id', '$post_text', '$current_date')";

	$result = mysqli_query($conn, $insert_query);

	if($result){
		echo header('Location:sign_in.php');
	} else {
		die('Query failed!' . mysqli_error($conn));
	}
}
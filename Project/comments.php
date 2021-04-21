<?php

include '../Project/includes/header.php';

//session_start();

?>

	<h1>Write a comment.</h1>
<form method="post" action="" enctype="multipart/form-data">
	<div class="form-group">
		<label>Enter comment text.</label>
		<input class="form-control" type="text" name="comment_text">
	</div>
	<div class="form-group">
		<label for="product-image">Comment image</label>
		<input type="file" id="post-image" name="image" value="">
	</div>
	<div class="form-group">
		<input class="form-control" type="submit" name="submit" value="post">
	</div>
</form>

<?php

if( isset( $_POST['submit'] ) ){

	$current_date = date('Y-m-d G:i:s');
	$comment_text = htmlspecialchars($_POST['comment_text'], ENT_QUOTES);
	$user_id = $_SESSION['user_id'];
	$post_id = $_GET['id'];

	if( isset( $_FILES['image'] ) ){
		
		if( !empty( isset( $_FILES['image'] ) ) ){
			
			if ($_FILES['image']['size'] > 100000000) { 
       			die('upload file up to 100000kb');
   		 	} 

			$upload_dir = 'uploads/comments_uploads/';
			
			$uploadfile = $upload_dir . basename( $_FILES['image']['name'] );
			
			if ( move_uploaded_file( $_FILES['image']['tmp_name'], $uploadfile ) ) {
				echo "File is valid, and was successfully uploaded.\n";
			} else {
				echo "Possible file upload attack!\n";
			}
		}
	}

	$insert_query = "INSERT INTO `comments`(`user_id`, `comment_text`, `comment_created`, `comment_image`, `post_id`) VALUES ('$user_id', '$comment_text', '$current_date', '$uploadfile', '$post_id')";

	$result = mysqli_query($conn, $insert_query);

	if($result){
		echo header('Location:index.php');
	} else {
		die('Query failed!' . mysqli_error($conn));
	}
}
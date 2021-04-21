<?php

include '../Project/includes/header.php';

//session_start();

?>

	<h1>Write a post.</h1>
<form method="post" action="" enctype="multipart/form-data">
	<div class="form-group">
		<label>Enter post text.</label>
		<input class="form-control" type="text" name="post_text">
	</div>
	<div class="form-group">
		<label for="post-image">Post image</label>
		<input type="file" id="post-image" name="image">
	</div>
	<div class="form-group">
		<input class="form-control" type="submit" name="submit" value="post">
	</div>
</form>

<?php

if( isset( $_POST['post_text'] ) ){

	$current_date = date('Y-m-d G:i:s');
	$post_text = htmlspecialchars( $_POST['post_text'], ENT_QUOTES);
	$user_id = $_SESSION['user_id'];
 
	if( isset( $_FILES['image'] ) ){
		
		if( !empty( isset( $_FILES['image'] ) ) ){
			
			if ($_FILES['post_image']['size'] > 100000) { 
       			die('upload file up to 100kb');
   		 	} 

			$upload_dir = 'uploads/posts_uploads/';
			
			$uploadfile = $upload_dir . basename( $_FILES['image']['name'] );
			
			if ( move_uploaded_file( $_FILES['image']['tmp_name'], $uploadfile ) ) {
				echo "File is valid, and was successfully uploaded.\n";
			} else {
				echo "Possible file upload attack!\n";
			}
		}
	}

	$insert_query = "INSERT INTO `posts`(`user_id`, `text`, `created_at`, `image`) VALUES ('$user_id', '$post_text', '$current_date', '$uploadfile')";

	$result = mysqli_query($conn, $insert_query);

	if($result){
		echo header('Location:index.php');
	} else {
		die('Query failed!' . mysqli_error($conn));
	}
}
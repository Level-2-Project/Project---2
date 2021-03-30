<?php

include '../Project/includes/header.php';
include '../Project/includes/db_connect.php';


$post_id = $_GET['id'];

$read_query = "SELECT `post_id` FROM posts WHERE  `post_id`=" . $post_id . " LIMIT 1";

$result = mysqli_query( $conn, $read_query );
	//$user_id = $_SESSION['user_id'];

	$sql = "UPDATE posts set `likes` = `likes`+ 1 where `post_id` = $post_id ";
	$result=mysqli_query($conn, $sql) ;

	if( $result ){
	header('Location: index.php');
    } else {
	die('Like failed'.mysqli_error($conn));
    }

?>


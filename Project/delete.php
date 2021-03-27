<?php 

include 'includes/db_connect.php';

$post_id = $_GET['id'];
// //find the product image
$read_query = "SELECT `image` FROM `posts` WHERE `post_id`=" . $post_id . " LIMIT 1";
// // var_dump( $read_query );


$result = mysqli_query( $conn, $read_query );
if( $result ){
	$image = mysqli_fetch_assoc($result);	
	unlink($image['image']);
}

//delete product image



$delete_query = "DELETE FROM posts WHERE post_id=". $post_id . " LIMIT 1";

$delete_res = mysqli_query( $conn, $delete_query );

if( $delete_res ){
	header('Location: index.php');
} else {
	die('Deletion failed'.mysqli_error($conn));
}
<?php

include '../Project/includes/header.php';
include '../Project/includes/db_connect.php';

//session_start();

$post_id = $_GET['id'];
$user_id = $_SESSION["user_id"];
$post_id_table = $_SESSION["post_id"];

// $read_query = "SELECT `post_id`, `user_id` FROM posts_likes WHERE  `post_id`=" . $post_id . " LIMIT 1";

// $result = mysqli_query( $conn, $read_query );

// $row  = mysqli_fetch_assoc($result);
//         if(is_array($row)) {
//         $_SESSION["post_id"] = $row['post_id'];
//         $_SESSION["user_id"] = $row['user_id'];
//         }

$like_check = "SELECT COUNT(post_id) AS count FROM posts_likes WHERE  `post_id` = '$post_id' AND `user_id` = '$user_id' ";
$result_likes = mysqli_query( $conn, $like_check  );
$row_likes = mysqli_fetch_assoc($result_likes);
$value = $row_likes['count'];
		if( $value <= 0 ) {
        $sql = "INSERT INTO `posts_likes` (`user_id`, `post_id`) VALUES ( '$user_id', '$post_id' ) ";
		$result_likes = mysqli_query($conn, $sql);
        }else {
        	
        }

	//$sql = "INSERT INTO `posts_likes` (`user_id`, `post_id`) VALUES ( '$user_id', '$post_id' ) ";
	//$result=mysqli_query($conn, $sql) ;

	if( $result_likes ){
	header('Location: index.php');
    } else {
	die('Like failed'.mysqli_error($conn));
    }



//set `likes` = `likes`+ 1 where `post_id` = $post_id

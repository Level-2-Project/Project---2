<?php 

date_default_timezone_set("Europe/Sofia");

include 'db_connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fakebook</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<img src="uploads/logo/fakebook_logo.png" width="300">
	<h1 class="icon"><a href="post.php" class=" <?=(!isset($_SESSION['user_id'])) 
		? '' : ''  ?>" ><i class="fa fa-plus-circle heading" aria-hidden="true" padding: 100px></i></a></h1>&nbsp
	<h5>Share something! <i class="fa fa-smile-o" aria-hidden="true"></i></h5>
	<a class="navbar-brand" href=""></a>	
	 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
	<div class="collapse navbar-collapse" id="navbarNav">
<div class="btn-group ml-auto">
  <button type="button" class="btn btn-info"><a href="index.php" class="text-white">Home</a></button>
  <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul><div class="dropdown-menu">
    <li><a class="dropdown-item" href="sign_in.php">Sign In</a></li>
    <li><a class="dropdown-item" href="sign_up.php">Sign Up</a></li>
    <div class="dropdown-divider"></div>
    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
  </div></ul>
</div>
	<!-- <ul class="nav nav-pills ml-auto">
			<li class="nav-item active">
				<a class="nav-link active" href="sign_up.php">Sign Up<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="sign_in.php">Sign In</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>
			</li>
		</ul> -->
	</div>
</nav>
<div class="container">

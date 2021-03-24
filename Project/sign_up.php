<?php 
include '../Project/includes/header.php';
?>
<div class="parent-container d-flex">
	<div class="container d-flex justify-content-center">
		<div class="row h-100">
			<div class="col-xs-6" >
			<form method="post" action="">
				<div class="form-group">
					<label for="unit_name"><i class="fa fa-user" aria-hidden="true"></i> Enter username:</label>
						<input type="text" name="name" id="name" class="form-control">
					</div>
					<div class="form-group">
						<label for="unit_name"><i class="fa fa-envelope" aria-hidden="true"></i> Enter email:</label>
						<input type="text" name="email" id="email" class="form-control">
					</div>
					<div class="form-group">
						<label for="unit_name"><i class="fa fa-key" aria-hidden="true"></i> Enter password:</label>
						<input type="password" name="password" id="password" class="form-control">
					</div>
					<button type="submit" class="btn btn-success">Sign up</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 

//1 

$error = 0;

if( isset($_POST['name'])){
	$name = $_POST['name'];
	if (strlen($name) < 6) {
		echo "<p class= ".'text-danger'." >".'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>'." The username must be minimum 6 characters!</p>";
		$error++;
	}
}else{
	$error++;
}


if (isset($_POST['email'])) {
	$email = $_POST['email'];
	if (strlen($email) < 10) {
		echo "<p class= ".'text-danger'.">".'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>'." The email must be minimum 10 characters!</p>";
		$error++;
	}
}else{
	$error++;
}


if (isset($_POST['password'])) {
	$password = $_POST['password'];
	if (strlen($password) < 10) {
		echo "<p class= ".'text-danger'.">".'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>'." The password must be minimum 10 characters!</p>";
		$error++;
	}
}else{
	$error++;
}
	
//2 insert_query
if ($error > 0) {
	echo "<p class= ".'text-danger'.">Errors found!</p>";
}else{
	$insert_query = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
//3
	$result = mysqli_query($conn, $insert_query);

	//var_dump($result);
	if($result){
		echo header('Location:sign_in.php');
	} else {
		die('Query failed!' . mysqli_error($conn));
	}
}


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

// $hashed_password = password_hash( $password, PASSWORD_DEFAULT );
//$hashed_password = password_hash( $trimmed_password, PASSWORD_DEFAULT );

//1 

$error = 0;

if( isset($_POST['name'])){
	$name = $_POST['name'];
	$trimmed_username = trim( htmlspecialchars($name, ENT_QUOTES) );
	if (strlen($trimmed_username) < 6) {
		echo "<p class= ".'text-danger'." >".'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>'." The username must be minimum 6 characters!</p>";
		$error++;
	}
}else{
	$error++;
}


if (isset($_POST['email'])) {
	$email = $_POST['email'];
	if(filter_var($email, FILTER_VALIDATE_EMAIL )){
	$sanitized_email = trim( htmlspecialchars( $email , ENT_QUOTES ) );
}else{
	echo "<p class= ".'text-danger'.">".'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>'." The email is invalid!</p>";
		$error++;
}
	if ((strlen($email) < 10) && $sanitized_email ) {
		echo "<p class= ".'text-danger'.">".'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>'." The email must be minimum 10 characters!</p>";
		$error++;
	}
}else{
	$error++;
}


if (isset($_POST['password'])) {
	$password = $_POST['password'];
	$trimmed_password = trim( htmlspecialchars($password, ENT_QUOTES) );
	$hashed_password = password_hash( $trimmed_password, PASSWORD_DEFAULT );
	if (strlen($trimmed_password) < 10) {
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
	$insert_query = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$trimmed_username', '$sanitized_email', '$hashed_password')";
//3
	$result = mysqli_query($conn, $insert_query);

	if($result){
		echo header('Location:sign_in.php');
	} else {
		die('Query failed!' . mysqli_error($conn));
	}
}


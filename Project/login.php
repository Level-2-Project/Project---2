<?php 
include '../Project/includes/header.php';
?>
<div class="parent-container d-flex">
	<div class="container">
		<div class="row h-100">
			<div class="col-xs-6">
			<form method="post" action="">
				<div class="form-group">
					<label for="unit_name"><i class="fa fa-user" aria-hidden="true"></i> Enter username:</label>
						<input type="text" name="name" id="name" class="form-control">
					</div>
					<div class="form-group">
						<label for="unit_name"><i class="fa fa-key" aria-hidden="true"></i> Enter password:</label>
						<input type="password" name="password" id="password" class="form-control">
					</div>
					<button type="submit" class="btn btn-success">Login</button>
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
	if (strlen($name) < 8) {
		echo "<p>The username must be minimum 8 characters!</p>";
		$error++;
	}
}else{
	$error++;
}


if (isset($_POST['email'])) {
	$email = $_POST['email'];
	if (strlen($email) < 20) {
		echo "<p>The email must be minimum 20 characters!</p>";
		$error++;
	}
}else{
	$error++;
}


if (isset($_POST['password'])) {
	$password = $_POST['password'];
	if (strlen($password) < 10) {
		echo "<p>The password must be minimum 10 characters!</p>";
		$error++;
	}
}else{
	$error++;
}
	
//2 insert_query
if ($error > 0) {
	echo "<p>Errors found!</p>";
}else{
	$insert_query = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
//3
	$result = mysqli_query($conn, $insert_query);

	//var_dump($result);
	if($result){
		echo "Recorde created successfuly";
	} else {
		die('Query failed!' . mysqli_error($conn));
	}
}



include '../Project/includes/footer.php';
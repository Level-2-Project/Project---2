<?php 

include '../Project/includes/header.php';
include '../Project/includes/db_connect.php';

session_start();

    $message="";
    if(count($_POST)>0) { 
    	$query = "SELECT `user_id`, `name`, `password` FROM users WHERE name='" . $_POST["name"] . "' and password = '". $_POST["password"]."'";
        $result = mysqli_query($conn, $query);
        $row  = mysqli_fetch_assoc($result);
        if(is_array($row)) {
        $_SESSION["user_id"] = $row['user_id'];
        $_SESSION["name"] = $row['name'];
        } else {
         $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["user_id"])) {
    header("Location:index.php");
    }
?>

<div class="parent-container d-flex">
	<div class="container d-flex justify-content-center">
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
					<button type="submit" class="btn btn-success text-center">Sign in</button>
					<div class="message"><?php if($message!="") { echo $message; } ?></div>
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
		echo "<p class= ".'text-center'.">".'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>'." The username must be minimum 8 characters!</p>";
		$error++;
	}
}else{
	$error++;
}


if (isset($_POST['email'])) {
	$email = $_POST['email'];
	if (strlen($email) < 20) {
		echo "<p class= ".'text-center'.">".'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>'." The email must be minimum 20 characters!</p>";
		$error++;
	}
}else{
	$error++;
}


if (isset($_POST['password'])) {
	$password = $_POST['password'];
	if (strlen($password) < 10) {
		echo "<p class= ".'text-center'.">".'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>'." The password must be minimum 10 characters!</p>";
		$error++;
	}
}else{
	$error++;
}
	
//2 insert_query
if ($error > 0) {
	echo "<p class= ".'text-center'.">Errors found!</p>";
}else{
	$insert_query = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
//3
	$result = mysqli_query($conn, $insert_query);

	//var_dump($result);
	if($result){
		echo "Record created successfuly";
	} else {
		die('Query failed!' . mysqli_error($conn));
	}
}




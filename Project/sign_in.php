<?php 

include '../Project/includes/header.php';
include '../Project/includes/db_connect.php';

session_start();

if(isset($_POST['username'])){
$trimmed_password = trim( $_POST['password'] );
$trimmed_username = trim( $_POST['username'] );
}
var_dump(($_POST['username']));
var_dump(($_POST['password']));

//$hashed_password = password_hash( $trimmed_password, PASSWORD_DEFAULT );
//$db_password = '$2y$10$3wRFm3R05ggxObS04uwTc.3';

    $message="";
    //$hashed_password = "";
    if(isset($_POST['username'])) { 
    	//count($_POST)>=0
    	$query = "SELECT `user_id`, `name`, `password` FROM users WHERE name='" . $trimmed_username . "'";
    	// and password = '". $verified_password."'
        $result = mysqli_query($conn, $query);
        $row  = mysqli_fetch_assoc($result);
        if(is_array($row)) {
        $_SESSION["user_id"] = $row['user_id'];
        $_SESSION["name"] = $row['name'];
        $hashed_password = $row['password'];
        } else {
         $message = "Invalid Username or Password!";
        }
    }
    var_dump($hashed_password);

if((isset($_POST['username'])) ){
	//&& (isset($_POST['$hashed_password']))
$verified_password = password_verify($_POST['password'], $hashed_password);
}

    //if((isset($_SESSION["user_id"]))) {
    	if(password_verify($_POST['password'], $hashed_password)) {
    		echo "true";
    header("Location:index.php");
    //}
}else{echo "false";}
?>

<div class="parent-container d-flex">
	<div class="container d-flex justify-content-center">
		<div class="row h-100">
			<div class="col-xs-6">
			<form method="post" action="">
				<div class="form-group">
					<label for="name"><i class="fa fa-user" aria-hidden="true"></i> Enter username:</label>
						<input type="text" name="username" id="username" class="form-control">
					</div>
					<div class="form-group">
						<label for="name"><i class="fa fa-key" aria-hidden="true"></i> Enter password:</label>
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

if( isset($_POST['username'])){
	$name = $_POST['username'];
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
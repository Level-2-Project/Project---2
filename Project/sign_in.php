<?php 

include '../Project/includes/header.php';
include '../Project/includes/db_connect.php';

if(isset($_POST['username'])){
$trimmed_password = trim( htmlspecialchars($_POST['password'], ENT_QUOTES) );
$trimmed_username = trim( htmlspecialchars($_POST['username'], ENT_QUOTES) );
}

$message="";
if(isset($_POST['username'])) { 
	$query = "SELECT `user_id`, `name`, `password` FROM users WHERE name='" . $trimmed_username . "'";
    $result = mysqli_query($conn, $query);
    $row  = mysqli_fetch_assoc($result);
    if(is_array($row)) {
    	$hashed_password = $row['password'];
        	if(isset($_POST['username']) && (isset($_POST['password'])) ){
				if(password_verify($trimmed_password, $hashed_password)) {
    		 		$_SESSION["user_id"] = $row['user_id'];
        			$_SESSION["name"] = $row['name'];
    		 		header("Location:index.php");
    			 }
			}
    } else {
      		$message = "<p class= ".'text-danger'. ">Invalid Username or Password!</p>";
    }
}
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
					<button type="submit" class="btn btn-success text-center btn-lg btn-block">Sign in</button>
					<div class="message"><?php if($message!="") { echo $message; } ?></div>
				</form>
			
<?php 

$error = 0;

if( isset($_POST['username'])){
	$name = $_POST['username'];
	if (strlen($name) < 6) {
		echo "<p class= ".'text-danger'. ">".'<i class="fa fa-exclamation-circle" aria-hidden="true"></i>'." The username must be minimum 6 characters!</p>";
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

if ($error > 0) {
	echo "<p class= ".'text-danger'.">Errors found!</p>";
} else {

}
?>
			</div>
		</div>
	</div>
</div>
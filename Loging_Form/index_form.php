<?php
	include_once('inc/functions.php');
	ini_set('display_errors', '1');
		
	if(isset($_POST['submit_btn'])) {
		session_start();
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		//$password = md5($password); //we hashed password before saving

		$q = "SELECT * FROM stage_1 WHERE username='$username' AND password=
		'$password'";
		$result = mysqli_query($con, $q);

		if(mysqli_num_rows($result) > 0) {
			//echo "you are logged in Successfully";
			@header("Location: home.php");
			echo "you are logged in Successfully";
			$_SESSION['username'] = $username;
		} else {
			echo "Your User Name or Password not existed";
		}
	}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="viewport" content="width-device-width">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>
<body>
<div class="container ">
<div class="row">
<div class="col-md-12">
	<ol class="breadcrumb">
        <li><a href="javascript:history.back();" style="color: orange">Back</a></li>
    </ol>

	<h1 > User's Login Page </h1>
	<div>
		<form method="post" action="">
			<tr>
				<td>User Name</td><br>
				<td><input class="form-control"  type="text" name="username" placeholder="User Name" required></td><br>
			</tr>
			<tr>
				<td>Password</td><br>
				<td><input class="form-control" type="password" name="password" placeholder="Password" required></td><br>
			</tr>
			<tr>
				<td></td>
				<td><input class="btn btn-primary" type="submit" name="submit_btn" value="Login"></td><br><br>
			</tr>
			
		</form>
		<div ><a class="btn btn-primary " href="stage1.php">Sign Up</a></div>
	</div> 
</div> <!-- end of col -->
</div> <!-- end of row -->
</div> <!-- end of container -->
<script type="text/javascript" src=js/jquery.js></script>
<script type="text/javascript" src=js/bootstrap.js></script>
</body>
</html>
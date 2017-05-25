<?php
	ini_set('display_errors', '1');
	include_once('inc/functions.php');
	//error_reporting(0);

// mysqli_query($con, "delete from stage_1");


	if(isset($_POST['submit_btn'])) {
		session_start();
		$username = mysqli_real_escape_string($con, $_REQUEST['username']);
		$password = mysqli_real_escape_string($con, $_REQUEST['password']);
		$password2 = mysqli_real_escape_string($con, $_REQUEST['password2']);
		$email = mysqli_real_escape_string($con, $_REQUEST['email']);

		
		if($password != $password2){
			echo "<script>alert('Your Password does not match!')</script>";

		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			
			echo "<script>alert('Please Enter Valid email!')</script>";

		// }elseif(!isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']){
			
		// 	$secret = "6LfTYR0UAAAAAACgcHNunHSvMpDvAoKr7J7IK-iy";
		// 	$ip = $_SERVER['REMOTE_ADDR'];
		// 	$captcha = $_POST['g-recaptcha-response'];
		// 	$rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret
		// 	&response=$captcha&remoteip=$ip");
		// 	$arr = json_decode($rsp,TRUE);
			//var_dump($rsp);

		} else {
			$q = "insert into stage_1 set username='$username',password='$password',email='$email'" or die(mysqli_error());
			
			mysqli_query($con, $q);
			$_SESSION['username'] = $username;

			@header("Location: stage2.php"); //redirecting

			
			
		} 
	}
		
		// 	//$password = md5($password); //hash password before storing for security purp
		
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
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

<div class="header">	<h1>User's Registeration Form Stage 1</h1> </div>
	<form method="post" action="" id="myform">
		
		<tr>
			<td>User Name</td><br>
			<td><input class="form-control" type="text" name="username" placeholder="User name" class="textInput" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" required></td><br>
		</tr>
		<tr>
			<td>Password</td><br>
			<td>
				<input class="form-control" type="password" name="password" placeholder="Password" class="textInput" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" required>
			</td><br>
		</tr>
		<tr>
			<td>Confirm Password</td><br>
			<td>
			<input class="form-control" type="password" name="password2" placeholder="re-type Password" class="textInput" 
			value="<?php echo isset($_POST['password2']) ? $_POST['password2'] : '' ?>">

		</td><br>
		</tr>
		<tr>
			<td>Email</td><br>
			<td>
				<input class="form-control" type="text" name="email" placeholder="Enter Email" class="textInput" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
			</td><br>
		</tr>

<!-- <div class="g-recaptcha" data-sitekey="6LfTYR0UAAAAAM1B4958ziCONyssv0k4oq2ACaSH"></div> -->

		<tr>
			<td></td>
			<td><input class="btn btn-primary" type="submit" name="submit_btn" value="Next"></td><br>
		</tr>
	
	</form>
</div> <!-- end of col -->
</div> <!-- end of row -->
</div> <!-- end of container -->
<script type="text/javascript" src=js/jquery.js></script>
<script type="text/javascript" src=js/bootstrap.js></script>
</body>
</html>
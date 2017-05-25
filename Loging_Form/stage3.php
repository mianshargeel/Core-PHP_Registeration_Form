<?php
	ini_set('display_errors', '1');
	include_once('inc/functions.php');
	//error_reporting(0);
	if(isset($_POST['submit_btn'])) {
		session_start();
		$house = mysqli_real_escape_string($con, $_POST['house_no']);
		$city = mysqli_real_escape_string($con, $_POST['city']);
		$country = mysqli_real_escape_string($con, $_POST['country']);
		$zip = mysqli_real_escape_string($con, $_POST['zip']);

		$q = "insert into stage_3 set house_no='$house',city='$city',country=
		'$country',zip='$zip'" or die(mysqli_error());
			
		$query = mysqli_query($con, $q);
			
		if($query) {
			//echo "Hello ".$_SESSION['username'];
			
			@header("Location: home.php"); //redirecting
		} else {
			echo "Please Complete 1st stage first";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registeration Form</title>
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="viewport" content="width-device-width">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
	<ol class="breadcrumb">
		<li><a href="javascript:history.back();" style="color: orange">Back</a></li>
	</ol>
<div class="header">	<h1 >User's Registeration Form Stage 3</h1> </div>
	<form method="post" action="">
		<tr>
			<td>House No</td><br>
			<td><input class="form-control" type="text" name="house_no" placeholder="house no" required></td><br>
		</tr>
		<tr>
			<td>City</td><br>
			<td><input class="form-control" type="text" name="city" placeholder="enter city" required></td><br>
		</tr>
		<tr>
			<td>Country</td><br>
			<td><input class="form-control" type="text" name="country" placeholder="country" required></td><br>
		</tr>
		<tr>
			<td>Zip Code</td><br>
			<td><input class="form-control" type="text" name="zip" placeholder="zip code" required></td><br>
		</tr>
		<tr>
			<td>
				Female: <input class="btn" type="radio" name="gender" value="female" required> <br>
				Male: <input class="btn btn-primary" type="radio" name="gender" value="male" required>
			</td> <br /> 
		</tr>
		<tr>
			<td></td><br>
			<td><input class="btn btn-primary" type="submit" name="submit_btn" value="Register"></td>
		</tr>

	</form>
</div> <!-- end of col -->
</div> <!-- end of row --> 
</div> <!-- end of container -->
<script type="text/javascript" src=js/jquery.js></script>
<script type="text/javascript" src=js/bootstrap.js></script>
</body>
</html>
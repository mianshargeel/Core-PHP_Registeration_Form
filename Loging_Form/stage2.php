<?php
	ini_set('display_errors', '1');
	include_once('inc/functions.php');

	if(isset($_POST['submit_btn'])) {
		session_start();
		$name = mysqli_real_escape_string($con, $_POST['name']);
		$surname = mysqli_real_escape_string($con, $_POST['surname']);
		$address = mysqli_real_escape_string($con, $_POST['address']);
		$pic = mysqli_real_escape_string($con, $_POST['pic']);

		$q = "insert into stage_2 set name='$name',surname='$surname',address=
		'$address',pic='$pic'" or die(mysqli_error());
			
		$query = mysqli_query($con, $q);
			
		if($query) {
			//echo "Hello ".$_SESSION['username'];
			
			@header("Location: stage3.php"); //redirecting to homa page
		} else {
			echo "Please Complete 2nd stage first";
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
		<li class=""><a href="javascript:history.back();" style="color: orange">Back</a> </li>
	</ol>
<div class="header">	<h1>User's Registeration Form Stage 2</h1> </div>
	<form method="post" action="">
		<tr>
			<td>Name</td><br>
			<td><input class="form-control" type="text" name="name" placeholder=" Enter your Name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>" required></td><br>
		</tr>
		<tr>
			<td>Surname</td><br>
			<td><input class="form-control" type="text" name="surname" placeholder="Enter your Surname" value="<?php echo isset($_POST['surname']) ? $_POST['surname'] : '' ?>" required></td><br>
		</tr>
		<tr>
			<td>Address</td><br>
			<td><input class="form-control" type="text" name="address" placeholder="Enter your Address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>" required></td><br>
		</tr>
		<tr>
			<td>My Picture</td><br>
			<td><input class="form-control" type="text" name="pic" placeholder="Your Picture" value="<?php echo isset($_POST['pic']) ? $_POST['pic'] : '' ?>" required></td><br>
		</tr>
		<tr>
			<td></td>
			<td><input class="btn btn-primary" type="submit" name="submit_btn" value="Next"></td><br>
		</tr>

	</form>
</div> <!-- end of col-12 -->	
</div> <!-- end of row -->
</div> <!-- end of container -->	
<script type="text/javascript" src=js/jquery.js></script>
<script type="text/javascript" src=js/bootstrap.js></script>
</body>
</html>
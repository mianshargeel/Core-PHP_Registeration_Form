<?php
ini_set('display_errors', '1');
include_once('inc/functions.php');
session_start();

echo "Hey ".$_SESSION['username']." you at your home page";

?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
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
			<li><a href="">Home</a></li>
			<li><a href="javascript:history.back();" style="color: orange">Back</a> </li>
		</ol>
	<h1 style="text-align: center; color: blue">Welcome to the Home Page </h1>
	<h2 style="text-align: center; color: blue">Cogratulation You Have Complete Your Registeration</h2>
	<p style="text-align: center; color: red">Please Click here to Logout <a href="logout.php"> <span class="button">Logout</span></a></p>
	</div> <!-- end of col -->
	</div> <!-- end of row --> 
	</div> <!-- end of container -->
<script type="text/javascript" src=js/jquery.js></script>
<script type="text/javascript" src=js/bootstrap.js></script>
</body>
</html>
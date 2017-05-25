<?php
session_start();
session_destroy();

?>




<!DOCTYPE html>
<html>
<head>
	<title>logout</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>
<body>
	<div class="container">
	<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="javascript:history.back();" style="color: orange">Back</a> </li>
		</ol>
	<h3>You have logged out successfully</h3>
	<p>if you want in login Please click here <a href="index.php">Login</a></p>
	</div> <!-- end of col -->
	</div> <!-- end of row --> 
	</div> <!-- end of container -->
</body>
</html>
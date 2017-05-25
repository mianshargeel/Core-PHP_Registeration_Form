<?php

		if(isset($_POST['g-recaptcha-response'])){
			//echo "<script>alert('reCaptcha!')</script>";
	
			$secret = "6LfWwx0UAAAAACy8doeZWnjjUCFnN6jH6H7vZGjq";
			$ip = $_SERVER['REMOTE_ADDR'];
			$captcha = $_POST['g-recaptcha-response'];

			$action = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret
			&response=$captcha&remoteip=$ip");
			var_dump($action);
			$result = json_decode($action,TRUE);
		 	
		 	if ($result['success']) {
				header("Location: home.php");
			} else {
				echo "There is somting missing";
			}
			
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Captcha</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<div class="container">
	<form action="" method="post">
	Your Name: <input type="text" name="name"><br><br>
	<!-- <input type="text" name="ipn" placeholder="reCaptcha" class="name">
 -->
	<div class="g-recaptcha" data-sitekey="6LfWwx0UAAAAAI3ffMVzeQNJ3gQby3k-HPS0cq8Z"></div>
	<input type="submit" name="sub-btn" value="Submit">
</form>
</div>
</body>
</html>
<?php 
	include 'config/db_conn.php';

	$email = $pass = $error = '';

	if(isset($_POST['submit'])) {

		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$pass = mysqli_real_escape_string($conn, $_POST['pass']);

		$sql = "SELECT id FROM admins WHERE email = '$email' and pass = '$pass'";

		$result = mysqli_query($conn, $sql); 
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);

		if ($count == 1) {
		header('location: home.php');

		} else {
			$error = "Invalid email or Password";

		}
	}

 ?>
 <!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
	 	<meta name="viewport" content="width=device-width, initial-scale=1">
	 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<link rel="stylesheet" href="config/style.css">
		<style type="text/css">
    	.brand{
    		background: #6086FF !important;
    	}
    	.brand-text{
    		color: #6086FF !important;
    	}
	</style>
</head>
<body class="blue lighten-4">
	<nav class="white z-depth-0">
		<a class="center brand-logo brand-text">&#129463;Dental Inventory&#129463;</a>
	</nav>
	</head>
	<body>
		<section class="container">
			<h4 class="center">Login</h4>
			<form class="white" action="login.php" method="POST">
				<label>Enter Email address</label>
			<input type="text" name="email" value="<?php echo $email ?>">
				<label>Enter Password</label>
			<input type="text" name="pass" value="<?php echo $pass ?>">
			<div class="red-text"><?php echo $error ?></div>
			<div class="left">
				<input type="submit" name="submit" value="Submit" class="btn brand">
				<a href="guest.php" class="btn brand ">Login as Guest</a>
			</input>
			</div>				
			</form>
		</section>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title> Sylestate </title>
	<meta charset="UTF-8">

<link rel = "Stylesheet" href="css/signin.css">
<link rel = "Stylesheet" href="css/headfoot.css">

</head>

<body>

		<?php include 'inc/header.php' ;?>
			<div class="area">
			<h1>Login Here</h1>
				<div class="form">		
							<form action="signin.php" method="POST">
								<lebel> Email </label> <br>
								<input type ="email" name="email"> <br>
								<lebel> Password</label> <br>
								<input type ="password" name="user_password"> <br>
								<button type ="submit" name="submit">Login</button>
								</form>
					</div>
					<div class="underbut">
						  <a href="forget_pass.php">Forgot Password</a> 
					</div>
					<div class="underbut">
						 If you are new then please <a href="signup.php">Signup</a> 
					</div>
			</div>
		<?php include 'inc/footer.php' ;?>
</body>

</html>

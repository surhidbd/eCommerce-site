<?php

	include 'inc/database.php';

	$error = array();


	if (isset($_POST['signup'])) {
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$user_name = $_POST['user_name'];
		$user_password = $_POST['user_password'];
		$conpass = $_POST['conpass'];
		$app_status = 0;

		if (empty($name)|| empty($phone)|| empty($email)|| empty($address)|| empty($user_name)|| empty($user_password)|| empty($conpass)) {
			array_push($error, "Every field must be filled out");
		}

		if (filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);
			$checkEmail = mysqli_query($conn, "SELECT * FROM owner WHERE email = '$email'");
			$rows = mysqli_num_rows($checkEmail);
			if ($rows > 0) 
			{
				array_push($error, "Email Exist");
			} elseif ($user_password != $conpass) {
				array_push($error, "Password doesn't match !");
			} else {
				$user_password = md5($user_password); //md5 for encryption password
				
				$insert = "INSERT INTO `owner`(`name`, `phone`, `email`, `address`, `user_name`, `user_password`,`app_status`) VALUES ('$name','$phone','$email','$address','$user_name','$user_password','$app_status')";

				$result = mysqli_query($conn, $insert);
				if ($result) {
					header("Location:login.php?Registration Success");
				}
			
			}
		
		}
	}

?>
<!DOCTYPE html> 
<html>
<head> 
	<title> Sylestate </title>
	<meta charset="UTF-8">


<link rel = "Stylesheet" href="css/signup.css">
<link rel = "Stylesheet" href="css/headfoot.css">



</head>
 
<body>
	
		<?php include 'inc/header.php' ;?>
		
		
		
			<div class="form">	
					<form action="signup.php" method="POST">	
						<h1>Signup Here</h1>
							<div class="error-green">
										<p style="color: yellow; text-align: center; padding: 5px; margin-top: 10px;"><?php

													

										 ?></p>
							</div>
							<div class="error-red">
								<p style="color: yellow; text-align: center; padding: 5px; margin-top: 10px;"><b><?php

											if (in_array("Every field must be filled out",$error)) {
												echo "Every field must be filled out";
											}
											if (in_array("Email Exist",$error)) {
												echo "Email Allready Exist";
											}
											if (in_array("Password doesn't match !",$error)) {
												echo "Password doesn't match !";
											}

								 ?></b></p>
							</div>
							
						<div class="pan">
									<label for="Name"><p>Name</p></label>
									<input type="text" placeholder="Enter your Name" name="name" > <br>

								
									<label for="uname"><p>Phone</p></label>
									<input type="text" placeholder="Enter your number" name="phone" > <br>
								

									<label for="uname"><p>Email</p></label>
									<input type="email" placeholder="Enter your Email" name="email" > <br>
								
									
									<label for="uname"><p>Address</p></label>
									<input type="text" placeholder="Enter your Adress" name="address" > <br>
								
							
									<label for="uname"><p>User Name</p></label>
									<input type="text" placeholder="Enter your user_name" name="user_name" > <br>
							
								
									<label for="psw"><p>Password</p></label>
									<input type="password" placeholder="Enter Password" name="user_password" >  <br>
							
							
									<label for="psw"><p>Confirm Password</p></label>
									<input type="password" placeholder="Confirm Password" name="conpass" >  <br>
							
								
									<button type="submit" name="signup">SignUp</button>
									

						</div>
						<div class="underbut">
							
							<p> If you have already an account then please <a href="login.php">Login</a> </p>
						</div>
								
					</form>
				
			
			</div>
			
					
		
		
		<?php include 'inc/footer.php' ;?>

  
</body>
</html>

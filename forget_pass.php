<?php


	include 'inc/database.php';

	$succcess = array();

	if (isset($_POST['reset'])) {
		
		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    	
    	$query = mysqli_query($conn, "SELECT * FROM owner WHERE email = '$email'");
    	$result = mysqli_num_rows($query);

    	if ($result == 1) {
    		$row = mysqli_fetch_array($query);
    		
    		$id = $row['id'];

    		$user_email = $row['email'];

    		$password = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 8);
    		$password1 = md5($password);

    		$name = $row['name'];

    		$update = mysqli_query($conn,"UPDATE owner SET user_password = '$password1' WHERE id = '$id'");

			if ($update) {

				$emailTo =  $user_email;
				$subject = "Change Password";
				$body = "Hello ".$name.", Thank you for requesting a new password. 
							We are always concern for your safety..<br> Your new password is ".$password."/n Thank you :)";
				$headers = "From: sylestatedotcom@gmail.com";
				if (mail($emailTo, $subject,$body,$headers)) {
					array_push($succcess, "Mail Sent successfuly");
				} else {
					array_push($succcess,  "Failed To sent mail");
				}

    		} 

    } else {
    		array_push($succcess, "No account belong to this email!*");
    	}
    }
?>
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
			<h1>Reset Password</h1>
			<?php
				if (in_array("Mail Sent successfuly",$succcess)) {
					echo "<p style = 'color:green; font-weight:bold;'>Mail Sent successfuly</p>";
				}
				if (in_array("Failed To sent mail",$succcess)) {
					echo "<p style = 'color:red; font-weight:bold;'>Failed To sent mail</p>";
				}
				if (in_array("No account belong to this email!*",$succcess)) {
					echo "<p style = 'color:red; font-weight:bold;'>No account belong to this email</p>";
				}

			?>
				<div class="form">		
							<form action="forget_pass.php" method="POST">
								<lebel> Email </label> <br>
								<input type ="email" name="email"> <br>
								<button type ="submit" name="reset"title="Reset Password">Reset</button>
								</form>
					</div>
					<div class="underbut">
						 If you are new then please <a href="signup.php">Signup</a> 
					</div>
			</div>
		<?php include 'inc/footer.php' ;?>
</body>

</html>

<?php 

	include 'inc/database.php';
	session_start();

	$error = "";
	if (!isset($_SESSION['id'])) {
		header("Location: login.php");
	}
?>

<!DOCTYPE html> 
<html>
<head> 
	<title> Sylestate </title>
	<meta charset="UTF-8">



<link rel = "Stylesheet" href="css/headfoot.css">
<link rel = "Stylesheet" href="css/myaccount.css">

</head>
 
<body>
	
		<?php include 'inc/header.php' ;?>
		
				
				
			<div class="rightbar clear">
							<div class="details">
								<center>
									<h1><b>EDIT YOUR INFO</b></h1>
									<hr style="width: 300px;">
								</center>

								<?php
									$id = $_GET['id'];
									$select = mysqli_query($conn, "SELECT * FROM owner WHERE id = '$id'");
									$row = mysqli_fetch_array($select);
								?>
					<div class="container clear">
						<form action="edit_profile.php?id=<?php echo $id; ?>" method="POST">
						
									<label for="Name"><p>Name</p></label>
									<input type="text" value="<?php echo $row['name']; ?>" name="name" >
			

									<br>
							
									<label for="uname"><p>Phone</p></label>
									<input type="text" value="<?php echo $row['phone']; ?>" name="phone" >
		
									<br>
				
									<label for="uname"><p>Email</p></label>
									<input type="email" value="<?php echo $row['email']; ?>" name="email" >
									
									<br>
									
									
									
									<label for="uname"><p>Address</p></label>
									<input type="text" value="<?php echo $row['address']; ?>" name="address" >
							
									<br>
									
									
									<label for="uname"><p>User Name</p></label>
									<input type="text" value="<?php echo $row['user_name']; ?>" name="user_name" >
								
									<br>
									
									
									<label for="psw"><p>Password</p></label>
									<input type="password" placeholder="Enter Password" name="user_password" >
												
								<br>
								<br>
							
								<button type="submit" onclick="alert('Profile Updated Successfully')"name="edit">Update Profile</button>
					
						
							
						</form>
					</div>
				</div>
			</div>
		</div>		
		<?php include 'inc/footer.php' ;?>

  
</body>
</html>

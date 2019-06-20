<?php

	include 'inc/database.php';
	session_start();

	$error = "";
	if (!isset($_SESSION['id'])) {
		header("Location: login.php");
	}
	
	$id = $_GET['up_id'];

	$u_id= $_SESSION['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<title> Sylestate </title>
	<meta charset="UTF-8">


<link rel = "Stylesheet" href="css/editposts.css">
<link rel = "Stylesheet" href="css/headfoot.css">

</head>

<body>

		<?php include 'inc/header.php' ;?>
		<div class="all template clear">
				
					<div class="leftbar clear">

							<a href="javascript:history.back()"> <div class="side">
								<h2> Dashboard </h2>
								<div class="image">
								<img src="images/arorw2.png" alt="Logo"/>
								</div>
							</div> </a>


							<a href="logout.php"> <div class="side">
								<h2> Log Out </h2>
								<div class="image">
								<img src="images/arorw2.png" alt="Logo"/>
							</div>
							</div> </a>

					</div>

					<div class="rightbar">

								<h1>Edit Your Post</h1>

							<br>

							<?php

								$select = mysqli_query($conn,"SELECT * FROM home WHERE id = '$id'");
								while ($row= mysqli_fetch_array($select)) {

							?>

							<div class="addup clear">

								<form action="update_post.php?up_id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">


											<label for="uname"><p>Rent</p></label>
											<input type="text" placeholder="" name="home_rent" value="<?php echo $row['home_rent'];?>" >

										<br>
										
										<label for="uname"><p>Price</p></label>
										<input type="text" placeholder="" name="price" value="<?php echo $row['price'];?>">

									<br>

											<label for="uname"><p>Number of Rooms </p></label>
											<input type="number" placeholder="" name="num_room" value="<?php echo $row['num_room'];?>">

										<br>

											<label for="uname"><p>Number of Bathrooms </p></label>
											<input type="number" placeholder="" name="num_bathroom" value="<?php echo $row['num_bathroom'];?>">

										<br>

											<label for="uname"><p>Location</p></label>
											<input type="text" placeholder="" name="location" value="<?php echo $row['location'];?>">

										<br>

										<div class="radio">


														<label for="uname">Gas :</label>
														<input type="radio" name="gas" value="LP" > LP
														<input type="radio" name="gas" value="Gasline" > Gasline

												<br>

														<label for="uname">Parking :</label>
														<input type="radio" name="car_parking" value="Yes" > Yes
														<input type="radio" name="car_parking" value="No" > No

												<br>

														<label for="uname">Home Type :</label>
														<input type="radio" name="home_type" value="Family" > Family
														<input type="radio" name="home_type" value="Mas" > Mas

												<br>

														<label for="uname">Rent For :</label>
														<input type="radio" name="rent_for" value="Small Family" > Small Family
														<input type="radio" name="rent_for" value="Big Family" > Big Family


										</div>
									<br>

									<div class="imageup clear">
										<label for="uname"><p>Change Photo</p></label>
										<input type="file" name="image">
									</div>
									<img src="upload/<?php echo $row['image'];?>" style="height: 200px; width: 300px; margin-top: 5px;">
									<br>


										<button type="submit" name="continue">SAVE & CONTINUE</button>

								</form>
							<?php } ?>

							</div>
							<br>

							<br>
					</div>

		</div>

		<?php include 'inc/footer.php' ;?>


</body>
</html>

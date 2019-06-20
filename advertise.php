<?php

	include 'inc/database.php';
	session_start();

	$error = "";
	if (!isset($_SESSION['id'])) {
		header("Location: login.php");
	}

	$id= $_SESSION['id'];

	date_default_timezone_set("Asia/Dhaka");
	$currenttime = time();
	$datetime = strftime("%B-%d-%Y %H:%M",$currenttime);
	$datetime;

	if (isset($_POST['submit'])) {

		$home_rent = $_POST['home_rent'];
		$num_room = $_POST['num_room'];
		$num_bathroom = $_POST['num_bathroom'];
		$location = $_POST['location'];
		$gas = $_POST['gas'];
		$car_parking = $_POST['car_parking'];
		$home_type = $_POST['home_type'];
		$rent_for = $_POST['rent_for'];

		$price = $_POST['price'];
		$details = $_POST['details'];

		$image = $_FILES["image"]["name"];
		$path = "upload/".basename($image);


		$sql = "INSERT INTO `home`(`owner_id`, `home_rent`, `num_room`, `num_bathroom`, `location`, `gas`, `car_parking`, `home_type`, `rent_for`, `image`,`price`,`details`, `date`) VALUES ('$id','$home_rent', '$num_room','$num_bathroom','$location','$gas','$car_parking','$home_type','$rent_for','$image','$price','$details','$datetime')";

		if (mysqli_query($conn, $sql)) {
			move_uploaded_file($_FILES['image']['tmp_name'], $path);
			header('Location:dash.php?id='.$id);
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

	}

?>
<!DOCTYPE html>
<html>
<head>
	<title> Sylestate </title>
	<meta charset="UTF-8">


<link rel = "Stylesheet" href="css/add.css">
<link rel = "Stylesheet" href="css/headfoot.css">
</head>

<body>
		<?php include 'inc/header.php' ;?>
		<br>
		<br>
			<div class="contentarea template clear">
				<div class = "box">
							<h1>Advertise Here</h1>
							<br>



							<form action="advertise.php" method="POST" enctype="multipart/form-data">

								<div class="add  clear">
											<label for="uname"><p>Title</p></label>
											<input type="text" placeholder="" name="home_rent" >

										<br>

										<label for="uname"><p>Price</p></label>
											<input type="text" placeholder="" name="price" >

										<br>

											<label for="uname"><p>Number of Rooms </p></label>
											<input type="number" placeholder="" name="num_room" >

										<br>

											<label for="uname"><p>Number of Bathrooms </p></label>
											<input type="number" placeholder="" name="num_bathroom" >

										<br>

											<label for="uname"><p>Location</p></label>
											<input type="text" placeholder="" name="location" >

										<br>

											<label for="uname"><p>Details</p></label>
											<textarea name="details" placeholder="More information .."></textarea>

								</div>

										<div class="radio">

											<div>
													<label for="uname">Gas :</label> <br>
													<input type="radio" name="gas" value="LP" > LP
													<input type="radio" name="gas" value="Gasline" > Gasline
											</div>
											<br>
											<div>
													<label for="uname">Parking :</label> <br>
													<input type="radio" name="car_parking" value="Yes" > Yes
													<input type="radio" name="car_parking" value="No" > No
											</div>
											<br>
											<div>
													<label for="uname">Home Type :</label> <br>
													<input type="radio" name="home_type" value="Family" > Family
													<input type="radio" name="home_type" value="Mas" > Mas
											</div>
											<br>
											<div>
													<label for="uname">Rent For :</label> <br>
													<input type="radio" name="rent_for" value="Small Family" > Small Family
													<input type="radio" name="rent_for" value="Big Family" > Big Family
													<input type="radio" name="rent_for" value="Big Family" > None
											</div>

										</div>
									<br>

										<div class="imageup">
											<label for="uname">Upload Photo</label>
											 <input type="file" name="image">
										</div>
										<br>




										<button type="submit" name="submit">Submit</button>


							</form>




				</div>

			</div>



			<?php include 'inc/footer.php' ;?>



</body>

</html>

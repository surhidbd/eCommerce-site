<?php 

	include 'inc/database.php';
	session_start();

	$error = "";

	if (!isset($_SESSION['id'])) {
		header("Location: login.php");
	}

	$u_id= $_SESSION['id'];

	date_default_timezone_set("Asia/Dhaka");
	$currenttime = time();
	$datetime = strftime("%B-%d-%Y %H:%M",$currenttime); 
	$datetime;

	if (isset($_POST['continue'])) {
		
		$id = $_GET['up_id'];

		$home_rent = $_POST['home_rent'];
		$num_room = $_POST['num_room'];
		$num_bathroom = $_POST['num_bathroom'];
		$location = $_POST['location'];
		$gas = $_POST['gas'];
		$car_parking = $_POST['car_parking'];
		$home_type = $_POST['home_type'];
		$rent_for = $_POST['rent_for'];

		$price = $_POST['price'];

		$image = $_FILES["image"]["name"];
		$path = "upload/".basename($image);
		//header('Location:edit_post.php?up_id='.$id);

		// echo $home_rent;
		// echo $num_room;
		// echo $num_bathroom;
		// echo $location;
		// echo $gas;
		// echo $home_rent;

		$update_sql = "UPDATE home SET home_rent = '$home_rent', num_room = '$num_room', num_bathroom = '$num_bathroom', location = '$location', gas = '$gas', car_parking = '$car_parking', home_type = '$home_type', rent_for = '$rent_for', price = '$price', image = '$image' WHERE id = '$id'";

		if (mysqli_query($conn, $update_sql)) {
			move_uploaded_file($_FILES['image']['tmp_name'], $path);
			header('Location:dash.php?id='.$u_id);
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

	}


?>

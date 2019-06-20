<?php


	include 'inc/database.php';
	session_start();

	$error = "";
	if (!isset($_SESSION['id'])) {
		header("Location: login.php");
	}

	if (isset($_POST['edit'])) {
		$id = $_GET['id'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$user_name = $_POST['user_name'];
		$user_password = $_POST['user_password'];

		$user_password = md5($user_password);

		// echo $id;
		// echo $name;
		// echo $user_name;
		// echo $phone;
		// echo $email;

		$set = mysqli_query($conn, "UPDATE owner SET name = '$name', phone = '$phone', email = '$email', address = '$address', user_name = '$user_name', user_password = '$user_password' WHERE id = '$id'");

		if ($set) {
			header("Location:myacc.php?id=".$id);
		}
	}
t

?>
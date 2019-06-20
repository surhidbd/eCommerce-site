<?php

	include 'inc/database.php';
	session_start();

	$error = array();

	if (isset($_POST['submit'])) {
		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

		$_SESSION['email'] = $email;

		$user_password = md5($_POST['user_password']);

		$query = mysqli_query($conn, "SELECT * FROM owner WHERE email = '$email' AND user_password = '$user_password' ");


		$check = mysqli_num_rows($query);
		if ($check == 1) {
			$row = mysqli_fetch_array($query);
			if ($row['app_status'] == 1){

				$email = $row['email'];
				$_SESSION['email'] = $email;
				$id = $row['id'];
				$_SESSION['id'] = $id;
				
				header("Location: dash.php?id=$id");
				exit();
			} else {
				// header("Location: login.php?Admin approval not found!");
				echo "<script type = 'text/javascript'> alert('Login Failed.Please wait for admin approval!')</script>";
			}
		} else {
			echo "<script type = 'text/javascript'> alert('Login Failed.Try Again!')</script>";
		}

	}

 ?>

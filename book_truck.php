<?php

	include 'inc/database.php';

	$error = array();

	$name = "";
	if (isset($_POST['book_truck'])) {
		$name = $_POST['name'];
		$c_number = $_POST['c_number'];
		$truck_type = $_POST['truck_type'];
		$num_truck = $_POST['num_truck'];
		$from_where = $_POST['from_where'];
		$to_where = $_POST['to_where'];
		$pick_date = $_POST['pick_date'];
		
		$datetime;

		if (empty($name) || empty($c_number) || empty($truck_type) || empty($num_truck) || empty($from_where) || empty($to_where) || empty($pick_date)) {
			array_push($error,"Every Field Must be field out");
		} else {
			$ins = mysqli_query($conn,"INSERT INTO `truck_book`(`name`, `phone`, `truck_type`, `num_truck`, `from_where`, `to_where`, `pick_date`, `book_date`) VALUES ('$name','$c_number','$truck_type','$num_truck','$from_where','$to_where','$pick_date','$datetime')");
			if ($ins) {
				array_push($error,"Thank you".$name."<br>We will reach you very soon");
				echo "";
			}
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title> Sylestate </title>
	<meta charset="UTF-8">


<link rel = "Stylesheet" href="css/booktruck.css">
<link rel = "Stylesheet" href="css/headfoot.css">
</head>

<body>
		<?php include 'inc/header.php' ;?>

				<div class = "box">
					<h1>Book Your Truck</h1>
					<br>
					<div class="error-red">
						<p style="color: red;"><b><?php

									if (in_array("Every Field Must be field out",$error)) {
										echo "Every Field Must be field out";
									}

						 ?></b></p>
					</div>
					<div class="error-green">
						<p style="color: #02ffde;"><b><?php

									if (in_array("Thank you".$name."<br>We will reach you very soon",$error)) {
										echo "Thank you".$name."<br>We will reach you very soon";
									}

						 ?></b></p>
					</div>
					
					<div class="add">

						<form action="book_truck.php" method="POST" enctype="multipart/form-data">

								
									<label for="uname"><p>Name</p></label>
									<input type="text" placeholder="Enter Your Full name" name="name" >
						
								<br>
								
									<label for="uname"><p>Contact Number</p></label>
									<input type="number" placeholder="Contact Number" name="c_number" >
								
								<br>
								
									<label for="uname"><p>Truck type</p></label>
									<select name="truck_type">
										<option selected="">Select Truck Type</option>
										<option value="13">13</option>
										<option value="7">7</option>
										<option value="3">3</option>
									</select>
								
								<br>
								
									<label for="uname"><p>Number of Truck</p></label>
									<select name="num_truck">
										<option selected="">Select Number of Truck </option>
										<?php 
											$i=1;
											for($i=1;$i<=10;$i++){
										?>
										<option value="<?php echo $i;?>"><?php echo $i;?></option>
									<?php } ?>
									</select>
						
								<br>
							
									<label for="uname"><p>From Where</p></label>
									<input type="text" placeholder="Pick up Destination" name="from_where" >

								<br>
								
									<label for="uname"><p>To Where</p></label>
									<input type="text" placeholder="Delivery Destination" name="to_where" >
							
								<br>
								<br>
								
									<label for="uname"><p>Pick Date</p></label>
									<input type="date" placeholder="" name="pick_date" >
							
								<br>
							
									<button type="submit" name="book_truck">Submit</button>
							

            			</form>
            	

					</div>

				</div>

		


			<?php include 'inc/footer.php' ;?>



</body>

</html>

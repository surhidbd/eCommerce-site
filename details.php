<?php

	include 'inc/database.php';
	session_start();

	$error = "";

	$id = $_GET['p_id'];
?>



<!DOCTYPE html> 
<html>
<head> 
	<title> Sylestate </title>
	<meta charset="UTF-8">


<link rel = "Stylesheet" href="css/detailspage.css">
<link rel = "Stylesheet" href="css/headfoot.css">


</head>
 
	<body>
		
		<?php include 'inc/header.php' ;?>
				<?php

					$select = mysqli_query($conn,"SELECT * FROM home JOIN owner ON home.owner_id = owner.id WHERE home.id = '$id'");
					while ($row= mysqli_fetch_array($select)) {
						$location = $row['location'];
						$_SESSION['location'] = $location					
				?>
			<div class="area template clear">
					<div class="left clear">
						<div class="photo">
							<img src="upload/<?php echo $row['image']; ?>" alt="Picture"/>
						</div>
						
					</div>
					<div class = "right clear">
							<h1><?php echo $row['home_rent']." For ".$row['rent_for']; ?></h1>
								<div class="rpm">
									<h1> Rent Per Month : <?php echo $row['price']; ?> Tk</h1>
								</div>
							<div class="det">
								<p><b>Details :</b></p>
								<p>Home Type: <?php echo $row['home_type']; ?></p>
								<p><?php echo $row['num_room']." Bedrooms , ".$row['num_bathroom']." Bathrooms"; ?></p>
								<p>Parking: <?php echo $row['car_parking']; ?></p>
								<p>Gas: <?php echo $row['gas']; ?></p>
								<p><b>Location:</b></p>
								<p><?php echo $row['location']; ?></p>
								<br>
								<p><b>Owner Info:</b></p>
								<p>Name: <?php echo $row['name']; ?></p>
								<br>
								<p><b>MORE:</b></p>
								<p><?php echo $row['details']; ?></p>
							</div>
							
							<div class="book" onclick="this.innerHTML='<?php echo $row['phone']; ?>' ">
								Call Now
							</div>
						
					</div>
			</div>
			<?php } ?>
			<div class="suggetion">
			
				<h1>All Homes in this Location</h1>
				<div class="container template clear ">

					<?php


						$sql = "SELECT * FROM home WHERE location = '$location' LIMIT 0,4";
						$res_data = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_array($res_data)){
						   
					?>
					<div  class="box clear">
						   <div class="image">
								<a href="details.php?p_id=<?php echo $row['id']; ?>"> <img src="upload/<?php echo $row['image']; ?>" alt="Photo"/> </a>
						   </div>
							<h4><?php echo $row['home_rent']; ?></h4>
							<h3> Fare: <?php echo $row['price']; ?> Tk/M</h3>					   
					</div>
				<?php 
					} 
					mysqli_close($conn);
				?>
				</div>
				
			</div>
		<?php include 'inc/footer.php' ;?>

	</body>
	
</html>

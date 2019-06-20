<?php 

	include 'inc/database.php';
	session_start();

	$error = "";
	if (!isset($_SESSION['id'])) {
		header("Location: login.php");
	}

	$id = $_GET['id'];
	$select = mysqli_query($conn, "SELECT * FROM owner WHERE id = '$id'");
	$row = mysqli_fetch_array($select);
?>



<!DOCTYPE html> 
<html>
<head> 
	<title> Sylestate </title>
	<meta charset="UTF-8">


<link rel = "Stylesheet" href="css/dash.css">
<link rel = "Stylesheet" href="css/headfoot.css">


</head>
 
<body>
	
		<?php include 'inc/header.php' ;?>
		<div class="middle template clear">
			<div class="leftbar clear">
					<a href="dash.php?id=<?php echo $id; ?>"> <div class="side">
						<h2> Dashboard </h2>
						<div class="image">	
						<img src="images/arorw2.png" alt="Logo"/>
					</div>
					</div> </a>
			
					<a href="myacc.php?id=<?php echo $id; ?>"> <div class="side clear">
						<h2> My account </h2>
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
				
			<div class="rightbar clear">
					<div class="user">
						<h1>WELCOME <?php echo $row['name']; ?></h1>
					</div>

					<?php 
						$query = mysqli_query($conn, "SELECT * FROM home WHERE owner_id = '$id'");
						$check = mysqli_num_rows($query);
						if ($check == 0) {
					?>
					<div class="box">
						<h3>Your Post</h3>
						<h4>You can manage your post from here.</h4>
					</div>
					<div class="box">
						<h3> You don't have any post yet ? </h3>
						<h4> Click the "Post an ad now!" button to post your ad. </h4>
					</div>
					<div class="book">
						<a href="advertise.php?id=<?php echo $id; ?>"><button type="submit">Advertise  Now</button></a>
					</div>
			<?php 
					} else {
						while ($row1 = mysqli_fetch_array($query)) {
			?>
					<div  class="contain">
					   <div class="imageadd">
							<a href="details.php?p_id=<?php echo $row1['id']; ?>"> <img src="upload/<?php echo $row1['image']; ?>" alt="Photo"/> </a>
					   </div>
						<h4>Title : <?php echo $row1['home_rent']; ?></h4>
						<h4>Rent : <?php echo $row1['price']; ?></h4>
						<h4>Location : <?php echo $row1['location']; ?></h4>
					</div>
					<div class="actionbutton">
						<br><a class="edit" href="edit_post.php?up_id=<?php echo $row1['id']."& u_id=".$_SESSION['id']; ?>">EDIT</a>
						<a class="delete" href="inc/delete.php?delete_id=<?php echo $row1['id']; ?>">DELETE</a>
					</div>
			<?php } } ?>
			</div>
		</div>

	<?php include 'inc/footer.php' ;?>

  
</body>
</html>

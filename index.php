<?php

	include 'inc/database.php';
	session_start();
	
?>

<!DOCTYPE html> 
<html>
<head> 
	<title> Sylestate </title>
	<meta charset="UTF-8">


<link rel = "Stylesheet" href="css/index.css">
<link rel = "Stylesheet" href="css/headfoot.css">

</head>
 
<body>
		<?php 
			include 'inc/header.php';
		?>
		
			<div class="cover template">
				<div class="slider">
					  <img class="mySlides" src="images/cover.jpg" style="width:100%">
					  <img class="mySlides" src="images/cover 2.jpg" style="width:100%">
				</div>

					<script>
						var myIndex = 0;
						carousel();

						function carousel() {
						  var i;
						  var x = document.getElementsByClassName("mySlides");
						  for (i = 0; i < x.length; i++) {
							x[i].style.display = "none";  
						  }
						  myIndex++;
						  if (myIndex > x.length) {myIndex = 1}    
						  x[myIndex-1].style.display = "block";  
						  setTimeout(carousel, 2000); // Change image every 2 seconds
						}
					</script>
			</div>
			<div class="middle template clear">
				<div class="highlighter template clear">
					<a href="find.php"> 
						<div class="hbox">
						<div claas="boxin">
						<h1>Find Home<h1>
						</div>			
						</div>
					</a>
					<a href="advertise.php"> 
							<div class="hbox">
								<div claas="boxin">
								<h1>Advertise Home<h1>
								</div>	
							</div>
					</a>
					<a href="shift.php"> 
						<div class="hbox">
							<div claas="boxin">
							<h1>Shift Home<h1>
							</div>	
						</div>
					</a>
				</div>
				
				<div class="content clear">
					<h1>Welcome to Sylestate.com !</h1>
					<p>Our property management team is dedicated to you—full-time, all the time! Our goal is to maximize your real estate investments while minimizing the problems associated with them. Rent Me Homes is locally owned and family operated. We specialize in East Volusia and Flagler Counties, and manage all styles of property from single-family detached residences to town homes and condos. At Rent Me Homes, we minimize the hassles and risk associated with property management so you have time to take care of everything else that is important in your life. </p>

					<p>We start by answering inquiries seven days a week from 8 am through 10 pm. There is always a live person on call to service potential customers and existing tenants! We show properties 7 days a week, as necessary—holidays included. We have a rigorous screening process, which includes background checks, as well as employment and rental reference verification. And our experience provides us with a keen gut feeling. Once we find an acceptable tenant (and believe me, we turn lots of tenants down), we prepare a lease approved by the Florida Association of Realtors. We email it to you (mail, fax or Fed Ex, as required) for approval, and then present it to the tenant. Prior to the tenant taking occupancy, we document the condition of the property through checklists and digital photos. We collect security deposits as well as the monthly rent. </p>

					<p>We are a full service property management company. We don’t just place a tenant. We manage them. That means emergency calls on holidays. Repairs and maintenance as needed, seven days a week. We have a valuable list of subcontractors who do work for us at better than market price, and they usually will respond to our tenants without charging trip fees, after hour fees or service charges in addition to the work needed. The goal of our organization is to make it seem as though your real estate investments run themselves. We can keep you as involved or as uninvolved as you want to be. In every aspect, we treat your investments, as though they were our own—always! </p>

					<p></p>
					
					<h2> CUSTOMERS ARE OUR BUSINESS AND WE LOVE OUR BUSINESS!</h2>
					<p>IMPORTANT: Please be aware that Rent Me Homes does not advertise on Craigslist. Should you find a property for rent listed by Geri Westfall Adams with Rent Me Homes on Craigslist please be aware that this is a scam and you should not send money to this individual.</p>
				</div>
				
				
			</div>
		
		<?php include 'inc/footer.php' ;?>
	
</body>
</html>

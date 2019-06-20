<?php
	include 'inc/database.php';
	session_start();
?>

<!DOCTYPE html> 
<html>
<head> 
	<title> Sylestate </title>
	<meta charset="UTF-8">


<link rel = "Stylesheet" href="css/findhome.css">
<link rel = "Stylesheet" href="css/headfoot.css">


</head>
 
<body>
	
		<?php include 'inc/header.php' ;?>
		
		<div class="content">
			<h1>All Available Homes </h1>
			<div class="container template clear ">

				<?php

			        if (isset($_GET['pageno'])) {
			            $pageno = $_GET['pageno'];
			        } else {
			            $pageno = 1;
			        }
			        $no_of_records_per_page = 12;
			        $offset = ($pageno-1) * $no_of_records_per_page;

			        $total_pages_sql = "SELECT COUNT(*) FROM home";
			        $result = mysqli_query($conn,$total_pages_sql);
			        $total_rows = mysqli_fetch_array($result)[0];
			        $total_pages = ceil($total_rows / $no_of_records_per_page);

			        $sql = "SELECT * FROM home LIMIT $offset, $no_of_records_per_page";
			        $res_data = mysqli_query($conn,$sql);
			        while($row = mysqli_fetch_array($res_data)){
			           
			       
					// $select = mysqli_query($conn,"SELECT * FROM home LIMIT 0,10");
					// while ($row= mysqli_fetch_array($select)) {

				?>
				<div  class="box">
					   <div class="image">
							<a href="details.php?p_id=<?php echo $row['id']; ?>"> <img src="upload/<?php echo $row['image']; ?>" alt="Photo"/> </a>
					   </div>
						<h4><?php echo $row['home_rent']; ?></h4>
						<h4> Location: <?php echo $row['location']; ?> </h4>	
						<h4> Fare: <?php echo $row['price']; ?> Tk/Month</h4>					   
				</div>
			<?php 
				} 
				mysqli_close($conn);
			?>
			</div>
			
		
			<div class="next ">

				<ul class="pagination">
			        <!-- <li><a href="?pageno=1">First</a></li> -->
			        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
			            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
			        </li>
			        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
			            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
			        </li>
			        <!-- <li><a href="?pageno=<?php //echo $total_pages; ?>">Last</a></li> -->
			    </ul>
			 
			</div>	
		
		</div>
			
		
		
			
		<?php include 'inc/footer.php' ;?>

  
</body>
</html>

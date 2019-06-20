<?php

	include 'inc/database.php';
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title> Sylestate </title>
	<meta charset="UTF-8">

<link rel = "Stylesheet" href="css/shifthome.css">
<link rel = "Stylesheet" href="css/headfoot.css">
	<style type="text/css">
		.row ul li{
			list-style: none;
			display: inline-block;
		}
		.select-css {
		    display: block;
		    font-size: 16px;
		    font-family: sans-serif;
		    font-weight: 700;
		    color: #444;
		    line-height: 1.3;
		    padding: .6em 1.4em .5em .8em;
		    width: 100%;
		    max-width: 100%; 
		    box-sizing: border-box;
		    margin: 0;
		    border: 1px solid #aaa;
		    box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
		    border-radius: .5em;
		    -moz-appearance: none;
		    -webkit-appearance: none;
		    appearance: none;
		    background-color: #fff;
		    background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
		      linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
		    background-repeat: no-repeat, repeat;
		    background-position: right .7em top 50%, 0 0;
		    background-size: .65em auto, 100%;
		}
		.select-css::-ms-expand {
		    display: none;
		}
		.select-css:hover {
		    border-color: #888;
		}
		.select-css:focus {
		    border-color: #aaa;
		    box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
		    box-shadow: 0 0 0 3px -moz-mac-focusring;
		    color: #222; 
		    outline: none;
		}
		.select-css option {
		    font-weight:normal;
		}

		.button {
		  background-color: #4CAF50;
		  border: none;
		  color: black;
		  padding: 10px 20px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  margin: 4px 2px;
		  cursor: pointer;
		  border-radius: 16px;
		}

		.button:hover {
		  background-color: #f1f1f1;
		  color: #4CAF50;
		  border:2px solid #4CAF50;
		}

	</style>

</head>

<body>
	<?php include 'inc/header.php' ;?>
	<div class="row" style="margin-top: 30px;">
		<form action="search.php" method="POST">
			<ul style="margin-left: 100px;">
				<li><h3>Filter Search</h3></li>
				<li></li>
				<li></li>
				<li></li>
				<li>
					<select class="select-css" style="width:200px;" name="filter_location">
						<option selected="selected">SELECT LOCATION</option>
						<option value="Shibgonj">Shibgonj</option>
						<option value="Subidbazar">Subidbazar</option>
						<option value="Uposhohor">Uposhohor</option>
						<option value="Lamabazar">Lamabazar</option>
					</select>
				</li>
				<li>
					<select class="select-css" style="width:200px;" name="filer_room">
						<option selected="selected">SELECT NO. ROOM</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</li>
				<li>
					<select class="select-css" style="width:200px;" name="filter_price">
						<option selected="selected">SELECT PRICE</option>
						<option value="2000">2000</option>
						<option value="5000">5000</option>
						<option value="7000">7000</option>
						<option value="10000">10000</option>
					</select>
				</li>
				<li><button class="button" type="submit" name="submit_filter">FILTER</button></li>
			</ul>
		</form>
	</div>

	<div align="center" style="margin-top: 30px;">
		<?php

			if (isset($_POST['submit_filter'])) {
				$filter_location = $_POST['filter_location'];
				$filer_room = $_POST['filer_room'];
				$filter_price = $_POST['filter_price'];


				
					$SEL = mysqli_query($conn, "SELECT * FROM home WHERE location = '$filter_location' OR num_room = '$filer_room' OR price = '$filter_price'");
					if (mysqli_num_rows($SEL) >= 1) {
						while ($row = mysqli_fetch_array($SEL)) {
		?>

		<div  class="box clear">
		   <div class="image clear">
				<a href="details.php?p_id=<?php echo $row['id']; ?>"> <img src="upload/<?php echo $row['image']; ?>" alt="Photo"/> </a>
		   </div>
			<h4><?php echo $row['home_rent']; ?></h4>
			<h3> Fare: <?php echo $row['price']; ?> Tk/M</h3>
			<h3> Location: <?php echo $row['location']; ?></h3>
		</div>

		<?php
					}
				} else {
					echo "<div align='center'><p style='color:red;'><b>NO HOUSE FOUND IN THIS LOCATION</p></div>";
				}
			
		}
		?>
	</div>


	<div align="center" style="margin-top: 30px;">
				<?php

				    if (isset($_POST['search_btn'])) {

						$search = $_POST['search'];

						$sql = "SELECT * FROM home WHERE location LIKE '%$search%'";

						$result = mysqli_query($conn, $sql);
						$queryResult = mysqli_num_rows($result);
						if ($queryResult > 0) {
						?>

						<div class="recent">
				          <h4 align="center"><?php echo "There are ".$queryResult." result of your search query '".$search; echo "'" ?></h4>
				        </div>

				      	<?php
				                while ($row = mysqli_fetch_array($result)) {
				            ?>
				                <div  class="box clear">
								   <div class="image clear">
										<a href="details.php?p_id=<?php echo $row['id']; ?>"> <img src="upload/<?php echo $row['image']; ?>" alt="Photo"/> </a>
								   </div>
									<h4><?php echo $row['home_rent']; ?></h4>
									<h3> Fare: <?php echo $row['price']; ?> Tk/M</h3>
									<h3> Location: <?php echo $row['location']; ?></h3>
								</div>

				            <?php } ?>
				        </div>

						<?php
								}  else {  ?>

						<div align="center" class="center grey lighten-3" style="margin-top: 100px;">
				          <h4 align="center"><?php echo "There are No result of your search query".$search; ?></h4>
				          <br>
				          <a href ="find.php" style="height: 50px; width: 100px; background-color: #111; color: #fff; box-shadow: 0.5px 0.5px 0.5px 0.5px #111;">GO BACK</a>
				        </div>
				<?php
				    	}
					}

				?>
		</div>

</body>
</html>

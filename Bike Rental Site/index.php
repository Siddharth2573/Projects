
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Bike Rental</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	
       
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
     
</head>

<body>
     
      <section class="">
		<?php
			include 'header.php';
		?>

			<section class="caption">
				<h2 class="caption" style="text-align: center">Find You Dream Bikes For Hire</h2>
				<h3 class="properties" style="text-align: center">Royal Enfield - KTM RC - Ducati</h3>
			</section>
	</section><!--  end hero section  -->

	<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
			<?php
						include 'includes/config.php';
						$sel = "SELECT * FROM bikes WHERE status = 'Available'";
						$rs = $conn->query($sel);
						while($rws = $rs->fetch_assoc()){
			?>
				<li>
					<a href="book_bike.php?id=<?php echo $rws['bike_id'] ?>">
						<img class="thumb" src="bikes/<?php echo $rws['image'];?>" width="300" height="200">
					</a>
					<span class="price"><?php echo 'INR:-'.$rws['hire_cost'];?> /Day</span>
					<div class="property_details">
						<h1>
							<a href="book_bike.php?id=<?php echo $rws['bike_id'] ?>"><?php echo 'Bike Type>'.$rws['bike_type'];?></a>
						</h1>
						<h2>Bike Name/Model: <span class="property_size"><?php echo $rws['bike_name'];?></span></h2>
					</div>
				</li>
			<?php
				}
			?>
			</ul>
		</div>
	</section>	<!--  end listing section  -->

	
	<footer>
   

	
		<div class="wrapper footer">
         
			<ul>
				<li class="links">
					<ul>
						<li>OUR COMPANY</li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Policy</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</li>

			

				<li class="links">
					<ul>
						<li>OUR BIKE TYPES</li>
						<li><a href="#">Royal Enfield</a></li>
						<li><a href="#">KTM RC</a></li>
						<li><a href="#">Ducati</a></li>
						<li><a href="#">Others.</a></li>
					</ul>
				</li>

                                 	<li class="links">
					<ul>
						<li>Have a Questions?</li>
						<pre><li><a href="#"><i class="material-icons" style="font-size:17px">add_location</i>  3rd floor Hotel Suraj
       
        Birgunj,Nepal</a></li>
						
<li><a href="#"><i class="fa fa-fw fa-phone"></i> +91 984 5627 810</a></li>
						<li><a href="#"><i class="fa fa-fw fa-envelope"></i> non_reply@gmail.com</a></li>
						
					</ul>
				</li></pre>

</body>
				<?php include_once "includes/footer.php"; ?>
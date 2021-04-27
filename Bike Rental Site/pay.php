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
				<h3 style="text-decoration: underline">Make Payments Here</h3>
				<h5>Paybill Number: 00000</h5>
				<h6>Business Number: ID Number Registered with.</h6>
				<form method="post">
					<table>
						<tr>
							<td>MPESA Transaction ID:</td>
							<td><input type="text" name="mpesa" required></td>
						</tr>
						<tr>
							<td>National ID Number:</td>
							<td><input type="text" name="id_no" required></td>
						</tr>
						
						<tr>
							<td colspan="2" style="text-align:right"><input type="submit" name="pay" value="Submit Details"></td>
						</tr>
					</table>
				</form>
				<?php
						if(isset($_POST['pay'])){
							include 'includes/config.php';
							$mpesa = $_POST['mpesa'];
							$id_no = $_POST['id_no'];
							
							$qry = "UPDATE client SET mpesa = '$mpesa' WHERE id_no = '$id_no'";
							$result = $conn->query($qry);
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											alert(\"Payment Successfully Done. Wait for Admin Approval\");
											window.location = (\"wait.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Registration Failed. Try Again\");
											window.location = (\"pay.php\")
											</script>";
							}
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

					<?php include_once "includes/footer.php" ?>
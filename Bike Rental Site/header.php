<?php
	session_start();
	error_reporting("E-NOTICE");
?>
			
<!DOCTYPE HTML>
<html lang="en">
<head>
<header>
<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
			<div class="wrapper">
			<h1 class="logo"> Bike Company</h1>
				<a href="#" class="hamburger"></a>
				<nav>
					<?php
						if(!$_SESSION['email'] && (!$_SESSION['pass'])){
					?>
					<ul>
						<li><a href="index.php"><i class="fa fa-fw fa-home"></i> HOME</a></li>
						<li><a href="index.php"><i class="fa fa-fw fa-user"></i> ABOUT</a></li>
						<li><a href="index.php"><i class="fa fa-fw fa-wrench"></i> SERVICES</a></li>
						<li><a href="index.php"><i class="fa fa-fw fa-envelope"></i> CONTACT</a></li>
					</ul>
                                            
					<nat>
                                   <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Client Login </button>
                                   <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Admin Login </button></nat>
		
                     <div id="id01" class="modall">                   
  
  <form class="modall-content animate" action="#" method="post">  
 <div class="imgcontainerr">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modall">&times;</span>
      <img src="img/avtar.jpg" alt="Avatar" class="avatar">
    </div> 
      <label><center><b>Admin Login</b></center></label>                                    
<div class="containerr">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pass" required>
        
      <button type="submit" name="login">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>

</div>
    <div class="containerr" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="pass">Forgot <a href="#">Password?</a></span>
    </div>
</div>
</form>

<?php
                            
				if(isset($_POST['login'])){
                                     include 'includes/config.php';
					$uname = $_POST['uname'];
					$pass = $_POST['pass'];
					
					$query = "SELECT * FROM admin WHERE uname = '$uname' AND pass = '$pass'";
                                        $rs = $conn->query($query);
					$num = $rs->num_rows;
					$rows = $rs->fetch_assoc();
					if($num > 0){
						session_start();
						$_SESSION['uname'] = $rows['uname'];
						$_SESSION['pass'] = $rows['pass'];
						echo "<script type = \"text/javascript\">
									alert(\"Login Successful.................\");
									window.location = (\"admin/index.php\")
									</script>";
				        
							 } 
							 
					
                                                 else{
						echo "<script type = \"text/javascript\">
									alert(\"Login Failed. Try Again................\");
									window.location = (\"#\")
									</script>";
					}
				}
			?>                     
<script>
// Get the modall
var modall = document.getElementById('id01');

// When the user clicks anywhere outside of the modall, close it
window.onclick = function(event) {
    if (event.target == modall) {
        modall.style.display = "none";
    }
}
</script>

<section class="search">
		<div class="wrapper">
		<div id="fom">
<div id="id02" class="modal">
                                   
			<form class="modal-content animate" action="#" method="post">
                        <div class="imgcontainerr">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/avtar.jpg" alt="Avatar" class="avatar">
    </div>
			<div class="containerr">
                                          
					        <label><center><b>Client Login</b></center></label><br>
                                                 
						<label><b>Email Address:-</b></label><br>
						<input type="text" name="email" placeholder="Enter Email Address" required><br>
					  
						<label><b>Password:-</b></label>
						<input type="password" name="pass" placeholder="Enter ID Number" required>
					
					        <button type="submit" name="log">Login Here</button>
						<button type="submit"><a href="signup.php">Sigup Here</a></button>
						
                                                <label>
                                               <input type="checkbox" checked="checked" name="remember"> Remember me
                                               </label>
     


</div>
    <div class="containerr" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="pass">Forgot <a href="#">Password?</a></span>
    </div>
</div>
					
				
                              </div>
			</form>

<?php
				if(isset($_POST['log'])){
					include 'includes/config.php';
					
					$uname = $_POST['email'];
					$pass = $_POST['pass'];
					
					$qy = "SELECT * FROM client WHERE email = '$uname' AND id_no = '$pass'";
					$log = $conn->query($qy);
					$num = $log->num_rows;
					$row = $log->fetch_assoc();
					if($num > 0){
						session_start();
						$_SESSION['email'] = $row['email'];
						$_SESSION['pass'] = $row['id_no'];
						echo "<script type = \"text/javascript\">
									alert(\"Login Successful....................\");
					    			window.location = (\"index.php\")
									</script>";

					} else{
						echo "<script type = \"text/javascript\">
									alert(\"Login Failed. Try Again................\");
									window.location = (\"#\")
									</script>";
					}
				}
			?>
      </div>
    </div>
</section>
<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
 
    <?php
						} else{
					?>
							<ul>
								<li><a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a></li>
								<li><a href="status.php"><i class="fa fa-fw fa-eye open"></i> View Status</a></li>
								<li><a href="#"><i class="fa fa-fw fa-envelope"></i> Message Admin</a></li>
							</ul>
					<nat><a href="admin/logout.php">Logout</a></nat>
					<?php
						}
					?>
				</nav>

			</div>

		</header>
                      

</html>
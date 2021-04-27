<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "bikes";
	
	$conn = new mysqli($host, $user, $pass, $db);
	if($conn->connect_error){
		echo "Failed:" . $conn->connect_error;
	}
?>

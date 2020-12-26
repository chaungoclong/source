<?php 
	$conn = new mysqli("localhost", "root", "", "football");
	if($conn->connect_error){
		die("connect error".$conn->connect_error);
	}
 ?>
<?php 
	$conn = new mysqli('localhost', 'root', '', 'signup');
	if($conn->connect_error){
		die("connection failed<br><br>".$$conn->connect_error);
	}
?>
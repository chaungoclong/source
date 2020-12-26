<?php 
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'signup';
	//tao ket noi
	$conn = new mysqli($host, $user, $pass, $db);
	//kiem tra ket noi
	if($conn->connect_error){
		die('connection failed '.$conn->connect_error);
	}
	
?>
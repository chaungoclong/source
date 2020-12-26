<?php 
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'signup';
	$conn = new mysqli($host, $user, $pass, $db);
	if($conn->connect_error){
		die('ket noi khong thanh cong'.$conn->connect_error);
	}
	else{
		echo "ket noi thanh cong";
	}
?>
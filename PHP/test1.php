<?php 
session_start();
	$_SESSION['x'] = 20;
	setcookie('y', 20, time()+3600);
	header('location: test2.php');
?>
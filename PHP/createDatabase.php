<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php 
	//connection
		$conn = mysqli_connect('localhost', 'root', '');
		if(!$conn){
			echo('connection failed!!! '.mysqli_connect_error());
		}
	//create database
	$sql = 'CREATE DATABASE DEMO';
	if(mysqli_query($conn, $sql)){
		echo "successfully created the database<br>";
	}
	else{
		echo mysqli_error($conn);
	}
	?>
</body>
</html>
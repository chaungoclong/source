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
		$conn = mysqli_connect('localhost', 'root', '', 'demo');
		if(!$conn){
			echo("connection failed!!! ".mysqli_connect_error());
		}
		//create table
		$sql = 'CREATE TABLE HANGHOA(ID INT PRIMARY KEY, NAME VARCHAR(50), AMOUNT INT)';
		if(mysqli_query($conn, $sql)){
			echo "successfully created the table<br>";
		}
		else{
			echo mysqli_error($conn);
		}
	?>
</body>
</html>
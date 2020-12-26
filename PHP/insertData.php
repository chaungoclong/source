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
			echo "connection failed!!! ".mysqli_connect_error();
		}
		//insert data
		/*$sql = 'INSERT INTO HANGHOA(ID, NAME, AMOUNT) VALUES
				(1, "bomb", 12345),
				(2, "mine", 1234),
				(3, "gun", 123)
				';
		if(mysqli_query($conn, $sql)){
			echo "successfully inserted<br>";
		}
		else{
			echo "failed";
		}*/
	?>
</body>
</html>
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
		$conn = mysqli_connect('localhost', 'root', '', 'hocsinh');
		if(!$conn){
			echo "connection failed!!! ".mysqli_connect_error();
		}
		//select data
		$sql = 'SELECT * FROM INFO';
		$result = (mysqli_query($conn, $sql));
		//kiem tra du lieu tra ve khong rong(so hang > 0)
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				echo $row['NAME']."<br>";
			}
		}
		else{
			echo '0 result<br>';
		}
	?>
</body>
</html>
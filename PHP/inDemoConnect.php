<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
	$conn = mysqli_connect('localhost', 'root', '', 'listbomb');
	if(!$conn) echo 'ket noi khong thanh cong<br>';
	else echo 'ket noi thanh cong<br>';
	$conn2 = mysqli_connect('localhost', 'root', '', 'hocsinh');
	if($conn2) echo "conn2<br>";
	else echo "not conn2<br>";

	$s = "CREATE TABLE INFO(ID INT PRIMARY KEY, NAME VARCHAR(50), ADDRESS VARCHAR(100))";
	if(mysqli_query($conn2, $s)){
		echo "HOCSINH<br>";
	}
	else  echo "Error: " . $s . "<br>" . mysqli_error($conn);

	$sqll = "SELECT * FROM typeofbomb WHERE id > 2";
	$kq = mysqli_query($conn, $sqll);
	if(mysqli_num_rows($kq) > 0){
		while($row = mysqli_fetch_assoc($kq)){
			echo $row['id']." ".$row['name']."<br>";
		}
	}
	?>
</body>
</html>
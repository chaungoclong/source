<?php 
	$conn = mysqli_connect('localhost', 'root', '', 'signup');
	if($conn){
		$sql = "CREATE TABLE USER(ID INT PRIMARY KEY, USERNAME VARCHAR(100), PASSWORD VARCHAR(50), PHONE VARCHAR(15))";
		if(mysqli_query($conn, $sql)){
			echo 'ok';
		}
	}
?>
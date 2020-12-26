<?php 
	//connect to database
	include 'ExConnect.php';
	if($checkOk && isset($_POST['signup'])){
		$sql="INSERT INTO acc(username, pass, img) VALUES(?, ?, ?)";
		$tmp=$conn->prepare($sql);
		$tmp->bind_param("sss", $data['user'], $data['pass'], $data['img']);
		if($tmp->execute()){
			echo "sign up: ok<br><br>";
			header('location: ExHome.php');
		}
		else{
			echo "sign up: no<br><br>";
		}
		$tmp->close();
	}
?>
<?php 
	//connect to database
	include 'ExConnect.php';
	if($checkOk && isset($_POST["signin"])){
		$sql="SELECT username, pass FROM acc WHERE username=? AND pass=?";
		$tmp = $conn->prepare($sql);
		$tmp->bind_param("ss", $data['user'], $data['pass']);
		$tmp->execute();
		$tmp->store_result();
		if($tmp->num_rows){
			echo "sign in: ok<br><br>";
			header('location: ExHome.php');
		}
		else{
			echo "sign in: no<br><br>";
		}
		$tmp->free_result();
		$tmp->close();
	}
?>
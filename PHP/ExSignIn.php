<?php 
	if(isset($_POST["signin"])){
		$_SESSION['user'] = $_POST['user'];
		$_SESSION['pass'] = $_POST['pass'];
		//check input
		include 'ExCheckInput.php';
		//check data
		include 'ExCheckAcc.php';
	}
?>
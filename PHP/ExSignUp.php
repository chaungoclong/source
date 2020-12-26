<?php 
	if(isset($_POST["signup"])){
		$_SESSION['user'] = $_POST['user'];
		$_SESSION['pass'] = $_POST['pass'];
		//check input
		include 'ExCheckInput.php';
		//insert vao database;
		include 'ExAddAccount.php';
	}
?>
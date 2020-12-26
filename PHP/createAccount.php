<?php 
	if(isset($_POST['send2'])){
		$newUser = $_POST['name'];
		$newPass = $_POST['pass'];
		//tạo phiên
		$_SESSION['name'] = $_POST['name'];
		$_SESSION['pass'] = $_POST['pass'];
		//thêm dữ liệu vào database
		$sql = "INSERT INTO listuser(name, pass) VALUES(?, ?)";
		$tmp = $conn->prepare($sql);
		$tmp->bind_param("ss", $newUser, $newPass);
		if($tmp->execute()){
			echo "CREATE ACCOUNT SUCCESSFULLY";
			header('location: showsession.php');
		}
		else{
			echo "CREATE ACCOUNT UNSUCCESSFUL";
		}
	}
?>
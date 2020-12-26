<?php 
	session_start();
	//kết nối với database
	include 'connectBySessionUnit.php';
	//kiểm tra thông tin đăng nhập (user, password)
	include 'checkInfoSignIn.php';
	//tạo tài khoản 
	include 'createAccount.php'
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="session.php" method="post">
		<input type="text" name="name"><br>
		<input type="password" name="pass"><br>
		<input type="submit" name="send" value="sign in">&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="submit" name="send2" value="sign up"><br>
	</form>
</body>
</html>
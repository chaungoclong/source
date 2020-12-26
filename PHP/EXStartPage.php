<?php 
	session_start();
	//sign in
	include 'ExSignIn.php';
	//sign up
	include 'ExSignUp.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>START PAGE</title>
</head>
<body>
	<script src="../JS/ExCheckInput.js"></script>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
		User: <input type="text" name="user" id="user" placeholder="your name" onkeyup="checkInput(this.id);"/>
		<span><?php if(isset($error['user'])) echo $error['user'] ?></span>
		<br><br>
		Password: <input type="password" name="pass" id="pass" placeholder="your password"  onkeyup="checkInput(this.id);"/>
		<span><?php if(isset($error['pass'])) echo $error['pass'] ?></span>
		<br><br>
		<input type="submit" name="signin" value="SIGN IN"/>
		<input type="submit" name="signup" value="SIGN UP"/>
	</form>
</body>
</html>
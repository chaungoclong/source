<?php
	$error = ['user'=>'', 'pass'=>'', 'img'=>''];//error
	$data = ['user'=>'', 'pass'=>'', 'img'=>'']; //data
	$checkOk = 1;//bien flag kiem tra du lieu co du dieu kien de kiem tra hay them vao database hay khong

	if(empty($_POST['user'])){
		$error['user'] = "* user<br>";
		$checkOk = 0;
	}
	else{
		$data['user'] = checkInput($_POST['user']);
		$_SESSION['user'] = $data['user'];
		if(!preg_match("/^[a-zA-Z]+[\w]+$/", $data['user'])){
			$error['user'] = "* user failed<br>";
			$checkOk = 0;
		}
	}

	if(empty($_POST['pass'])){
		$error['pass']= "* password<br>";
	}
	else{
		$data['pass'] = checkInput($_POST['pass']);
		$_SESSION['pass'] = $data['pass'];
		if(!preg_match("/.{8,}/", $data['pass'])){
			$error['pass'] = "* password failed<br>";
			$checkOk = 0;
		}
	}

	echo '$checkOk:'.$checkOk;

	function checkInput($val){
		$val = trim($val);
		$val = stripcslashes($val);
		$val = htmlspecialchars($val);
		return $val;
	}
	/*setcookie('user', $error['user'], time() + 100);
	setcookie('pass', $error['pass'], time() + 100);*/
?>
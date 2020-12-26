<?php 
	session_start();
	include("account.php");
 ?>
 
 <?php
 	$account = new Tai_khoan(); 
 	if(isset($_GET['action']) && $_GET['action'] == "signup"){
 		$account->dang_ky();
 		setcookie("status", "signup", time()+3600);
 	}
 	else if(isset($_GET['action']) && $_GET['action'] == "login"){
 		$account->dang_nhap();
 		setcookie("status", "login", time()+3600);
 	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shop Gái Xinh</title>
	<link rel="stylesheet" href="girls.css">
</head>
<body>
	<div class="top_line">
		<?php  ?>
		<a class="top_line_1" href="index.php?action=login">Đăng nhập</a>
		<a class="top_line_1" href="index.php?action=signup">Đăng ký</a>
		<a id="top_line_3" href="cart.php" id="icon_text">
			<span class="icon"></span>
			<span class="text">Giỏ hàng</span>
		</a>
	</div>

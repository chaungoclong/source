
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../CSS/thuoc_no.css">
</head>
<body>

	<div class="header">
		<h1>THUỐC NỔ</h1>
		 <form action="" method="get">
			TÌM KIẾM: <input type="search" name="tim_kiem" value="<?php if(isset($tim_kiem)) echo $tim_kiem; ?>">
			<br><br>
		</form>
	</div>

	<div class="topnav">
		<a class="home" href="#">HOME</a>
		<a href="thuoc_no_insert.php">THÊM DỮ LIỆU</a>
	</div>
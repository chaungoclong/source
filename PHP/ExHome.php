<?php 
	session_start();
	include 'ExConnect.php';
	include 'ExGetDataFromDb.php';
	//lấy dữ liệu từ database khi load vào trang nếu đã đăng nhập hoặc đăng kí
	if(isset($_SESSION['user'], $_SESSION['pass'])){
		$arr = getData($conn, $_SESSION['user'], $_SESSION['pass']);
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="" method="post">
		<table border="1px" align="center">
			<tr style='background-color:blue;'>
				<td>
					<figure >
						<img style="margin: 50px;" align="center" src="<?php if(isset($arr[3])) echo $arr[3];?>" width="120px" height="200px"/>
						<figcaption style="color: white; font-size: 20px; text-align: center;"><?php if(isset($_SESSION['user']))echo $_SESSION['user']."'s girlfriend"; ?></figcaption>
					</figure>
				</td>
			</tr>

			<tr style='background-color: green;'>
				<td style=" text-align: center;">
					<?php 
						if(empty($arr[3])){
							echo(
								"<button><a href='ExFileImg.php'>TẢI ẢNH LÊN</a></button>"
							);
						}
						else{
							echo(
								"<button><a href='ExFileImg.php'>THAY ĐỔI ẢNH</a></button>"
							);
						}
					?>
				</td>
			</tr>

			<tr>
				<td style=" text-align: center;">
					<button><a href="ExGetMark.php">Xem điểm</a></button>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
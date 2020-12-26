<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php 
	echo $_COOKIE['img'];
		//BIẾN TOÀN CỤC
		$sql = '';//câu truy vấn sql
		$data = ['name'=>'', 'email'=>'', 'comment'=>'', 'gender'=>''];//mảng chứa các dữ liệu
		$error = ['all'=>'', 'name'=>'', 'email'=>'', 'comment'=>'', 'gender'=>''];//mảng chứa các lỗi
		$tmp;//
		$folderPath = "../UPLOADS/";

		//$filePath = $folderPath.basename()
		//KẾT NÓI VỚI DATABASE
		include 'connXacNhanForm.php';

		//KIỂM TRA ĐẦU VÀO
		include 'XacNhanFormCheckInput.php';

		//INSERT DATA
		include 'insertXacNhanForm.php';
	?>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
		<h1>COMMENT</h1>
		<img height="150px" width="100px" 
			src="<?php 
					if(isset($_COOKIE['img'])){
						echo $_COOKIE['img'];

					}
					else{
						echo "https://tintaynguyen.com/wp-content/uploads/2020/03/1583688591-8584-to-1-15792449059781593332846.jpg";
					}
				?>"
		>
		<?php echo $error['all'];?>
		<br><br>
		Name: <input type="text" name="name">
		<?php echo $error['name'];?>
		<br><br>
		E-mail: <input type="text" name="email">
		<?php echo $error['email'];?>
		<br><br>
		Comment: <textarea name="comment" rows="5" cols="40"></textarea>
		<?php echo $error['comment'];?>
		<br><br>
		Gender: 
			<input type="radio" name="gender" value="male">male
			<input type="radio" name="gender" value="female">female
			<input type="radio" name="gender" value="other">other
			<?php echo $error['gender'];?>
		<br><br>
		<input type="submit" name="submit" value="SUBMIT">
		<button><a href="XacNhanFormShowFeedBack.php">Đánh giá của khách hàng về thuốc nổ của chúng tôi</a></button>
		<button><a href="XacNhanFormImg.php">thêm ảnh đại diện</a></button>

	</form>
	
</body>
</html>
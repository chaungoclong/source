<?php 
		include 'connXacNhanForm.php';
		echo $_COOKIE['name'];
		$folderPath = "../UPLOADS/";
		$filePath;//đường dẫn đến file
		$typeFile;//loại file
		$uploadOK = 1;
		//kiem tra da co du lieu chua
		if(isset($_POST['upload'])){
			$filePath = $folderPath.basename($_FILES['img']['name']);
			$typeFile = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));
			$uploadOK = 1;
		//kiem tra file khong bi loi
			if(!$_FILES['img']['error']){
				//kiem tra loai file
				if($typeFile != 'jpg' && $typeFile != 'jpeg' && $typeFile != 'png' && $typeFile != 'gif'){
					echo "VUI LÒNG CHỌN FILE ẢNH<BR>";
					$uploadOK = 0;
				}
				//kiem tra file da ton tai chua
				/*if(file_exists($filePath)){
					echo "FILE DA TON TAI, VUI LONG CHON FILE KHAC<BR>";
					$uploadOK = 0;
				}*/
				//upload file
				if($uploadOK){
					if(move_uploaded_file($_FILES['img']['tmp_name'], $filePath)){
						echo "ĐÃ TẢI LÊN<BR>";
						$sql = "INSERT INTO feedback(image) VALUES(?)";
						$tmp = $conn->prepare($sql);
						$tmp->bind_param("s", $filePath);
						$tmp->execute();
						$tmp->close();
					}
					else{
						echo "TẢI LÊN KHÔNG THÀNH CÔNG<BR>";
					}
				}
			}
			else{
				echo "FILE LỖI, VUI LÒNG CHỌN LẠI FILE<BR>";
			}
			//setcookie và refresh lại trang chính
			setcookie('img', $filePath, time()+10000);
			header('Refresh:0; url=xacNhanForm.php');
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
	<img height="150px" width="150px" src="<?php if(isset( $_COOKIE['img'])) echo $_COOKIE['img'];?>">
	<?php echo $_COOKIE['img'];?>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
		<input type="file" name="img">
		<input type="submit" name="upload" value="UPLOAD">
	</form>
</body>
</html>
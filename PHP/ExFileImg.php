<?php 
	session_start();
	//KẾT NỐI VỚI DATABASE
	include 'ExConnect.php';
	//các thành phần của đường dẫn file ảnh
	$folderPath="../UPLOADS/";
	$filePath=$typeFile='';
	$uploadOK=1;

//NẾU CÓ DỮ LIỆU GỬI LÊN THÌ KIỂM TRA DỮ LIỆU SAU ĐÓ TẢI DỮ LIỆU LÊN 
	if(isset($_POST['sendimg'])){
		if(!$_FILES['img']['error']){
			//nếu file không lỗi thì xác định đường dẫn xủa file và loại file
			$filePath=$folderPath.basename($_FILES['img']['name']);
			$typeFile=strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));
			//kiểm tra file ảnh
			if($typeFile!="jpg" && $typeFile!="jpeg" && $typeFile!="png" && $typeFile!="gif"){
				$uploadOK=0;
				echo "VUI LÒNG CHỌN FILE ẢNH<br>";
			}
		}
		else{
			$uploadOK = 0;
		}
		//tải ảnh lên và thêm đường dẫn của ảnh vào database
		if($uploadOK){
			if(move_uploaded_file($_FILES['img']['tmp_name'], $filePath)){
				$_SESSION['img']=$filePath;
				include 'ExfunctionFile.php';
				if(isset($_SESSION['user'], $_SESSION['pass'])){
					updatefile($conn, $_SESSION['user'], $_SESSION['pass'], $filePath);
					header('location: ExHome.php');
				}
				
			}
			else{
				echo "CÓ LỖI KHI TẢI ẢNH LÊN, VUI LÒNG THỬ LẠI<BR>";
			}
		}
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
	<form action="ExFileImg.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="img">
		<input type="submit" name="sendimg" value="TẢI ẢNH LÊN">

	</form>
</body>
</html>
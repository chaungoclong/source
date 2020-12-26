<?php 
if(isset($_POST['upload'])){
	var_dump($_FILES['upfile']);
		$folderPath = 'C:/xampp/htdocs/web/upload/';//đường dẫn thư mục
		$filePath = $folderPath.basename($_FILES['upfile']['name']);//dường dẫn vị trí lưu file{vị trí thư mục lưu + tên file}

		$typeFile = strtolower(pathinfo($_FILES['upfile']['name'], PATHINFO_EXTENSION));
		if(!$_FILES['upfile']['error']){
			echo '<br>'.$folderPath.'<br>'.$filePath.'<br>'.$typeFile.'<br>';
			if(move_uploaded_file($_FILES['upfile']['tmp_name'], $filePath)){
				echo "uploaded<br>";
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
		<form action="uploadFile.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="upfile">
			<input type="submit" name="upload" value="tải lên">
		</form>
	</body>
	</html>
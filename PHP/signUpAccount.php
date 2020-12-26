<?php 
	//kết nối
	$conn = mysqli_connect('localhost', 'root', '', 'signup');
	if(!$conn){
		echo "connection failed ".mysqli_connect_error();
	}
	$insert = true;

	if(isset($_POST['send'])){
		$folderPath = '../UPLOADS/';
		$filePath = $folderPath.$_FILES['image']['name'];
		$typeFile = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$phone = $_POST['phone'];
		$age = $_POST['age'];
		$sql = "INSERT INTO info(USERNAME, PASS, PHONE, AGE, IMAGE) VALUES
				('$user', '$pass', '$phone', $age, '$filePath')";

		$emptyValue = [];//mảng chứa tên các thuộc tính rỗng
		//kiểm tra các thuộc tính có rỗng không
		if($user == '' || $pass == '' || $phone == '' || $age == ''){
			$emptyValue['user'] = ($user == '') ? 'user' : '';
			$emptyValue['pass'] = ($pass == '') ? 'password' : '';
			$emptyValue['phone'] = ($phone == '') ? 'phone' : '';
			$emptyValue['age'] = ($age == '') ? 'age' : '';
			echo implode(' ', $emptyValue).' is empty';
			$insert = false;
		}
		//kiểm tra tuổi
		if($age < 0){
			echo "<H5>TUỔI PHẢI LỚN HƠN 0</H5>";
			$insert = false;
		}

		if($typeFile != 'png' && $typeFile != 'jpg' && $typeFile != 'jpeg' && $typeFile != 'gif'){
			echo 'VUI LÒNG CHỌN FILE ẢNH';
			$insert = false;
		}
		
		if($insert){
			if(mysqli_query($conn, $sql)){
				echo "ĐĂNG KÍ THÀNH CÔNG";
				move_uploaded_file($_FILES['image']['tmp_name'], $filePath);
				echo("<a href='$filePath'>dowload</a>");

			}
			else{
				echo mysqli_error($conn);
			}
		}
	}
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1 id="h1"></h1>
	
	<script language="javascript">
		//kiem tra du lieu nhap vao
		function checkInput(id){
			var val = document.getElementById(id);
			//console.log(val.value);
			if(val.value == ""){
				console.log('red');
				console.log(val.value == "");
				document.getElementById(id).style.backgroundColor = 'red';
			}
			else{
				console.log('white');
				console.log(val.value == "");

				if(val.type == 'number' && val.value <= 0){
					console.log(val.type == 'number' && !isNumber(val.value));
					document.getElementById(id).style.backgroundColor = 'red';
				}
				else{
					console.log('ok');
					document.getElementById(id).style.backgroundColor = 'white';
				}
			}
		}
		function checkAll(){
			var listID = ['user', 'pass', 'phone', 'age'];
		
			for(var id of listID){
				checkInput(id);
			}
		}
	</script>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
		<table border="1px" align="center">
			<tr>
				<td>Tên người dùng</td>
				<td align="center">
					<input size="50" type="text" name="user" id="user" placeholder="user" oninput="checkInput(this.id);">
				</td>
			</tr>

			<tr>
				<td>Mật khẩu</td>
				<td align="center">
					<input size="50" type="password" name="pass" id="pass" placeholder="password" oninput="checkInput(this.id);">
				</td>
			</tr>

			<tr>
				<td>Số điện thoại</td>
				<td align="center">
					<input size="50" type="text" name="phone" id="phone" placeholder="your number phone" oninput="checkInput(this.id);">
				</td>
			</tr>

			<tr>
				<td>Tuổi</td>
				<td align="left">
					<input type="number" name="age" id="age" placeholder="your age" oninput="checkInput(this.id);">
				</td>
			</tr>

			<tr>
				<td>chọn ảnh:</td>
				<td align="left">
					<input type="file" name="image">
				</td>
			</tr>

			<tr align="left">
				<td colspan="2">
					<input type="submit" name="send" id="send" value="sign up" onclick="checkAll();">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>

			
			
			
			
			
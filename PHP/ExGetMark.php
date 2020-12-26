<?php 
	session_start();
	include 'ExConnect.php';
	function getMark($conn, $id, $name){
		$result = [];
		if(isset($conn, $id, $name)){
			$sql = "SELECT * FROM mark WHERE id=? AND name=?";
			$tmp = $conn->prepare($sql);
			$tmp->bind_param("ss", $id, $name);
			$tmp->execute();
			$kq = $tmp->get_result();
			if($kq->num_rows){
				while($row = $kq->fetch_assoc()){
					$result[0] = $row['id'];
					$result[1] = $row['name'];
					$result[2] = $row['point'];
				}
			}
			else{
				$result[0] = 0;
			}
		}
		return $result;
	}

	$show = 1;//nếu có kết quả trả về thì show = 1 -> in kết quả ra
	if(isset($_POST['sendinfo'])){
		$show = 1;
		$id = checkInput($_POST['sbd']);
		$name = checkInput($_POST['name']);
		$result = getMark($conn, $id, $name);
		if((INT)$result[0] == 0 && is_numeric($result[0])){
				$show = 0;
		}
	}

	function checkInput($val){
		$val = trim($val);
		$val = stripslashes($val);
		$val = htmlspecialchars($val);
		return $val;
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
	<marquee><h1>XEM ĐIỂM THI TỐT NGHIỆP THPTQG 3030</h1></marquee>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		SBD: <input type="text" name="sbd" placeholder="Số báo danh của bạn"/>
		<br><br>
		TÊN: <input type="text" name="name" placeholder="Tên của bạn"/>
		<br><br>
		<input type="submit" name="sendinfo" value="OK">
		<div style="margin-top: 50px;">
			<?php 
				if(isset($_POST['sendinfo']) && $show) include 'ExShowMark.php';
				else if(isset($_POST['sendinfo']) && !$show) echo "<span style='color: red;'>Không có kết quả</span><br>";
			?>
		</div>
	</form>
</body>
</html>
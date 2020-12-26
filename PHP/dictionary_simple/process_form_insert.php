<?php 
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		include "connect.php";
		$eng = $_GET["eng"];
		$vie = $_GET["vie"];
		$intro_e = $_GET["intro_e"];
		$intro_v = $_GET["intro_v"];
		$full_en = $_GET["full_en"];
		$full_vi = $_GET["full_vi"];
		//kiểm tra từ đã tồn tại chưa
		$sql = "SELECT * FROM tu_dien WHERE eng LIKE('%$eng%')";
		$kiem_tra = $conn->query($sql);
		//thêm từ nếu chưa tồn tại
		if($kiem_tra->num_rows == 0){
			$sql = "INSERT INTO tu_dien(eng, vie, full_en, full_vi, intro_e, intro_v) VALUES(?, ?, ?, ?, ?, ?)";
			$tmp = $conn->prepare($sql);
			$tmp->bind_param("ssssss", $eng, $vie, $full_en, $full_vi, $intro_e, $intro_v);
			if($tmp->execute()){
				echo "đã thêm từ mới";
				$tmp->close();
			}
			else{
				echo "Đã xảy ra lỗi<br>";
			}
		}
		else{
			echo "từ này đã có<br>";
		}
	}

 ?>
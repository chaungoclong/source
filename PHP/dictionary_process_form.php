<?php 
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		include "dictionary_connect.php";
		$vi = $_GET["vi"];
		$en = $_GET["en"];
		$sql = "INSERT INTO tu_dien(vi, en) VALUES(?, ?)";
		$tmp = $conn->prepare($sql);
		$tmp->bind_param("ss", $vi, $en);
		if($tmp->execute()){
			echo "đã thêm từ mới";
			$tmp->close();
		}
		else{
			echo "đã xảy ra lỗi";
		}
	}

 ?>
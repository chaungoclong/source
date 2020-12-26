<?php
	//GET DATA
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			if(empty($_POST['name'])){
				$error['name'] = "<span style='color: red;'>*bạn chưa nhập tên</span>";
			}
			else{
				$data['name'] = checkData($_POST['name']);
				if(!preg_match("/^[a-zA-Z\s]+$/", $data['name'])){
					$error['name'] = "<span style='color: red;'>*tên sai định dạng</span>";
				}
			}

			if(empty($_POST['email'])){
				$error['email'] = "<span style='color: red;'>*bạn chưa nhập email</span>";
			}
			else{
				$data['email'] = checkData($_POST['email']);
				if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
					$error['email'] = "<span style='color: red;'>*email sai định dạng</span>";
				}
				/*if(!preg_match("/^[a-zA-Z]+\d+@(gmail|hotmail).com$/", $data['email'])){
					$error['email'] = "<span style='color: red;'>*email sai dinh dang</span>";
				}*/
			}

			if(empty($_POST['comment'])){
				$error['comment'] = "<span style='color: red;'>*bạn chưa comment</span>";
			}
			else{
				$data['comment'] = checkData($_POST['comment']);
			}
			if(empty($_POST['gender'])){
				$error['gender'] = "<span style='color: red;'>*bạn chưa chọn giới tính</span>";
			}
			else{
				$data['gender'] = checkData($_POST['gender']);
			}
			if(empty($_POST['name']) && empty($_POST['email']) && empty($_POST['comment']) && empty($_POST['gender'])){
				$error['all'] = "<span style='color: red;'>*bạn chưa nhập gì</span>";
			}
			setcookie('name', $data['name'], time()+100);
		}

		function checkData($val){
			$val = trim($val);
			$val = htmlspecialchars($val);
			$val = stripcslashes($val);
			return $val;
		}

 ?>
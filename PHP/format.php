<?php 	
	require_once 'config.php';

	$name = $desc = "";
	$error =  "";

	if(isset($_POST['add_pro'])) {
		if(empty($_POST['pro_name'])) {
			$error .= "Thiếu tên";
		} else{
			$name = $_POST['pro_name'];
		}

		if(empty($_POST['pro_desc'])) {
			$error .= "Thiếu mô tả";
		} else{
			$desc = $_POST['pro_desc'];
		}

		if(!$error) {
			$sql_add_pro = "INSERT INTO content(pro_name, pro_desc) VALUES(?, ?)";
			$stmt = $con->prepare($sql_add_pro);
			$stmt->bind_param("ss", $name, $desc);
			if(!$stmt->execute()) {
				$error .= "Lỗi khi tải lên";
			}
			$stmt->close();

			$id = $con->insert_id;

			$sql_get_pro = "SELECT * FROM content WHERE id = ?";
			$stmt = $con->prepare($sql_get_pro);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->get_result()->fetch_assoc();
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script src="js/jquery-3.5.1.js"></script>
	<script src="ckeditor/ckeditor.js"></script>
</head>
<style>	

	form{
		width: 500px;	
		height: 600px;
		background: #B9FFF6;
		margin: auto;
	}
	
	.form-gr{
		display: flex;
		padding: 10px;
	}

	label{
		min-width: 100px;
	}
	#cnt{
		height: auto;
	}
	#cnt img{
		width: 100%;	
	}
	#cnt table{
		height: 100px;	
		width: 100%;
	}
</style>
<body>
	<form action="" method="POST">
		<h1>
			<?php 
				if(isset($error)) echo $error; 
				if(isset($id)) echo $id;
			?>
				
			</h1>
		<div class="form-gr">
			<label for="pro_name">Tên sản phẩm</label>
			<input type="text" name="pro_name" id="pro_name">
		</div>

		<div class="form-gr">
			<label for="pro_desc">Mô tả</label>
			<textarea name="pro_desc"></textarea>
			<script>
				CKEDITOR.replace("pro_desc", {height: '100%'});
			</script>
		</div>
		<div class="form-gr">
			<button name="add_pro">THÊM SẢN PHẨM</button>
		</div>
	</form>
	<div style="width: 500px; background: green;" id="cnt">
		<?php 
			if(isset($result)) {
				echo $result['pro_desc'];
			}
		 ?>
	</div>
</body>
</html>
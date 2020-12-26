<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php 
		include 'thuoc_no_ket_noi.php';
		$conn->set_charset("utf8");
		$id_bai_viet = 1;//mã của 1 bài viết

		if(isset($_GET["id"])){
			$id_bai_viet = $_GET["id"];
		}

		$sql = "SELECT * FROM thuoc_no WHERE id=?";
		$tmp = $conn->prepare($sql);
		$tmp->bind_param("i", $id_bai_viet);
		$tmp->execute();
		$ket_qua = $tmp->get_result();
		$tmp->close();
	 ?>

	 <?php if ($ket_qua->num_rows > 0): ?>
	 	<?php while ($row = $ket_qua->fetch_assoc()): ?>
	 		<div>
	 			<h1><?php echo $row["ten_tn"] ?></h1>
	 			<h3><?php echo $row["tom_tat"] ?></h3>
	 			<p>
	 				<?php echo nl2br($row["noi_dung"]) ?>	
	 			</p>
	 		</div>
	 	<?php endwhile ?>
	 <?php endif ?>
		
</body>
</html>
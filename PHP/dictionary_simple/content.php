<?php 
	include 'connect.php';
		$conn->set_charset("utf8");

		$mode = (isset($_GET["mode"])) ? $_GET["mode"] : "e-v";
		$tim_kiem = (isset($_GET["tim_kiem"])) ? $_GET["tim_kiem"] : "";

		if($mode == "e-v"){
			$sql = "SELECT * FROM tu_dien WHERE eng LIKE('%$tim_kiem%') ORDER BY eng";
		}
		if($mode == "v-e"){
			$sql = "SELECT * FROM tu_dien WHERE vie LIKE('%$tim_kiem%') ORDER BY vie";
		}

		$ket_qua = $conn->query($sql);
		$tat_ca_tu = $ket_qua->num_rows;
		$tu_mot_trang = 8;
		$so_trang = ceil($tat_ca_tu / $tu_mot_trang);
		$trang_hien_tai = (isset($_GET['trang_hien_tai'])) ? $_GET['trang_hien_tai'] : 1;
		$trang_bo_qua = ($trang_hien_tai - 1) * $tu_mot_trang; 

		if($mode == "e-v"){
			$sql = "SELECT * FROM tu_dien WHERE eng LIKE('%$tim_kiem%') LIMIT $tu_mot_trang OFFSET $trang_bo_qua ";
		}
		if($mode == "v-e"){
			$sql = "SELECT * FROM tu_dien WHERE vie LIKE('%$tim_kiem%') LIMIT $tu_mot_trang OFFSET $trang_bo_qua ";
		}
		$ket_qua = $conn->query($sql);
 ?>
<div class="main">
	<div class="left_bar">
		<h1>left bar</h1>
	</div>

	<div class="content">
		 <?php if ($ket_qua->num_rows > 0): ?>
			 <?php while($row = $ket_qua->fetch_assoc()): ?>
				<div>
					<?php if ($mode == "v-e"): ?>
					 	<h3><?php echo $row["id"].".".$row["vie"] ?></h3>
					 	<h4><?php echo $row['intro_e']?></h4>
					 	<a href="one_content.php?id=<?php echo $row['id'] ?>&mode=<?php echo $mode ?>">Xem thêm</a>
					<?php else: ?>
					 	<h3><?php echo $row['id'].".".$row["eng"] ?></h4>
					 	<h4><?php echo $row['intro_v']?></p>	
					 	<a href="one_content.php?id=<?php echo $row['id'] ?>&mode=<?php echo $mode ?>">Xem thêm</a>
					<?php endif ?>
				</div>	
			 <?php endwhile ?>
		 <?php endif ?>
	</div>

	<div class="right_bar">
		<h1>right_bar</h1>
	</div>
</div>
<?php include "page_number.php"; ?>

</body>
</html>
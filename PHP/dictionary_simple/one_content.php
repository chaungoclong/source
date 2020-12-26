<?php 
	$id = (isset($_GET['id'])) ? $_GET['id'] : 1;
	$mode = (isset($_GET['mode'])) ? $_GET['mode'] : "e-v";
	include 'connect.php';
	$sql = "SELECT * FROM tu_dien WHERE id=?";
	$tmp = $conn->prepare($sql);
	$tmp->bind_param("i", $id);
	$tmp->execute();
	$ket_qua = $tmp->get_result();
 ?>
 
 <?php if ($ket_qua->num_rows > 0): ?>
 	<?php while($row = $ket_qua->fetch_assoc()): ?>
 		<div>
 			<?php if($mode == "v-e"): ?>
	 			<h3><?php echo $row['vie'] ?></h4>
	 			<h6><?php echo $row['intro_e']?></h6>
	 			<p><?php echo nl2br($row["full_en"]) ?></p>
 		    <?php else: ?>
	 			<h3><?php echo $row['eng'] ?></h3>
	 			<h6><?php echo $row['intro_v']?></h6>
	 			<p><?php echo nl2br($row["full_vi"]) ?></p>
 			<?php endif ?>
 		</div>		
 	<?php endwhile ?>
 <?php endif ?>
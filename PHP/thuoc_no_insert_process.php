<?php 
	if(isset($_POST['them'])){
		$ten_tn = $_POST["ten_tn"];
		$tom_tat = $_POST['tom_tat'];
		$noi_dung = $_POST['noi_dung'];
		include "thuoc_no_ket_noi.php";
		$sql = "INSERT INTO thuoc_no(ten_tn, tom_tat, noi_dung) VALUES(?, ?, ?)";
		$tmp = $conn->prepare($sql);
		$tmp->bind_param("sss", $ten_tn, $tom_tat, $noi_dung);
		$tmp->execute();
		$tmp->close();
	}
	else{
		echo "failed<br>";
	}
?>
	
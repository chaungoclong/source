<?php 
	include "connect.php";
	$en = "teacher";
	$sql = "SELECT * FROM tu_dien WHERE eng LIKE('%$en%')";
	$kiem_tra = $conn->query($sql);
	echo $kiem_tra->num_rows;
	foreach($kiem_tra as $row){
		echo $row['eng'];
	}
 ?>
<?php 
	//KẾT NỐI VỚI DATABASE  
	include 'connXacNhanForm.php';
	$sql = "SELECT DISTINCT name, cmt, gender, email FROM feedback";
	$kq = $conn->query($sql);
	if($kq->num_rows > 0){
		echo "<table border='1px' style='border-collapse: collapse;'>";
		while($row = $kq->fetch_assoc()){
			echo "<tr>";
				echo "<td>";
					echo $row['name'];
				echo "</td>";

				echo "<td>";
					echo $row['cmt'];
				echo "</td>";

				echo "<td>";
					echo $row['email'];
				echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else{
		echo "khong co du lieu<br>";
	}
?>
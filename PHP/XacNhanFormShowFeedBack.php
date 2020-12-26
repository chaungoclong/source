<?php 
	//KẾT NỐI VỚI DATABASE  
	include 'connXacNhanForm.php';
	$sql = "SELECT DISTINCT name, cmt, gender, email FROM feedback";
	$tmp = $conn->prepare($sql);
	$tmp->execute();
	$tmp->store_result();
	$tmp->bind_result($name, $comment, $gender, $email);
	if($tmp->num_rows() > 0){
		echo "<table border='1px' style='border-collapse: collapse;'>";
		while($tmp->fetch()){
			echo "<tr>";
				echo "<td>";
					echo $name;
				echo "</td>";

				echo "<td>";
					echo $comment;
				echo "</td>";

				echo "<td>";
					echo $email;
				echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else{
		echo "khong co du lieu<br>";
	}
	$tmp->free_result();
	$tmp->close();
?>
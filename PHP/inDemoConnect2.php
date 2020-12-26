<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php 
		$conn = mysqli_connect('localhost', 'root', '', 'hocsinh');
		if($conn) echo "da ket noi<br>";
		else echo "chua ket noi<br>";

		/*$sql = "INSERT INTO INFO(ID, NAME, ADDRESS) VALUES
		(1, 'NGUYEN VAN A', 'QUANG NINH'),
		(2, 'NGUYEN VAN B', 'QUANG NAM'),
		(3, 'NGUYEN VAN C', 'QUANG NGAI')";
		if(mysqli_query($conn, $sql)) echo "inserted<br>";
		else echo "no inserted<br>";*/
		
	?>

	<div style="background-color: red">
		<?php
			$sql = "SELECT * FROM INFO";

			$kq = mysqli_query($conn, $sql);
			if(mysqli_num_rows($kq) > 0){
				while($row = mysqli_fetch_assoc($kq)){
					echo $row['ID']." ".$row['NAME']." ".$row['ADDRESS']."<br>";
				}
			}
		?>
	</div>
</body>
</html>
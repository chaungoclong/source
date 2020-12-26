<?php 
	$con = new mysqli("localhost", "root", "", "test");

	$result = $con->query("SELECT * FROM content")->num_rows;
	echo $result;
 ?>
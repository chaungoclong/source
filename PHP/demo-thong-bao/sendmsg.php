<?php 
	if(isset($_POST['msg'])) {
		$msg = $_POST['msg'];
		$con = new mysqli("localhost", "root", "", "test");
		$con->query("INSERT INTO content(pro_desc) VALUES('$msg')");
	}
 ?>
<?php 
	session_start();
	session_destroy();
	echo "LOGGED OUT";
	echo('<a href="session.php"><button >back</button></a>');
	//header('location: session.php');
?>
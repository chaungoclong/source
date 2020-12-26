<?php 
	//connect
	$conn = new mysqli('localhost', 'root', '', 'signup');
	if($conn->connect_error){
		die('connection failed'.$conn->connect_error);
	}
	//get info using get_result();
	
	$sql = "SELECT name, pass FROM listuser WHERE name like('t%')";
	/*
	$tmp = $conn->prepare($sql);
	$tmp->execute();
	$kq = $tmp->get_result();
	echo("<table border='1px'>");
	while($row = $kq->fetch_assoc()){
		echo("<tr>");
		echo("<td>");
		echo("name: ".$row['name']);
		echo("</td>");
		echo("<td>");
		echo("password: ".$row['pass']);
		echo("</td>");
		echo("</tr>");
	}
	echo("</table>");
	$tmp->free_result();
	$tmp->close();*/
	//get info using bind_result(var, var,...);
	$tmp = $conn->prepare($sql);
	var_dump($tmp);
	echo("<br>");
	$tmp->execute();
	$tmp->store_result();
	$tmp->bind_result($name, $pass);
	echo("<table border='1px'>");
	while($tmp->fetch()){
		echo("<tr>");
		echo("<td>");
		echo("name: ".$name);
		echo("</td>");
		echo("<td>");
		echo("password okok: ".$pass);
		echo("</td>");
		echo("</tr>");
	}
	echo("</table>");
?>
<?php 
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$db = "test";
	$con = new mysqli($hostname, $username, $password, $db);
	if($con->connect_error){
		die('CONNECT_ERROR'.$con->connect_error);
	}
	$con->set_charset("utf8");
	header("Content-type: text/html; charset=utf-8");
	if(session_id() === '') session_start();
 ?>
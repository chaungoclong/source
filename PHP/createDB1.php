<?php 
    if(isset($_POST['senddb'])){
    	$nameDB = $_POST['db'];
    	$conn = mysqli_connect('localhost', 'root', '');
    	if(!$conn){
    		echo "chua ket noi<br>";
    	}
    	else{
    		echo "da ket noi<br>";
    	}

    	$sql = 'CREATE DATABASE '.$nameDB;
    	//echo $sql;
    	if(mysqli_query($conn, $sql)){
    		echo 'da tao database<br>';
    		header('location: createDB.php');
    	}
    	else echo 'tao database khong thanh cong<br>';
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>HELLO</h1>
	tên database:<br>
    <form action='createDB1.php' method='post'>
         <input type='text' name='db' value=''>
         <input type='submit' name='senddb' value='GỬI'>
    </form>
</body>
</html>
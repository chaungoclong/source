<?php 
		session_start();
		if(isset( $_SESSION['name'], $_SESSION['pass'])){
			echo 'name: '.$_SESSION['name'].'<br>';
			echo 'password: '.$_SESSION['pass'].'<br>';
		}
		else{
			echo "NO SESSION<BR>";
		}

		if(isset($_COOKIE['name'])){
			echo "cookie name: ".$_COOKIE['name'].'<br>';
		}
		else{
			echo 'NO COOKIE<BR>';
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

	<h1>
		<?php
			if(isset( $_SESSION['name'], $_SESSION['pass'])){
				echo "LOGGED IN SUCCESSFULLY<BR>";
				echo('<a href="destroysession.php"><button >log out</button></a>
					  <a href="session.php"><button >back</button></a>');
			}
			else{
				echo "LOGIN UNSUCCESSFUL<BR>";
				echo('<a href="session.php"><button >back</button></a>');
			}
		?>
	</h1>
	
</body>
</html>
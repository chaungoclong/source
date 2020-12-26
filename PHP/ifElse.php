<!DOCTYPE html>
<html>
<head>
	<title>ifelse</title>
</head>
<body>
	<?php 
		/*$GLOBALS['a'] = 0;
		function grow($a)
		{
			return ++$a;
		}
		echo grow($a);*/
		$diem = 8.1;
		if($diem < 5) echo("yeu<br>");
		elseif($diem <= 6) echo("trung binh<br>");
		elseif($diem <= 8) echo("kha<br>");
		else echo("gioi<br>");

	?>
</body>
</html>
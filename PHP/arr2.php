<?php 
	$arr = array(
		1 => array(1, 2, 3),
		2 => array(4, 5, 6)
	);
	foreach ($arr as $key => $value) {
		foreach ($value as $value1) {
			echo($value1." ");
		}
		echo "<br>";
	}
?>
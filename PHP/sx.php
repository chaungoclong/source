
<?php 
	/*$key = [25, 9, 22, 4, 7, 17, 3, 1, 5, 14, 19, 24, 13, 16, 12, 2, 8, 21, 6, 20, 15, 11, 23, 10, 18];
	$value = ["P","3","6","5","O","T","M","G","8","K","D","M","Y","S","A","8","9","6","K","T","Y","Z","E","F","O"];
	$result = array_combine($key, $value);

	ksort($result);
	foreach ($result as $value) {
		echo $value;
	}
	var_dump($result);*/
 ?>

 <?php 
 	$key = [25, 9, 22, 4, 7, 17, 3, 1, 5, 14, 19, 24, 13, 16, 12, 2, 8, 21, 6, 20, 15, 11, 23, 10, 18];
 	$keys = [25, 9, 22, 4, 7, 17, 3, 1, 5, 14, 19, 24, 13, 16, 12, 2, 8, 21, 6, 20, 15, 11, 23, 10, 18];
 	$values = ["P","3","6","5","O","T","M","G","8","K","D","M","Y","S","A","8","9","6","K","T","Y","Z","E","F","O"];
 	$result = array_combine($keys, $values);
	for($i = 0; $i < count($key) - 1; ++$i){
		$index = $i;
		for($j = $i+1; $j < count($key); ++$j){
			if($key[$j] < $key[$index]) $index = $j;
		}
		$tmp = $key[$index];
		$key[$index] = $key[$i];
		$key[$i] = $tmp;
	}

	foreach ($key as $k => $value) {
		echo $value."-".$result[$value]."<br>";
	}
  ?>


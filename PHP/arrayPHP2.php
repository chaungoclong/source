<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
		$class = array(
			"giaovien" => array(
				"gv1" => array(
					"name" => "nguyen thi a",
					"age" => 20
				),
				"gv2" => array(
					"name" => "nguyen thi b",
					"age" => 30
				)
			),
			"hocsinh" => array(
				"hs1" => array(
					"name" => "nguyen thi x",
					"age" => 19
				)
			)
		);

		forEach($class as $k => $v){
			forEach($v as $k1 => $v1){
				echo $k1."\n";
				echo $v1["name"]."<br>".$v1["age"]."<br>";
			}
		}
	?>
</body>
</html>
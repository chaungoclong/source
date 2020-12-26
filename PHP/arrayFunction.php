<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php 
		$array = array('mot' => 1, 'hai' => 2, 'ba' => 3);
		//array_change_key_case($array, case): thay đổi key thành chữ thường hoặc hoa, không thay đổi mảng gốc
		print_r(array_change_key_case($array, CASE_UPPER));
		echo "<br>";
		//array_combine($arrayKey, $arrayValue): ghép 2 mảng thành 1 mảng , với 1 mảng là key , 1 mảng là value
		$key = array(1, 2, 3);
		$value = array('mot', 'hai', 'ba');
		$values = array_combine($key, $value);
		print_r($values);
		echo "<br>";
		//array_count_values($array): đếm số phần tử giống nhau trong mảng(thống kê) và trả về mảng kết quả
		$ketQua = array_count_values($values);
		forEach($ketQua as $k => $val){
			echo $k." ".$val."<br>";
		}
		//Xóa/Thêm phần tử vào cuối mảng: array_pop($array), array_push($array, value1, ...)
		print_r("phần tử bị xóa: ".array_pop($array)); echo "<br>";
		print_r($array); echo "<br>";
		print_r(array_push($array, 3, 4, 5));echo "<br>";
		print_r($array); echo "<br>";
		print_r(array_shift($array)); echo "<br>";
		print_r($array); echo "<br>";
		print_r(array_unshift($array, 0, 1)); echo "<br>";
		print_r($array); echo "<br>";

		//array_values($array): chuyển key sang dạng số(dạng chỉ mục)
		$array = array_values($array);
		print_r($array);

		//array_unique($array) : loại bỏ giá trị trùng lặp
		array_push($array, 1, 2, 3, 4, 5);echo "<br>";
		print_r($array);
		$kq = array_unique($array);
		var_dump($array);echo "<br>";
		print_r(array_sum($array));echo "<br>";
		echo(is_array($array));echo "<br>";
		echo(in_array(1, $array));echo "<br>";
		print_r($values); echo "<br>";
		$array2 = array('mot' => 1, 'hai' => 2, 'ba' => 3);
		ksort($array2);
		print_r($array2); echo "<br>";
		//sắp xếp tăng/giảm: sort(), rsort(); mảng bị biến về dạng chỉ mục
		//sắp xếp tăng/giảm theo giá trị(value): asort(), arsort();
		//sắp xếp tăng/giảm theo chỉ số(key): ksort(), krsort()

	?>
</body>
</html>
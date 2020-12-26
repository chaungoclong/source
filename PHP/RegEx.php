<?php 
//^ và $ chỉ dùng với chuỗi liền không khoảng trắng
//date
	$exp = '/^\d{2}\/\d{2}\/\d{4}$/';
	$str = '24/11/2001';
	if(preg_match($exp, $str)){
		echo $str.'<br>';
	}
//email
	$exp = '/^[a-zA-Z]+\d+@(gmail|hotmail|outlook).com$/';
	$str = 'chaungoclong2411@hotmail.com';
	if(preg_match($exp, $str)){
		echo $str.'<br>';
	}


?>
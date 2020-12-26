<!DOCTYPE html>
<html>
<head>
	<title>hello</title>
</head>
<body>
	<?php 

	$bom = array(
		'bomthuong' => array(
			'bom1' => 'bom chan khong',
			'bom2' => 'bom napal'
		),
		'bomhatnhan' => array(
			'bom1' => 'bom phan hach',
			'bom2' => 'bom nhiet hach'
		)
	);

	foreach ($bom as $key => $value) {
		echo "$key<br>";
		echo $value['bom1']."<br>".$value['bom2']."<br>";
	}
	$schools = array(
    'students' => array(
        'SV01' => array(
            'name' => 'Phan Văn Cương',
            'birth' => '10/11/1988',
            'gender' => 'Nam'
        ),
        'SV02' => array(
            'name' => 'Nguyễn Văn Hoàng',
            'birth' => '04/12/1990',
            'gender' => 'Nam'
        ),
        'SV03' => array(
            'name' => 'Trần Thị Hằng',
            'birth' => '01/07/1992',
            'gender' => 'Nữ'
        ),
        'SV04' => array(
            'name' => 'Khánh Linh',
            'birth' => '01/07/1994',
            'gender' => 'Nữ'
        ),
    ),
    'teacher' => array(
        'GV01' => array(
            'name' => 'Trần Thiện Thành',
            'birth' => '04/06/1982',
            'gender' => 'Nam'
        ),
        'GV02' => array(
            'name' => 'Nguyễn Văn Hiếu',
            'birth' => '05/10/1981',
            'gender' => 'Nam'
        ),
        'GV03' => array(
            'name' => 'Nguyễn Thị Lệ',
            'birth' => '04/12/1981',
            'gender' => 'Nữ'
        ),
    )
);

foreach ($schools as $key => $value) {
	foreach ($value as $key1 => $value1) {
		echo $key1."<br>";
		echo $value1['name']."<br>";
		# code...
	}
	# code...
}

function snt($a){
	if($a < 2) return false;
	for($i = 2; $i <= (INT)sqrt($a); ++$i){
		if($a % $i == 0) return false;
	}
	return true;
}

$test = "hello ok goodbye";
if(snt(0)) echo "ok<br>";

	?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<script src="../jquery-3.5.1.js"></script>
	
</head>
<body>
	NOTICE:
	<i class="fas fa-bell"></i><span style="border-radius: 50%; background: red; width: 20px; height: 20px; display: inline-block; text-align: center;" id="num_notice"></span>
</body>
<script>
	$(document).ready(function(){
		setInterval(function(){
			$('#num_notice').load("realtime.php");
			$val = $('#num_notice').text();
			console.log($val);
		}, 1000);
	});
</script>
</html>

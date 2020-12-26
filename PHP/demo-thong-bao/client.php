<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<script src="../jquery-3.5.1.js"></script>
	<script>
		$(document).ready(function(){
			//gửi giá trị của thẻ input msg khi nhấn phím enter
			$(document).on('keyup', '#msg', function(e){
				if(e.which === 13){
					$.post("insert.php", $(this).serialize(), function(data){
						alert(data);
					}), "text"
				}
			});
		});
	</script>
</head>
<body>
	MESSAGE: <input type="text" name="msg" id="msg">
</body>
</html>
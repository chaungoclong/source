<!DOCTYPE html>
<html>
<head>
	<title>checkForm</title>
	<meta charset="utf-8">
</head>
<body>
	<script language="javascript">
		function checkName(name) {
			for(var i = 0; i < name.length; ++i){
				if(name.charCodeAt(i) >= 48 && name.charCodeAt(i) <= 57) return false;
			}
			return true;		
		}
		function getValue(id) {
			if(id=="input"){
				var x = document.getElementById(id).value;
				if(x < 0){
					document.getElementById(id).style.color="red";
					document.getElementById(id).style.backgroundColor="green";
					var notice = function(){alert("Nhập tuổi lớn hơn 0")};
					setTimeout(notice, 100);
				}
				else{
					document.getElementById(id).style.color="black";
					document.getElementById(id).style.backgroundColor="white";
				}
			}
			else if(id=="input2"){
				var y = document.getElementById(id).value;
				console.log(checkName(y));
				var notice = function(){alert("tên không hợp lệ");};
				if(y != "" && !checkName(y)){
					setTimeout(notice, 100);
					document.getElementById(id).value = "";
				}
			}
		}
	</script>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
		<b><i>Tên&nbsp</i></b>
		<input type="text" name="name" id="input2" value="" placeholder="nhập tên của bạn" oninput="getValue(this.id);"><br>
		<b><i>Tuổi</i></b>
		<input type="number" name="age" id="input" value="" placeholder="nhập tuổi của bạn" oninput="getValue(this.id);">
		<input type="submit" name="send" id="ok">
	</form>
	
	<?php 
		if(isset($_GET['send'])){
			echo "name: ".$_GET['name']."<br>age:".$_GET['age'];
		}
	?>
</body>
</html>
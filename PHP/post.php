<!DOCTYPE html>
<html>
<head>
	<title>post</title>
</head>
<body>
	<form action="post.php" method="post">
		name:<input type="text" name="name" placeholder="get name"><br>
		age:<input type="number" name="age" value="0"><br>
		<input type="submit" name="post" value="OK">
	</form>
	<?php 
		if(isset($_POST['post'])){
			echo $_POST['name'];
			echo $_POST['age'];
		}
	?>
</body>
</html>
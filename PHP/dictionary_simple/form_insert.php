<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>THÊM TỪ MỚI</title>
	<link rel="stylesheet" href="">
	<style>
		table{
			padding: 10px; 
			border-collapse: collapse;
			border: solid;
			text-align: center;
			margin: 0 auto;
		}

		button{
			margin-left: 300px;
		}
	</style>
</head>
<body>
	<div class="form">
		<form action="process_form_insert.php" method="get">
			<table>
				<td style="padding: 10px; border-right: solid;">
					TIẾNG ANH:<input type="text" name="eng">
					<br>
					TIẾNG VIỆT TÓM TẮT:<input type="text" name="intro_v">
					<br>
					TIẾNG VIỆT ĐẦY ĐỦ<textarea name="full_vi" cols="30" rows="10"></textarea>
				</td>

				<td style="padding: 20px; border-left: solid;">
					TIẾNG VIỆT<input type="text" name="vie">
					<br>
					TIẾNG ANH TÓM TẮT<input type="text" name="intro_e">
					<br>
					TIẾNG ANH ĐẦY ĐỦ<textarea name="full_en" cols="30" rows="10"></textarea>
				</td>
			</table>
			<br><br>
			<button >THÊM</button>
		</form>
	</div>
</body>
</html>
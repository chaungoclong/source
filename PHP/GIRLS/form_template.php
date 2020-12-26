<form action="" method="post" style="position: absolute; top:100px; background-color: #FAF71B;">
	Username: <input type="text" name="username" placeholder="username?">
	<br><br>
	Password: <input type="password" name="password" placeholder="password?">
	<br><br>	
	<button>
		<?php 
			if(isset($_GET['action']) && $_GET['action'] == 'signup'){
				echo "DANG KY";
			}
			else{
				echo "DANG NHAP";
			}
		 ?>
	</button>
</form>
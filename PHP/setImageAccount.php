<form action="" method="post" enctype="multipart/form-data">
		<table border="1px">
			<tr>
				<td>
					<img align="center" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Facebook.svg/1024px-Facebook.svg.png"
					width="500" height="100">
				</td>
			</tr>
			<tr>
				<td>
					<input type="file" name="image">
				</td>
			</tr>

			<tr>
				<td>
					<h1>
						<?php
						if(isset( $_SESSION['name'], $_SESSION['pass'])){
							echo "LOGGED IN SUCCESSFULLY<BR>";
							echo('<a href="destroysession.php"><button >log out</button></a>
								  <a href="session.php"><button >back</button></a>');
						}
						else{
							echo "LOGIN UNSUCCESSFUL<BR>";
							echo('<a href="session.php"><button >back</button></a>');
						}
						?>
					</h1>
				</td>
			</tr>
		</table>
	</form>
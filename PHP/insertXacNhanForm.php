<?php 
	if(isset($_POST['name'], $_POST['email'], $_POST['comment'], $_POST['gender'])){
		$sql = "INSERT INTO feedback(name, cmt, gender, email) VALUES(?, ?, ?, ?)";
		$tmp = $conn->prepare($sql);
		$tmp->bind_param("ssss", $data['name'], $data['comment'], $data['gender'], $data['email']);
		$tmp->execute();
		echo "<marquee style='color: red; font-size: 50px'>cảm ơn quý khách đã đóng góp ý kiến</marquee>";
		$tmp->close();
	}
?>
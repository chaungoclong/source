<?php 
if(isset($_POST['send'])){
		//tạo phiên
		$_SESSION['name'] = $_POST['name'];
		$_SESSION['pass'] = $_POST['pass'];

		//KIỂM TRA THÔNG TIN ĐĂNG NHẬP
		//câu lện sql
		$sql = "SELECT name, pass FROM listuser WHERE name=? AND pass=?";
		//chuẩn bị câu lệnh phương thức prepare()
		$tmp = $conn->prepare($sql);
		//truyền giá trị cho các ? trong truy vấn sql bind_param(): liên kết các tham số với truy vấn sql
		$tmp->bind_param("ss", $_SESSION['name'], $_SESSION['pass']);
		//chạy câu lệnh
		$tmp->execute();
		//
		$tmp->store_result();
		$numOfRow = $tmp->num_rows;
		if($numOfRow){
			header('location: showsession.php');
		}
		else{
			echo "LOGIN UNSUCCESSFUL<BR>";
		}
		//echo $numOfRow;
		//liên kết kết quả với các biến $name, $pass
		//$tmp->bind_result($name, $pass);
		//fetch, fetch_.. tìm nạp kết quả, kết thúc khi tìm nạp trả về false
		/*while($tmp->fetch()){
			echo $name.$pass;
			echo $tmp->num_rows();
		}*/
}

?>
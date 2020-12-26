<?php 
	/**
	 * 
	 */
	class Tai_khoan
	{
		private $username;
		private $password;
		static public $ket_noi = null;
		//ham tao
		public function set_data($username, $password)
		{
			$this->username = $username;
			$this->password = $password;
			self::$ket_noi = $this->ket_noi();
		}

		public function __construct()
		{
			$this->username = "";
			$this->password = "";
			self::$ket_noi = $this->ket_noi();
		}

		public function lay_username(){
			return $this->username;
		}

		public function lay_password(){
			return $this->password;
		}

		public function lay_danh_sach_tai_khoan(){
			$danh_sach_tai_khoan = [];
			$sql = "SELECT * FROM account";
			$tmp = self::$ket_noi->prepare($sql);
			$tmp->execute();
			$ket_qua = $tmp->get_result();
			while ($row = $ket_qua->fetch_assoc()) {
				$tai_khoan = new Tai_khoan();
				$tai_khoan->set_data($row['username'], $row['pass']);
				array_push($danh_sach_tai_khoan, $tai_khoan);
			}
			return $danh_sach_tai_khoan;
		}

		public function dang_ky(){
			if(isset($_GET['action']) == "signup"){
				include("form_template.php");
			}
			
			if(isset($_POST['username'], $_POST['password'])){
				$this->username = $_POST['username'];
				$this->password = $_POST['password'];
				$sql = "INSERT INTO account(username, pass) VALUES(?, ?)"; 
				$tmp = self::$ket_noi->prepare($sql);
				$tmp->bind_param("ss", $this->username, $this->password);
				if($tmp->execute()){
					header("Refresh:0; index.php");
				}
				else{
					die("error");
				}
			}
		}

		public function dang_nhap(){
			if(isset($_GET['action']) == "login"){
				include("form_template.php");
			}

			if(isset($_POST['username'], $_POST['password'])){
				$username_lg = $_POST['username'];
				$password_lg = $_POST['password'];
				$sql = "SELECT * FROM account WHERE username=? AND pass=?";
				$tmp = self::$ket_noi->prepare($sql);
				$tmp->bind_param("ss", $username_lg, $password_lg);
				if($tmp->execute()){
					$ket_qua = $tmp->get_result();
					if($ket_qua->num_rows == 1){
						$row = $ket_qua->fetch_assoc();
						$_SESSION['username'] = $row['username'];
						$_SESSION['password'] = $row['pass'];
						echo "<br><br><br>xin chao ".$_SESSION['username'];
					}
					else{
						echo "sai mat khau hoac ten dang nhap<br>";
					}
				}
			}
		}

		public function ket_noi(){
			if(self::$ket_noi === null){
				self::$ket_noi = new mysqli("localhost", "root", "", "girls");
				if(self::$ket_noi->connect_error){
					die("connection failed".self::$ket_noi->connect_error);
				}
			}
			return self::$ket_noi;
		}
	}

	/*$new = new Tai_khoan();
	$new->dang_ky();
	$list = $new->lay_danh_sach_tai_khoan();
	foreach ($list as $value) {
		echo $value->lay_username()."<br>";
		echo $value->lay_password()."<br>";
	}*/
 ?>
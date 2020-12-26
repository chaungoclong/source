<?php 
session_start();
	include "connect.php";
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		if(isset($_GET['name'], $_GET['address'], $_GET['phone'], $_GET['gender'], $_GET['email'], $_GET['age'], $_GET['dai_ly'], $_GET['sanpham'])){
			$name = $_GET['name'];
			$address = $_GET['address'];
			$phone = $_GET['phone'];
			$gender = $_GET['gender'];
			$email = $_GET['email'];
			$age = $_GET['age'];
			$ngay_ban = date("Y/m/d");
			$dai_ly = $_GET['dai_ly'];
			//thêm thông tin vào bảng khách hàng
			$sql = "INSERT INTO khach_hang(ho_ten, dia_chi, so_dien_thoai, email, gioi_tinh, tuoi) VALUES(?, ?, ?, ?, ?, ?)";
			$tmp = $conn->prepare($sql);
			$tmp->bind_param("sssssi", $name, $address, $phone, $email, $gender, $age);
			$tmp->execute();
			//lấy mã khách hàng vừa thêm (cuối cùng) để thêm vào bảng hóa đơn
			$ma_khach_hang = "";
			$sql = "SELECT ma_khach_hang FROM khach_hang ORDER BY ma_khach_hang DESC LIMIT 1";
			$ket_qua = $conn->query($sql);
			while($row = $ket_qua->fetch_assoc()){
				$ma_khach_hang = $row['ma_khach_hang'];
			}
			$_SESSION['ma_khach_hang'] = $ma_khach_hang;
			//thêm thông tin vào thẻ hóa đơn
			$sql = "INSERT INTO hoa_don(ma_khach_hang, dai_ly, ngay_ban) VALUES(?, ?, ?)";
			$tmp = $conn->prepare($sql);
			$tmp->bind_param("iss", $ma_khach_hang, $dai_ly, $ngay_ban);
			$tmp->execute();
			//lấy mã hóa đơn để thêm vào bảng chi tiết hóa đơn
			$ma_hoa_don = "";
			$sql = "SELECT ma_hoa_don FROM hoa_don WHERE ma_khach_hang=$ma_khach_hang";
			$ket_qua = $conn->query($sql);
			while($row = $ket_qua->fetch_assoc()){
				$ma_hoa_don = $row['ma_hoa_don'];
			}
			$_SESSION['ma_hoa_don'] = $ma_hoa_don;

			/*
				duyệt từng sản phẩm trong danh sách người dùng chọn->lấy giá->tính giá tiền->thêm sản phẩm đó vào bảng chi tiết hóa đơn.
			 */
			//mảng chứa giá 
			$bang_so_luong = [];
			foreach($_GET['soluong'] as $val){
				array_push($bang_so_luong, $val);
			}

			/*foreach($bang_so_luong as $val){
				echo $val."-";
			}
			echo "<br>";
			foreach($_GET['sanpham'] as $val){
				echo $val."-";
			}
			echo "<br>";*/
			$key = ['TV1', 'DVD', 'KO', 'MG', 'ML', 'TV2', 'MP3', 'AM'];
			$value =[$bang_so_luong [0],  $bang_so_luong [1],  $bang_so_luong [2],  $bang_so_luong [3],  $bang_so_luong [4],  $bang_so_luong [5],  $bang_so_luong [6],  $bang_so_luong [7]];
			$result = array_combine($key, $value);
			/*foreach($result as $key => $val){
				echo $key."=>".$val."<br>";
			}*/
			echo "<br>";
			foreach($_GET['sanpham'] as $ma_san_pham){
				//echo $ma_san_pham."<br>";
				$sql = "SELECT gia FROM san_pham WHERE ma_san_pham='$ma_san_pham'";
				$kq = $conn->query($sql);
				$so_luong = $result[$ma_san_pham];
				//lấy giá
				$const = $kq->fetch_assoc();
				//tính giá tiền
				$thanh_tien = $const['gia'] * $so_luong;
				//thêm thông tin cho bảng chi tiết hóa đơn(1 hóa đơn có thể có nhiều sản phẩm)
				$sql = "INSERT INTO chi_tiet_hoa_don(ma_hoa_don, ma_san_pham, so_luong, thanh_tien) VALUES(?, ?, ?, ?)";
				$tmp = $conn->prepare($sql);
				$tmp->bind_param("isid", $ma_hoa_don,  $ma_san_pham, $so_luong, $thanh_tien);
				$tmp->execute();
			}
			//header("location: index.php");
		}
	}
 ?>

<link rel="stylesheet" href="home.css">
 <?php if (isset($_SESSION['ma_hoa_don'])): ?>
 	<div id="notice">
 		<p>ĐÃ ĐẶT HÀNG THÀNH CÔNG</p><br>
 		
 		<div>
 			<img src="image/mascot@2x.png" alt="" width="100%">
 			<a style="text-align: center;" href="hoa_don.php?ma_hoa_don=<?php echo $_SESSION['ma_hoa_don'] ?>">GIỎ HÀNG</a>
 		</div>
 		
 	</div>
 <?php endif ?>

 	
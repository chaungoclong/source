<?php 
session_start();
	include "connect.php";
	//$ma_hoa_don = (isset($_GET['ma_hoa_don'])) ? $_GET['ma_hoa_don'] : 0;
	$ma_hoa_don = (isset($_SESSION['ma_hoa_don'])) ? $_SESSION['ma_hoa_don'] : 0;
//mảng chứa thông tin khách hàng lấy về
	$thong_tin_khach_hang = ["ho_ten" => "", "dia_chi" => "", "so_dien_thoai" => "", "email" => ""];
	$sql = "SELECT * FROM hoa_don JOIN khach_hang ON hoa_don.ma_khach_hang=khach_hang.ma_khach_hang WHERE hoa_don.ma_hoa_don=$ma_hoa_don";
	$ket_qua = $conn->query($sql);
	$row = $ket_qua->fetch_assoc();
		$thong_tin_khach_hang["ho_ten"] = $row['ho_ten'];
		$thong_tin_khach_hang["dia_chi"] = $row['dia_chi'];
		$thong_tin_khach_hang["so_dien_thoai"] = $row['so_dien_thoai'];
		$thong_tin_khach_hang["email"] = $row['email'];

	//mảng chứa thông tin các sản phẩm đã mua
	$danh_sach_san_pham = array(array()); 
	$sql = "SELECT * FROM hoa_don JOIN chi_tiet_hoa_don ON hoa_don.ma_hoa_don=chi_tiet_hoa_don.ma_hoa_don JOIN san_pham ON chi_tiet_hoa_don.ma_san_pham=san_pham.ma_san_pham WHERE hoa_don.ma_hoa_don=$ma_hoa_don";
	$ket_qua = $conn->query($sql);
	$x=0;
	while ($val = $ket_qua->fetch_assoc()) {
		$danh_sach_san_pham[$x][0] = $val['ten_san_pham'];
		$danh_sach_san_pham[$x][1] = $val['gia'];
		$danh_sach_san_pham[$x][2] = $val['so_luong'];
		$danh_sach_san_pham[$x][3] = $val['thanh_tien'];
		$x++;
	}
 ?>

<div align="center">
	<marquee id="date" width="80%" height="30px" direction="right" behavior="alternate" bgcolor="pink" style="border:5px solid ;"></marquee>
	<marquee id="cap"  width="80%"  height="40px"direction="left" behavior="alternate" bgcolor="#DCC5EA" style="border:5px solid ;">CHÚC QUÝ KHÁCH TRUNG THU VUI VẺ</marquee>
</div>

<script language="javascript">
	//var x = 0;
	function getDate() {
		var x = document.getElementById('date');
		var y = document.getElementById('cap');
		x.innerHTML = " ===="+new Date() + "=====";
		x.style.fontSize="20px";
		x.style.border=Math.floor(Math.random() * 256) + 1;
		x.style.color = Math.floor(Math.random() * 256) + 1;
		y.style.fontSize="30px";
		y.style.color = Math.floor(Math.random() * 256) + 1;
		x.style.border=Math.floor(Math.random() * 256) + 1;
		setTimeout(getDate, 1000);
	}
	
	getDate();
</script>
<table align="center" width="60%" cellspacing="0px" bgcolor="#FAF048" border="2px" style="margin-top: 50px; border-collapse: collapse;">
	<caption style="font-size: 40px; font-weight: bold; font-family: serif;">HÓA ĐƠN</caption>
	<tr bgcolor="#B0D5D8">
		<td>
			<?php if (isset($thong_tin_khach_hang, $danh_sach_san_pham)): ?>
				<table border="1px" align="center" width="100%" height="100%"  style="border-collapse: collapse;">
					<tr>
						<td width="40%" colspan="2"><b>Họ và tên khách hàng:</b></td>
						<td colspan="2">
							<?php echo $thong_tin_khach_hang["ho_ten"]; ?>
						</td>
					</tr>
					<tr>
						<td colspan="2"><b>Địa chỉ:</b></td>
						<td colspan="2">
							<?php echo $thong_tin_khach_hang["dia_chi"]; ?>
						</td>
					</tr>
					<tr>
						<td colspan="2"><b>Số điện thoại:</b></td>
						<td colspan="2">
							<?php echo $thong_tin_khach_hang["so_dien_thoai"]; ?>
						</td>
					</tr>
					<tr>
						<td colspan="2"><b>Email:</b></td>
						<td colspan="2">
							<?php echo $thong_tin_khach_hang["email"]; ?>
						</td>
					</tr>
				</table>
			<?php endif ?>
			<?php $tong_tien=0; ?>

	
		</td>
	</tr>
	<tr bgcolor="#EEE3CF">
		<td valign="top">
			<table border="1px" align="center" width="100%" height="100%"  style="border-collapse: collapse;">
				<tr>
					<th>Tên Sản Phẩm</th>
					<th>Giá</th>
					<th>Số Lượng</th>
					<th>Thành Tiền</th>
				</tr>

				<?php foreach ($danh_sach_san_pham as $mot_san_pham): ?>
					<tr>
					 	<td><?php echo $mot_san_pham[0]; ?></td>
					 	<td><?php echo $mot_san_pham[1]; ?></td>
					 	<td><?php echo $mot_san_pham[2]; ?></td>
					 	<td><?php echo $mot_san_pham[3]; ?></td>
					 	<?php $tong_tien += $mot_san_pham[3]; ?>
					 </tr>
				
				<?php endforeach; ?>
				<tr>
					<td colspan="4" align="right" style="color: red;">
						<?php echo "Tổng tiền: ".$tong_tien; ?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>


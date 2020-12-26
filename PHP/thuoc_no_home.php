	<?php include 'thuoc_no_header.php'; ?>

	<?php 
		/*
		A.TÌM KIẾM:
			+biến $tim_kiem có chức năng lưu chữ chuỗi tìm kiếm, giá trị mặc định của $tim_kiem là rỗng.
			+khi giá trị trong thẻ search được gửi đi giá trị của biến $tim_kiem = giá trị trong thẻ search.
			+lệnh SQL sẽ lấy ra các hàng thỏa mãn điều kiện tìm kiếm, nếu chuỗi tìm kiếm rỗng(không nhập | chưa nhập) 
			thì lấy ra tất cả các hàng của bảng => do đó câu lệnh SQL có thể làm 1 lúc 2 nhiệm vụ:
				-hiển thị tất cả các hàng của bảng
				-tìm kiếm các hàng thỏa mãn điều kiện nhập vào.
		B.TÁCH TRANG:
			+ Để tách trang phải biết số bản ghi cần hiển thị & số bản ghi trên 1 trang
			=> biết được số trang.
			+ Để biết số bản ghi cần bỏ qua cần biết vị trí trang hiện tại
				-lấy vị trí trang hiện tại:
					 *tạo ra số lượng link = số lượng trang . trong đó đường dẫn của link bao gồm key và value của $_GET
					 *=> khi nhẫn vào link vị trí của trang sẽ được gửi lên url -> lấy vị trí của trang bằng $_GET
				 -sau khi có vị trí trang hiện tại tính số bản ghi bỏ qua = (vị trí trang hiện tại - 1) * số bản ghi trên 1 trang.
			+sau khi biết số bản ghi cần bỏ qua -> chạy lệnh SQL lấy về các giá trị cần tìm trong đó bỏ qua số bản ghi cần bỏ qua và lấy số bản ghi bằng số bản ghi tối đa trên 1 trang.
		 */ 
		//TÌM KIẾM
		$tim_kiem = (isset($_GET["tim_kiem"])) ? $_GET["tim_kiem"] : "";
		//KẾT NỐI
		include "thuoc_no_ket_noi.php";
		$conn->set_charset("utf8");
		//LẤY DỮ LIỆU + TÌM KIẾM -> lấy được số hàng cần lấy ->tách trang 
		$sql = "SELECT * FROM thuoc_no WHERE ten_tn LIKE('%$tim_kiem%')";
		$ket_qua = $conn->query($sql);
		//TÁCH TRANG
		$so_tn = $ket_qua->num_rows;//tổng số hàng
		$so_tn_mot_trang = 3;//số hàng tối đa của 1 trang
		$so_trang = ceil($so_tn / $so_tn_mot_trang);//số trang có thể tách
		$so_trang_hien_tai = (isset($_GET["trang"])) ? $_GET["trang"] : 1;//vị trí trang hiện tại
		$so_tn_bo_qua = ($so_trang_hien_tai - 1) * $so_tn_mot_trang;//số hàng bỏ qua
		//sau khi lấy dữ liệu -> tách trang
		$sql = "SELECT * FROM thuoc_no WHERE ten_tn LIKE('%$tim_kiem%') LIMIT $so_tn_mot_trang OFFSET $so_tn_bo_qua";
		$ket_qua = $conn->query($sql);
	?>

	<?php if ($ket_qua->num_rows == 0): ?>
	 	<h1>
	 		<?php echo "Không tìm thấy kết quả" ?>
	 	</h1>
	<?php endif ?>

	<?php if (isset($ket_qua)): ?>
	 	<?php foreach ($ket_qua as $mot_tn): ?>
		 	<div id="main">
		 		<div>
		 			<h1><?php echo $mot_tn["ten_tn"] ?></h1>
			 		<h3><?php echo $mot_tn["tom_tat"] ?></h3>
			 		<a href="noi_dung_mot_tn.php?id=<?php echo $mot_tn['id']?>">xem thêm>>></a>
			 		<?//link XEM THEM chuyển đến trang hiển thị nội dung của một bài viết đồng thời gửi id của bài viết đó bằng url mà id này có thể dùng $_GET để lấy về và dùng để lấy dữ liệu của bài viết có id đó?>
		 		</div>
		 	</div>
	 	<?php endforeach ?>
	<?php endif ?>
	<?php include 'thuoc_no_footer.php'; ?>

</body>
</html>